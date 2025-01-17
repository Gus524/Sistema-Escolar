<h2>Detalle del grupo</h2>
<hr>
<?php if ($this->data) : ?>
    <article class="table-responsive text-center rounded-4">
        <table class="table table-md table-hover">
            <thead class="table-dark">
                <th>Boleta</th>
                <th>Correo personal</th>
                <th>Correo institucional</th>
                <th>Nombre</th>
                <th>Parcial 1</th>
                <th>Parcial 2</th>
                <th>Parcial 3</th>
                <th>Extra</th>
                <th>Promedio</th>
            </thead>
            <tbody>
                <?php foreach ($this->data as $alumno) : ?>
                    <tr>
                        <td id="<?= $alumno['no_boleta'] ?>"><?= $alumno['no_boleta'] ?></td>
                        <td><?= $alumno['email_p_alumno'] ?></td>
                        <td><?= $alumno['email_i_alumno'] ?? "" ?></td>
                        <td><?= $alumno['nombre'] ?></td>
                        <td><?= $alumno['cal_parcial_1'] ?? "-" ?></td>
                        <td><?= $alumno['cal_parcial_2'] ?? "-" ?></td>
                        <td><?= $alumno['cal_parcial_3'] ?? "-" ?></td>
                        <td><?= $alumno['cal_extra'] ?? "-" ?></td>
                        <td><?= $alumno['cal_final'] ?? "-" ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </article>
    </article>

<?php else : ?>
    <h2>No hay informacion para mostrar</h2>
<?php endif; ?>