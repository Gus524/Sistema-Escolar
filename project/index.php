<?php
session_start();

include_once 'config/Global.php';
include_once 'utilidades/utilidades.php';

// Comprobar si el usuario tiene sesion iniciada
Utilidades::is_user_logged();
// Se asigna el tipo de usuario a la variable de sesión
$_SESSION['tipo'] = Utilidades::get_tipo_usuario($_SESSION['user']);
// Se lee la URL de la navegación
$querystring = isset($_GET['querystring']) ? $_GET["querystring"] : DEFAULT_URL;
// Se comprueba si la URL termina con un slash
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
    // Se muestra la pagina de inicio
  case 'Inicio':
    include '_controller/inicioCtrl.php';
    $ctrl = new InicioCtrl();
    break;
    // Se muestra la pagina de horario
  case 'Horario':
    include '_controller/horarioCtrl.php';
    $ctrl = new HorarioCtrl();
    break;
    // Se muestra pagina de mapa curricular
  case 'Mapa':
    include '_controller/mapaCtrl.php';
    $ctrl = new MapaCtrl();
    break;
    // Se cierra la sesion
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
