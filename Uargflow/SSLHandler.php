<?php

namespace Uargflow;

include_once '../vendor/autoload.php';
class SSLHandler
{
    static $metodoEncriptacion = 'aes-128-ctr';

    static function encrypt($data)
    {
        if (in_array(self::$metodoEncriptacion, openssl_get_cipher_methods())) {
            $iv = self::getIv();
            $encData = openssl_encrypt($data, self::$metodoEncriptacion, self::getHash(), 0, $iv);
            
            return base64_encode($iv . $encData);
        }
        return false;
    }

    static function decrypt($encData)
    {

        if (in_array(self::$metodoEncriptacion, openssl_get_cipher_methods())) {
            $b64DecData = base64_decode($encData);
            $substrIv = substr($b64DecData, 0, openssl_cipher_iv_length(self::$metodoEncriptacion));
            $substrData = substr($b64DecData, openssl_cipher_iv_length(self::$metodoEncriptacion));
            return openssl_decrypt($substrData, self::$metodoEncriptacion, self::getHash(), 0, $substrIv);
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
