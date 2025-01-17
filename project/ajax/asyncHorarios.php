<?php
session_start();
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
include_once dirname(__FILE__) . "/../config/Global.php";
include_once 'asyncHorarioCtrl.php';
include_once 'connection.php';
$horarios = new AsyncHorarioCtrl();
$plan = @$_POST['selectPlan'];
$semestre = @$_POST['selectSemestre'];
$turno = @$_POST['selectTurno'];
$grupo = @$_POST['selectGrupo'];
$conn = Connection::getInstance($_SESSION['user'], $_SESSION['pass'])->getConn();
$horario = match(true) {
    isset($grupo) && $grupo != 'Todos' =>
        $horarios->get_horario_grupo($plan, $grupo),
    isset($plan) && isset($semestre) && isset($turno) => 
        $horarios->get_horario_plan_semestre($plan, $semestre, $turno),
};
echo json_encode($horario);