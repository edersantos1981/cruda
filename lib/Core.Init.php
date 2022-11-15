<?php
include_once __DIR__ . '/../vendor/autoload.php'; 
use Uargflow\SessionManager;
$handler = new \Uargflow\SessionManager();
session_set_save_handler($handler, true);
\Uargflow\SessionManager::start_session('cruda', true); 
SessionManager::checkUsuario();
?>