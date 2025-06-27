<?php
session_start();
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
include_once dirname(__FILE__) . '/../config/Global.php';
include_once 'asyncPlanCtrl.php';
include_once 'connection.php';
$conn = Connection::getInstance($_SESSION['user'], $_SESSION['pass'])->getConn();
$carrera = $_POST["carrera"];
$plan = $_POST['planEstudios'];
$table = AsyncPlanCtrl::get_mapa_curricular($plan, $carrera);
if ($table):
?>
    <table id="tbMapa" class="table table-striped table-hover">
        <thead class="table-dark">
            <th>Semestre</th>
            <th>Clave</th>
            <th>Materia</th>
            <th>Tipo</th>
            <th>Horas teoria</th>
            <th>Horas practica</th>
            <th>Creditos</th>
        </thead>
        <tbody>
            <?php foreach ($table as $mapa): ?>
                <tr>
                    <td><?= $mapa['semestre'] ?></td>
                    <td><?= $mapa['clave'] ?></td>
                    <td><?= $mapa['nom_materia'] ?></td>
                    <td><?= $mapa['tipo_materia'] ?></td>
                    <td><?= $mapa['horas_teoria'] ?></td>
                    <td><?= $mapa['horas_prac'] ?></td>
                    <td><?= $mapa['creditos'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <h2>No hay informacion padrino, metele datos a la base</h2>
<?php endif; ?>