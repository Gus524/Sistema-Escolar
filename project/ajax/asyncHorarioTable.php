<?php
header('Content-type: application/json');
$datos = json_decode(file_get_contents('php://input'), true);
$horarios = $datos['detalles'];
if($horarios):
?>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <th>Grupo</th>
        <th>Materia</th>
        <th>Docente</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Cupo</th>
        <th>Disponibles</th>
    </thead>
    <tbody>
        <?php foreach ($horarios as $horario): ?>
            <tr>
                <td><?= $horario['secuencia'] ?></td>
                <td><?= $horario['materia'] ?></td>
                <td><?= $horario['nombre'] ?></td>
                <td><?= $horario['lunes'] ?></td>
                <td><?= $horario['martes'] ?></td>
                <td><?= $horario['miercoles'] ?></td>
                <td><?= $horario['jue'] ?></td>
                <td><?= $horario['viernes'] ?></td>
                <td><?= $horario['cupo'] ?></td>
                <td><?= $horario['disponibles'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <h2>No se encontraron datos para mostrar</h2>
<?php endif; ?>