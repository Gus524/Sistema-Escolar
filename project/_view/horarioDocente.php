<h2 class="h2">Horario</h2>
<hr>
<br>
<section class="table-responsive text-center">
    <table id="tbHorario" class="table table-md table-striped table-hover">
        <thead class="table-dark">
            <th>Grupo</th>
            <th>Clave</th>
            <th>Materia</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </thead>
        <tbody>
            <?php foreach ($this->data as $value) { ?>
                <tr>
                    <td><?= $value['grupo'] ?></td>
                    <td><?= $value['clave'] ?></td>
                    <td><?= $value['nom_materia'] ?></td>
                    <td><?= $value['lunes'] ?? "-" ?></td>
                    <td><?= $value['martes']  ?? "-"  ?></td>
                    <td><?= $value['miercoles']  ?? "-"  ?></td>
                    <td><?= $value['jueves']  ?? "-"  ?></td>
                    <td><?= $value['viernes']  ?? "-"  ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>