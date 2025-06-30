<h2>Mapa curricular</h2>
<br>
<form id="formMapa" class="row mb-3">
    <label class="col-6 form-label" for="carrera">
        Carrera:
        <select class="form-select" name="carrera" id="carrera">
            <option selected disabled>Selecciona una carrera</option>
            <?php foreach ($this->carreras as $carrera) : ?>
                <option value="<?= $carrera['abr_carr'] ?>"><?= $carrera['carrera'] ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label class="col-6 form-label" for="planEstudios">
        Plan de estudios:
        <select class="form-select" name="planEstudios" id="planEstudios" disabled>
            <?php foreach ($this->planes as $plan) : ?>
                <option value="<?= $plan['id_plan'] ?>"><?= $plan['plan'] ?></option>
            <?php endforeach; ?>
        </select>
    </label>
</form>
<hr>
<br>
<section id="mapaCurricular" class="table-responsive d-flex justify-content-center text-center rounded-4">

</section>