<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_NONE);
*/

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

    
    const NOMBRE_SISTEMA = "DOGO AGVP";
    const ID_SISTEMA = "AGVPDOGO";
    
    const WEBROOT = "/var/www/html/agvp_dogo";
    const APPDIR = "agvp_dogo";
        
    const SERVER = "http://localhost";
    const APPURL = "http://localhost/agvp_dogo";
    const HOMEURL = "http://localhost/agvp_dogo";
    const HOMEAUTH = "http://localhost/agvp_dogo";
    const HOMEADMIN = "http://localhost/agvp_dogo";
    
    const BD_SCHEMA = "dogo";
    const BD_USERS = "dogo";
    

}
