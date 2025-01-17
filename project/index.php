<?php
session_start();

ini_set("display_errors", 1);

include_once 'config/Global.php';
include_once 'utilidades/utilidades.php';

//Se llama la funcion de navegacion y se obtiene el controllador
$ctrl = Utilidades::navigation();

$script = $ctrl->script;
$title = $ctrl->title;

include "_view/template/master.php";
