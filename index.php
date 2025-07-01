<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
print_r(getallheaders());
echo $_SERVER['HTTP_X_FORWARDED_FOR'];
echo $_SERVER['REMOTE_ADDR'];
define('ROOT_PATH', __DIR__ . '/');

include_once ROOT_PATH . 'config/Global.php';
include_once ROOT_PATH . 'utilidades/utilidades.php';

$ctrl = Utilidades::navigation();

if (isset($ctrl)) {
    $script = $ctrl->script ?? '';
    $title = $ctrl->title ?? 'School Shield';
    
    include_once ROOT_PATH . '_view/template/master.php';
}
