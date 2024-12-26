<?php
session_start();
include_once dirname(__FILE__) . '/../config/Global.php';
include_once 'asyncPlanCtrl.php';
include_once 'connection.php';
$conn = Connection::getInstance($_SESSION['user'], $_SESSION['pass'])->getConn();
$carrera = $_POST['carrera'];
$planes = AsyncPlanCtrl::get_plan_carrera($carrera);
echo json_encode($planes, $mapa);