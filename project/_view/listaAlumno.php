<h2>Alumnos</h2>
<section class="table-responsive" style="padding: 10px">
  <table id="tbProductos" class="table table-md table-striped table-hover">
    <thead>
      <tr>
        <th>Boleta</th>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Plan</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->data as $alumno): ?>
        <tr>
        <td> <?= $alumno['no_boleta'] ?> </td>
        <td id="nombre_<?= $alumno['no_boleta'] ?>"> <?= $alumno['nom_al'] ?> </td>
        <td id="carr_<?= $alumno['no_boleta'] ?>"> <?= $alumno['desc_carr'] ?> </td>
        <td id="plan_<?= $alumno['no_boleta'] ?>"> <?= $alumno['desc_plan'] ?> </td>
        <td>
          <a href="#" class="edit-btn">
            <?= '<i class="fa-solid fa-pen-to-square" id="edit_'. $alumno['no_boleta'].'"></i>' ?>
          </a>
          <a href="#" class="delete-btn">
            <?= '<i class="fa-solid fa-trash-can" id="delete_'. $alumno['no_boleta'].'"></i>' ?>
          </a>
        </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
  </table>
</section>
