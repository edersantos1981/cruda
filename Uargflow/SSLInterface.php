<?php

namespace Uargflow;

/**
 * Interfaz para objetos SSLHandler.
 * 
 * @author esantos
 * 
 */
interface SSLInterface {

    /**
     * 
     * @param String $data
     * @return String Devuleve los datos encriptados y codificados en base64
     * 
     */
    static function encrypt($data);

    /**
     * 
     * @param String $encData
     * @return String Devuelve los datos decodificados y descifrados
     * 
     */
    static function decrypt($encData);

}
