<?php
include_once __DIR__ . '/../vendor/autoload.php'; 
include_once __DIR__ . '/../lib/Constantes.Class.php';

use Uargflow\SessionManager;
$handler = new SessionManager();
session_set_save_handler($handler, true);
SessionManager::start_session('cruda', true); 
SessionManager::checkUsuario();