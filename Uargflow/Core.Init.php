<?php
include_once __DIR__ . '/../vendor/autoload.php'; 
include_once __DIR__ . '/../lib/Constantes.Class.php';

use Uargflow\SessionManager as SM;
$handler = new SM();
session_set_save_handler($handler, true);
SM::start_session('cruda', true); 
SM::checkUsuario();