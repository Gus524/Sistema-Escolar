<?php
include_once dirname(__FILE__) . '/../../config/global.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ROOT_PATH.'_controller/InstitucionCtrl.php';
$abr = $_POST['abreviatura'];
$nom = $_POST['nombre'];

$data = InstitucionCtrl::save($abr, $nom);

echo $data;