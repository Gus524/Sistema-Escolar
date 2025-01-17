<section class="row mb-3">
    <p class="col-lg-1 col-md-2 col-sm-4 h5">
        <strong>
            Boleta:
        </strong>
    </p>
    <label class="col-lg-11 col-md-10 col-sm-8 h5 form-label">
        <?= $this->user["no_boleta"] ?>
    </label>
    <p class="col-lg-1 col-md-2 col-sm-4 h5">
        <strong>
            Nombre:
        </strong>
    </p>
    <label class="col-lg-11 col-md-10 col-sm-8 h5 form-label">
        <?= $this->user['nombre'] ?>
    </label>
</section>
<hr>
<section class="row mb-3">
    <p class="col-lg-6 h5">
        <strong>
            Carrera:
        </strong>
        <?= $this->user['desc_carr'] ?>
    </p>
    <p class="col-lg-3 h5">
        <strong>
            Plan:
        </strong>
        <?= $this->user['desc_plan'] ?>
    </p>
    <p class="col-lg-3 h5">
        <strong>Promedio: </strong>
        <?= $this->user['promedio'] ?>
    </p>
</section>
<br>
<?php for ($i = 1; $i <= $this->user['ultimo_semestre']; $i++) :
    $semestre = match (true) {
        $i == 1 => 'Primer semestre',
        $i == 2 => 'Segundo semestre',
        $i == 3 => 'Tercer semestre',
        $i == 4 => 'Cuarto semestre',
        $i == 5 => 'Quinto semestre',
        $i == 6 => 'Sexto semestre',
        $i == 7 => 'Septimo semestre',
        $i == 8 => 'Octavo semestre',
        $i == 9 => 'Noveno semestre',
        $i == 10 => 'Decimo semestre',
    }
?>
    <article class="mb-3 text-center overflow-auto mh-50">
        <h5 class="display-6"><?= $semestre ?></h5>
        <article class="table-responsive rounded-4">
            <table class="table table-md table-striped table-hover">
                <thead class="table-dark">
                    <th>Clave</th>
                    <th>Materia</th>
                    <th>Fecha</th>
                    <th>Periodo</th>
                    <th>Forma Eval.</th>
                    <th>Calificacion</th>
                </thead>
                <tbody>
                    <?php foreach ($this->materias[$i] as $materia) : ?>
                        <tr>
                            <td><?= $materia['clave'] ?></td>
                            <td><?= $materia['nombre'] ?></td>
                            <td><?= $materia['fecha'] ?></td>
                            <td><?= $materia['periodo'] ?></td>
                            <td><?= $materia['forma'] ?></td>
                            <td><?= $materia['calificacion'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </article>
    </article>
<?php endfor; ?>