<?php

namespace Uargflow;

include_once '../vendor/autoload.php';

class SSLHandler
{

    /** Definición de Llaves 32 y 64 caracteres */
    static $KEY1 = "Lk5Uz3slx3BrAghS1aaW5AYgWZRV0tIX5eI0yPchFz4=";
    static $KEY2 = "EZ44mFi3TlAey1b2w4Y7lVDuqO+SRxGXsa7nctnr/JmMrA2vN6EJhrvdVZbxaQs5jpSe34X3ejFK/o9+Y5c83w==";
    
    /** Definición de Métodos de encriptación utilizados en OpenSSL_encrypt y HashHmac   */
    static $metodoEncriptacionSSL = "aes-256-cbc";
    static $metodoEncriptacionHash = "sha3-512";

    /**
     * @static Int Obtenido de openssl_cipher_iv_length(self::$metodoEncriptacion);
     * ES ESPECÍFICO DE AES256CBC - CADA MÉTODO EN TEORÍA TIENE SU PROPIO LARGO
     */
    const LARGO_IV_AES256CBC = 16;
    /**
     * @static Obtenido de strlen(hash_hmac(self::$metodoEncriptacionKey2, $datosEncriptadosSSL, self::$KEY2, TRUE);)
     * ES ESPECÍFICO DE SHA312 - CADA MÉTODO EN TEORÍA TIENE SU PROPIO LARGO
     */
    const LARGO_HMAC_SHA312 = 64;

    /**
     * Este método encripta mediante dos algoritmos de entrada, y se asocia una llave (key) a cada uno:
     * 
     * - La Key 1 es aplicable a OpenSSL y se puede descifrar.
     * - La Key 2 es aplicable a Hash y no se puede descifrar - se debe comparar a futuro.
     * 
     * @param String $data Datos de entrada.
     * @return String Cadena codificada en base64.
     * 
     * @uses openssl_encrypt()
     * @uses hash_hmac()
     * @uses base64_encode()
     * 
     */
    static function encrypt($data)
    {
        if (in_array(self::$metodoEncriptacionSSL, openssl_get_cipher_methods())) {

            $iv = self::getIv();
            $datosEncriptadosSSL = openssl_encrypt($data, self::$metodoEncriptacionSSL, self::$KEY1, 0 , $iv);   
            $datosEncriptadosHmac = hash_hmac(self::$metodoEncriptacionHash, $datosEncriptadosSSL, self::$KEY2, TRUE);

            return base64_encode($iv . $datosEncriptadosHmac . $datosEncriptadosSSL);   

        }
        return false;
    }

    /**
     * @param String $encData Input. Datos codificados en base 64;
     * 
     * @uses openssl_encrypt()
     * @uses hash_hmac
     * 
     */
    static function decrypt($encData)
    {

        if (in_array(self::$metodoEncriptacionSSL, openssl_get_cipher_methods())) {

            $mix = base64_decode($encData);

            $iv = substr($mix, 0, self::LARGO_IV_AES256CBC);
            $datosEncriptadosHmac = substr($mix, self::LARGO_IV_AES256CBC, self::LARGO_HMAC_SHA312);
            $datosEncriptadosSSL = substr($mix, (self::LARGO_IV_AES256CBC + self::LARGO_HMAC_SHA312));
                       
            $data = openssl_decrypt($datosEncriptadosSSL, self::$metodoEncriptacionSSL, self::$KEY1, 0, $iv);
            
            $datosEncriptadosHmacClone = hash_hmac('sha3-512', $datosEncriptadosSSL, self::$KEY2, TRUE);
            return (hash_equals($datosEncriptadosHmac, $datosEncriptadosHmacClone)) ? $data : false;

        }

        return false;
    }

    /**
     * 
     * Este método devuelve un vector de inicialización para uso de Hashs.
     * Como parámetro, se utilizan propiedades del algoritmo / método de encriptación adoptado en la clase.
     * 
     * @uses self::$metodoEncriptacion
     * 
     * @link https://www.php.net/manual/en/function.openssl-random-pseudo-bytes
     * @link https://www.techtarget.com/whatis/definition/initialization-vector-IV
     * 
     */
    static function getIv()
    {
        /* Algoritmo descrito */
        /*
        $iv_length = openssl_cipher_iv_length(self::$metodoEncriptacion);
        $iv = openssl_random_pseudo_bytes($iv_length);
        return $iv;
        */

        return openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$metodoEncriptacionSSL));
    }
}
