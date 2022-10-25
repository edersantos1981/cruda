<?php
include_once __DIR__.'/../vendor/autoload.php';
$handler = new \Uargflow\SessionManager();
session_set_save_handler($handler, true);
\Uargflow\SessionManager::start_session('dogo', true);


session_gc();