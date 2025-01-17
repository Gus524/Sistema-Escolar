<?php
header('Content-type: application/json');
$datos = json_decode(file_get_contents('php://input'), true);
$horarios = $datos['detalles'];
if($horarios):
?>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <th>Grupo</th>
        <th>Clave</th>
        <th>Materia</th>
        <th>Docente</th>
        <th>Cupo</th>
        <th>Disponibles</th>
        <th>Sobrecupo</th>
    </thead>
    <tbody>
        <?php foreach ($horarios as $horario): ?>
            <tr>
                <td><?= $horario['secuencia'] ?></td>
                <td><?= $horario['clave'] ?></td>
                <td><?= $horario['materia'] ?></td>
                <td><?= $horario['nombre'] ?></td>
                <td><?= $horario['cupo'] ?></td>
                <td><?= $horario['disponibles'] ?></td>
                <td><?= $horario['sobrecupo'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <br>
    <h2>No se encontraron datos para mostrar</h2>
<?php endif; ?>