<section class="d-flex flex-column mb-3 text-center">
    <label class="display-5"><?= $this->data['nom_inst'] ?></label>
    <hr>
    <label class="display-6">Bienvenido!</label>
</section>
<br>
<br>
<section class="d-flex justify-content-around">
    <p class="h2">Nombre: 
        <br>
        <strong><?= $this->data['nombre'] ?></strong> 
    </p>
    <?php if ($_SESSION['tipo'] == 'alumno') : ?>
    <p class="h2">Carrera: 
        <br>
        <strong><?= $this->data['desc_carr'] ?></strong>
    </p>
    <?php elseif ($_SESSION['tipo'] == 'docente') : ?>
    <p class="h2">Academia: 
        <br>
        <strong><?= $this->data['nom_academia'] ?></strong>
    </p>
    <?php endif; ?>
</section>