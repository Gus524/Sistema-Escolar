<h2>Estado general</h2>
<br>
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
<section class="accordion" id="estadoMaterias" data-bs-theme="dark">
    <article class="accordion-item" data-bs-theme="light">
        <header class="accordion-header">
            <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseReprobadas" aria-expanded="false" aria-controls="flush-collapseReprobadas">
                Materias reprobadas
            </button>
        </header>
        <article id="flush-collapseReprobadas" class="accordion-collapse collapse bg-secondary-subtle text-secondary-emphasis" data-bs-parent="#estadoMaterias">
                <?php foreach ($this->materias as $materia) :
                    if ($materia['estado'] == 'REPROBADA') { ?>
                        <p class="accordion-body f-6"><?= $materia['nom_materia'] . ' (' . $materia['nom_academia'] . ')' ?> </p>
                    <?php }
                endforeach; ?>
        </article>
    </article>
    <article class="accordion-item"  data-bs-theme="light">
        <header class="accordion-header">
            <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNoCursadas" aria-expanded="false" aria-controls="flush-collapseNoCursadas">
                Materias no cursadas
            </button>
        </header>
        <article id="flush-collapseNoCursadas" class="accordion-collapse collapse bg-secondary-subtle text-secondary-emphasis" data-bs-parent="#estadoMaterias">
                <?php foreach ($this->materias as $materia) :
                    if ($materia['estado'] == 'NO CURSADA') : ?>
                        <p class="accordion-body fs-6"> <?= $materia['nom_materia'] . ' (' . $materia['nom_academia'] . ')' ?> </p>
                    <?php endif;
                endforeach; ?>
        </article>
    </article>
    <article class="accordion-item" data-bs-theme="light">
        <header class="accordion-header">
            <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseDesfasadas" aria-expanded="false" aria-controls="flush-collapseDesfasadas">
                Materias desfasadas
            </button>
        </header>
        <article id="flush-collapseDesfasadas" class="accordion-collapse collapse bg-secondary-subtle text-secondary-emphasis" data-bs-parent="#estadoMaterias">
                <?php foreach ($this->materias as $materia) :
                    if ($materia['estado'] == 'DESFASADA') { ?>
                        <p class="accordion-body f-6><?= $materia['nom_materia'] . ' (' . $materia['nom_academia'] . ')' ?></p>
                    <?php }
                endforeach; ?>
        </article>
    </article>
</section>