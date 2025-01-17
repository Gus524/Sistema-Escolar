<section class="row mb-3">
    <p class="col-lg-1 col-md-2 col-sm-4 h5">
        <strong>
            Boleta:
        </strong>
    </p>
    <label class="col-lg-11 col-md-10 col-sm-8 h5 form-label">
        <?= $this->datos['no_boleta'] ?>
    </label>
    <p class="col-lg-1 col-md-2 col-sm-4 h5">
        <strong>
            Nombre:
        </strong>
    </p>
    <label class="col-lg-11 col-md-10 col-sm-8 h5 form-label">
        <?= $this->datos['nombre'] ?>
    </label>
</section>
<hr>
<br>
<section class="table-responsive text-center rounded-4">
    <table id="tbHorario" class="table table-md table-striped table-hover">
        <thead class="table-dark">
            <th>Grupo</th>
            <th>Clave</th>
            <th>Materia</th>
            <th>Docente</th>
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
                    <td><?= $value['nombre'] ?></td>
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