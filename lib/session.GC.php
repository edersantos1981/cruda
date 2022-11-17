<?php
include_once __DIR__.'/../vendor/autoload.php';
$handler = new \Cruda\SessionManager();
session_set_save_handler($handler, true);
\Cruda\SessionManager::start_session('dogo', true);


session_gc();