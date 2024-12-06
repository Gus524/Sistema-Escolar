<h2>Tabla de escuelas</h2>
<section class="table-responsive" style="padding: 10px">
  <table id="tbEscuelas" class="table table-md table-striped table-hover">
    <thead>
      <tr>
        <th>Clave</th>
        <th>Escuela</th>
        <th>Abreviatura</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->data as $institucion): ?>
        <tr>
        <td> <?= $institucion['id_inst'] ?> </td>
        <td id="nombre_<?= $institucion['id_inst'] ?>"> <?= $institucion['nom_inst'] ?> </td>
        <td id="abr_<?= $institucion['id_inst'] ?>"> <?= $institucion['abreviatura'] ?> </td>
        <td>
          <a href="#" class="edit-btn">
            <?= '<i class="fa-solid fa-pen-to-square" id="edit_'. $institucion["id_inst"].'"></i>' ?>
          </a>
          <a href="#" class="delete-btn">
            <?= '<i class="fa-solid fa-trash-can" id="delete_'. $institucion["id_inst"].'"></i>' ?>
          </a>
        </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
  </table>
</section>
