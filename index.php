<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('ROOT_PATH', __DIR__ . '/');

include_once ROOT_PATH . 'config/Global.php';
include_once ROOT_PATH . 'utilidades/utilidades.php';

$ctrl = Utilidades::navigation();

if (isset($ctrl)) {
    $script = $ctrl->script ?? '';
    $title = $ctrl->title ?? 'School Shield';
    
    include_once ROOT_PATH . '_view/template/master.php';
}
