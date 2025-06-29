<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include_once 'config/Global.php';
include_once ROOT_PATH . 'utilidades/utilidades.php';

//Se llama la funcion de navegacion y se obtiene el controllador
$ctrl = Utilidades::navigation();

$script = $ctrl->script;
$title = $ctrl->title;

include_once ROOT_PATH . "_view/template/master.php";
