<?php
session_start();

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'config/Global.php';
include_once 'utilidades/utilidades.php';

Utilidades::is_user_logged();
$_SESSION['tipo'] = Utilidades::get_tipo_usuario($_SESSION['user']);

$querystring = isset($_GET['querystring']) ? $_GET["querystring"] : DEFAULT_URL;

if (!str_ends_with($querystring, '/')) {
  $querystring .= '/';
}

// Divide la URL en partes
$petitions = explode("/", $querystring);
// Obtiene la página solicitada
$page = isset($petitions[0]) ? $petitions[0] : "";
// Obtiene la acción solicitada
$action = isset($petitions[1]) ? $petitions[1] : "";
// Obtiene el id solicitado
$id = isset($petitions[2]) ? $petitions[2] : "";

// Comprueba que controlador se debe utilizar
switch ($page) {
  case 'Inicio':
      include '_controller/inicioCtrl.php';
      $ctrl = new InicioCtrl();
    break;
  case 'Horario':
      include '_controller/horarioCtrl.php';
      $ctrl = new HorarioCtrl();
    break;
  case 'Cerrar':
      Utilidades::close_loggin();
    break;
  default:
  // En caso de no encontrar la página solicitada se muestra un error 404
    echo "<h1>404 Not Found</h1> <br> <h3>La página solicitada no existe</h3>";
    die();
}

$script = $ctrl->script;
$title = $ctrl->title;

include "_view/template/master.php";
