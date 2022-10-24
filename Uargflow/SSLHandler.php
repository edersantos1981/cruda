<?php

namespace Uargflow;

include_once '../vendor/autoload.php';

/**
 *  
 * Este Clase se encuentra en \Uargflow\SSLHandler y permite encriptar y descifrar datos
 * haciendo uso de metodos estáticos que implementan la libreria OpenSSL.
 * Adicionalmente, los datos encriptados por medio de OpenSSL junto a su llave se vuelven a 
 * encriptar por medio de Hmac para poder verificar la integridad de los datos descifrados. 
 *
 */

class SSLHandler
{
    static $metodoEncriptacion = 'aes-128-ctr';

    /**
     * 
     * En este metodo se recibe una cadena en texto plano.
     * Se encriptan los datos utilizando metodos propios de OpenSSL.
     * Adicionalmente se calcula un hash hmac a partir de los datos encriptados y la llave generada.
     * 
     * @return String Se codifica en base64 la concatenacion del vector de inicialización ($iv), el hash Hmac generado ($hmac) y los datos encriptados ($encData).
     *
     */
    static function encrypt($data)
    {
        if (in_array(self::$metodoEncriptacion, openssl_get_cipher_methods())) {
            $iv = self::getIv();
            $encData = openssl_encrypt($data, self::$metodoEncriptacion, self::getHash(), 0, $iv);
            $hmac = hash_hmac('sha256', $encData, self::getHash(), $as_binary = true);
            return base64_encode($iv . $hmac . $encData);
        }
        return false;
    }

    /**
     * 
     * Este metodo recibe una cadena encriptada y codificada en base64.
     * 
     * Descripción del algoritmo:
     * - Se decodifica la base64.
     * - Se fracciona la cadena decodificada para obtener el vector de inicializacion, el hash hmac y los datos encriptados.
     * - Se calcula un hash hmac a partir del substring de datos encriptados, y éste es comparado con la hash hmac original.
     * 
     * @return String Si ambos hash hmac coinciden, se concluye que los datos no fueron adulterados y el método retorna la cadena original descifrada.
     *
     */
    static function decrypt($encData)
    {

        if (in_array(self::$metodoEncriptacion, openssl_get_cipher_methods())) {
            $b64DecData = base64_decode($encData);
            $substrIv = substr($b64DecData, 0, openssl_cipher_iv_length(self::$metodoEncriptacion));
            $substrHmac = substr($b64DecData, openssl_cipher_iv_length(self::$metodoEncriptacion), $sha2len = 32);
            $substrData = substr($b64DecData, openssl_cipher_iv_length(self::$metodoEncriptacion) + $sha2len);

            $calcMac = hash_hmac('sha256', $substrData, self::getHash(), $as_binary = true);
            if (hash_equals($substrHmac, $calcMac)) // timing attack safe comparison
            {
                return openssl_decrypt($substrData, self::$metodoEncriptacion, self::getHash(), 0, $substrIv);
            }
        }
        return false;
    }

    static function getHash()
    {
        return 'llave_secreta';
    }

    static function getIv()
    {
        return openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$metodoEncriptacion));
    }
}
