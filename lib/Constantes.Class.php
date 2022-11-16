<?php

setlocale(LC_TIME, 'es_AR.utf8');

/**
 * 
 * Clase para mantener las directivas de sistema.
 * Deben coincidir con las configuraciones del proyecto.
 * 
 * @author Eder dos Santos <esantos@uarg.unpa.edu.ar>
 * 
 */
class Constantes {

    
    const NOMBRE_SISTEMA = "C.R.U.D.A.";
    const ID_SISTEMA = "CRUDA";
    
    const WEBROOT = "/var/www/html/cruda";
    const APPDIR = "cruda";
        
    const SERVER = "http://localhost";
    const APPURL = "http://localhost/cruda";
    const URL_LOGIN = "http://localhost/cruda/Vista/index.php";
    const URL_USUARIO = "http://localhost/cruda/Vista/menu.php";

}
