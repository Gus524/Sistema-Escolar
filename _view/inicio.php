<?php
// Se obtiene el id de la institucion para el manejo del sistema
$_SESSION['id_inst'] = $this->data['id_inst'];
?>
<section class="d-flex flex-column mb-3 text-center">
    <label class="h1"><?= $this->data['nom_inst'] ?></label>
    <hr>
    <label class="h2">Bienvenido!</label>
</section>
<br>
<br>
<section class="d-flex justify-content-around">
    <?php if ($_SESSION['tipo'] == 'gestion') : ?>
        <p class="h2">
            <strong>
                Usuario: 
            </strong>
            Gestion Escolar
        </p>
    <?php else : ?>
        <p class="h2"><strong>
                Nombre:
            </strong>
            <br>
            <?= $this->data['nombre'] ?>
        </p>
        <?php if ($_SESSION['tipo'] == 'alumno') : ?>
            <p class="h2"><strong>Carrera:</strong>
                <br>
                <?= $this->data['desc_carr'] ?>
            </p>
        <?php elseif ($_SESSION['tipo'] == 'docente') : ?>
            <p class="h2">
                <strong>
                    Academia:
                </strong>
                <br>
                <?= $this->data['nom_academia'] ?>
            </p>
        <?php endif; ?>
    <?php endif; ?>
</section>