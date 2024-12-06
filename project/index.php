<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("DEFAULT_URL", "Escuelas");

require_once '_model/mainModel.php';

$querystring = isset($_GET['querystring']) ? $_GET["querystring"] : DEFAULT_URL;
$petitions = explode("/", $querystring);
$page = count($petitions) > 0 ? $petitions[0] : DEFAULT_URL;
$action = count($petitions) > 1 ? $petitions[1] : null;

switch ($page) {
  case 'Escuelas':
    if ($action == 'Prueba') {
      include '_controller/pruebaCtrl.php';
      $ctrl = new nuevoRegistro();
      break;
    }
    else {
      include '_controller/InstitucionCtrl.php';
      $ctrl = new InstitucionCtrl();
      break;
    }
  case 'Alumnos':
    include '_controller/alumnoCtrl.php';
    $ctrl = new AlumnoCtrl();
    break;
  default:
    include '_controller/InstitucionCtrl.php';
    $ctrl = new InstitucionCtrl();
    break;
}

$script = $ctrl->script;
$title = $ctrl->title;

include "_view/template/master.php";
