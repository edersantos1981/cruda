<?php

namespace Uargflow;

use phpDocumentor\Reflection\Types\Boolean;

include_once '../vendor/autoload.php';

/**
 * Esta clase permite crear y acceder a Tokens de sesión codificados mediante un algoritmo Hash.
 * Se utiliza principalmente en el envío de formularios, para evitar ataques CSRF.
 * Para la creación del Token, se emplea hashing y se utilizan datos de sesión. 
 * Una vez verificado, un token se destruye automáticamente.
 * 
 * @link https://www.php.net/manual/en/function.uniqid.php 
 * @link https://www.php.net/manual/en/function.password-hash
 * 
 * @example ../Vista/SesionToken.Ejemplo.php Como usar esta librería
 * 
 * @todo    19/10/2022  Esta clase no verifica la existencia de una sesión, y no inicia una sesión. Se puede hacer un chequeo adicional.
 * 
 * Modo de Uso
 * - Paso 1 - Formulario : Crear input de tipo hidden y asignar el Token
 * - Paso 2 - Verificación : Corroborar con el método check
 * 
 * */

class SessionToken
{

    public static function createToken()
    {
        if (!$_SESSION['token']) {
            $_SESSION['token'] = password_hash(uniqid(), PASSWORD_BCRYPT);
        }
        return true;
    }

    /**
     * 
     * @return  String      Token creado.
     * @todo    19/10/22    Verificar posibles errores (ej:) session no iniciada.
     * @todo    19/10/22    Refactoring de la variable de sesión Token
     * 
     */
    public static function getToken()
    {
        return $_SESSION['token'];
    }

    /**
     * 
     * Este método verifica un token dado.
     * Se utiliza en el procesamiento de datos pasado por GET o POST.
     * Una vez verificado, se debe eliminar el token de la sesión, inmediatamente.
     * 
     * @param   String      Token
     * @return  Boolean     
     * @todo    19/10/22    Refactoring de la variable de sesión Token
     * 
     * 
     */
    public static function checkToken($token_ = null)
    {
        if (!$token_) return false;

        if (isset($_SESSION['token']) && $token_ === $_SESSION['token']) {
            unset($_SESSION['token']);
            return true;
        }

        return false;
    }
}
