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
    <?php if ($this->calificaciones): ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <th>Grupo</th>
                <th>Clave</th>
                <th>Materia</th>
                <th>Primer parcial</th>
                <th>Segundo parcial</th>
                <th>Tercer parcial</th>
                <th>Extra</th>
                <th>Final</th>
            </thead>
            <tbody>
                <?php foreach ($this->calificaciones as $calificacion): ?>
                    <tr>
                        <td><?= $calificacion['grupo'] ?></td>
                        <td><?= $calificacion['clave'] ?></td>
                        <td><?= $calificacion['nom_materia'] ?></td>
                        <td><?= $calificacion['cal_parcial_1'] ?? "-" ?></td>
                        <td><?= $calificacion['cal_parcial_2'] ?? "-" ?></td>
                        <td><?= $calificacion['cal_parcial_3'] ?? "-" ?></td>
                        <td><?= $calificacion['cal_extra'] ?? "-" ?></td>
                        <td><?= $calificacion['cal_final'] ?? "-" ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h2>No estas inscrito en el periodo escolar actual</h2>
    <?php endif; ?>
</section>