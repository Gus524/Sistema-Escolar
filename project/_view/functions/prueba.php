<?php
include_once 'model/institucionModel.php';
$abr = $_POST['abreviatura'];
$nom = $_POST['nombre'];

$inst = new InstitucionModel(null, $abr, $nom);
$conn = $inst->getData();
$data = $inst->saveInstitution($conn);

echo json_encode($data);