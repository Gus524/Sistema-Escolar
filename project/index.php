<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '_model/mainModel.php';

$option = $_GET['option'] ?? 'listaEscuelas';

switch ($option) {
  case 'listaEscuelas':
    include '_controller/InstitucionCtrl.php';
    $ctrl = new InstitucionCtrl();
    break;
  case 'listaAlumnos':
    include '_controller/alumnoCtrl.php';
    $ctrl = new AlumnoCtrl();
    break;
}

$title = $ctrl->title;

include "_view/template/master.php";
