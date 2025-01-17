<!-- Pagina para mostrar los grupos con secuencia que tiene el docente -->
<h2>Grupos</h2>
<hr>
<article class="table-responsive text-center rounded-4">
    <table class="table table-md table-hover">
        <thead class="table-dark">
            <th>Grupo</th>
            <th>Clave</th>
            <th>Materia</th>
            <th>Inscritos</th>
            <th>Detalles</th>
        </thead>
        <tbody>
            <?php foreach ($this->data as $dato) : ?>
                <tr>
                    <td id="<?= $dato['grupo'] ?>"><?= $dato['grupo'] ?></td>
                    <td id="<?= $dato['clave'] ?>"><?= $dato['clave'] ?></td>
                    <td><?= $dato['nom_materia'] ?></td>
                    <td><?= $dato['inscritos']?></td>
                    <td>
                        <?= "<a class='details-btn' href='Grupos/". $dato['grupo'] . "-" . $dato['clave']. "'>" ?>
                        <i class="fa-solid fa-circle-info"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>