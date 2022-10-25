<?php

namespace Uargflow;

/**
 * Este Clase se encuentra en \Uargflow\SSLHandler y permite encriptar y descifrar datos
 * haciendo uso de metodos estáticos que implementan la libreria OpenSSL.
 */
class SSLHandler
{

    /** Definición de Llave */
    static $KEY1 = "Lk5Uz3slx3BrAghS1aaW5AYgWZRV0tIX5eI0yPchFz4=";

    /** Definición de Método de encriptación utilizado en OpenSSL_encrypt */
    static $metodoEncriptacionSSL = "aes-256-ctr";

    /**
     * @static Int Obtenido de openssl_cipher_iv_length(self::$metodoEncriptacionSSL);
     * ES ESPECÍFICO DE AES256CTR - CADA MÉTODO EN TEORÍA TIENE SU PROPIO LARGO
     */
    const LARGO_IV_AES256CTR = 16;

    /**
     * Este metodo recibe una cadena en texto plano y los encripta utilizando metodos propios de OpenSSL.
     * 
     * @param String $data Datos de entrada.
     * @return String Cadena codificada en base64 - Concatenacion del vector de inicialización ($iv),  y los datos encriptados ($encData).
     * 
     * @uses openssl_encrypt()
     * @uses base64_encode()
     * 
     */
    static function encrypt($data)
    {
        if (in_array(self::$metodoEncriptacionSSL, openssl_get_cipher_methods())) {
            $iv = self::getIv();
            $encData = openssl_encrypt($data, self::$metodoEncriptacionSSL, self::$KEY1, 0, $iv);

            return base64_encode($iv . $encData);
        }
        return false;
    }

    /**
     * @param String $encData Input. Datos codificados en base 64;
     * @return String Cadena original descifrada.
     * 
     * @uses openssl_encrypt()
     * @uses base64_decode()
     * 
     */
    static function decrypt($encData)
    {

        if (in_array(self::$metodoEncriptacionSSL, openssl_get_cipher_methods())) {
            $b64DecData = base64_decode($encData);
            $substrIv = substr($b64DecData, 0, self::LARGO_IV_AES256CTR);
            $substrData = substr($b64DecData, self::LARGO_IV_AES256CTR);
            return openssl_decrypt($substrData, self::$metodoEncriptacionSSL, self::$KEY1, 0, $substrIv);
        }
        return false;
    }

    /**
     * 
     * Este método devuelve un vector de inicialización para uso de Hash.
     * Como parámetro, se utilizan propiedades del algoritmo / método de encriptación adoptado en la clase.
     * 
     * @uses self::$metodoEncriptacionSSL
     * 
     * @link https://www.php.net/manual/en/function.openssl-random-pseudo-bytes
     * @link https://www.techtarget.com/whatis/definition/initialization-vector-IV
     * 
     */
    static function getIv()
    {
        /* Algoritmo descrito:
        $iv_length = openssl_cipher_iv_length(self::$metodoEncriptacion);
        $iv = openssl_random_pseudo_bytes($iv_length);
        return $iv;
        */
        return openssl_random_pseudo_bytes(self::LARGO_IV_AES256CTR);
    }
}
