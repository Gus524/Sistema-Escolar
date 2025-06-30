<h2>Horarios de clase</h2>
<br>
<form id="formHorario" class="row">

    <label class="col-6 mb-3 col-sm-12">
        Carrera:
        <select class="form-select" id="selectCarrera" name="carrera">
            <option selected disabled>Selecciona una carrera</option>
            <?php foreach ($this->carreras as $carrera): ?>
                <option value="<?= $carrera['abr_carr'] ?>"><?= $carrera['carrera'] ?></option>
                <?php endforeach; ?>'
        </select>
    </label>
    <label class="col-6 mb-3 col-sm-12">
        Plan de estudios:
        <select class="form-select" disabled id="selectPlan" name="selectPlan">
            <?php foreach ($this->planes as $plan) : ?>
                <option value="<?= $plan['id_plan'] ?>"><?= $plan['plan'] ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label class="col-3 mb-3 col-sm-4">
        Turno:
        <select class="form-select" disabled id="selectTurno" name="selectTurno">
            <option value="Mix" selected>Mixto</option>
            <option value="M">Matutino</option>
            <option value="V">Vespertino</option>
        </select>
    </label>
    <label class="col-2 mb-3 col-sm-4">
        Semestre:
        <select class="form-select" disabled id="selectSemestre" name="selectSemestre">
            <option selected>Semestre</option>
        </select>
    </label>
    <label class="col-3 mb-3 col-sm-4">
        Grupo:
        <select class="form-select" disabled id="selectGrupo" name="selectGrupo">
            <option selected>Todos</option>
        </select>
    </label>
    <label class="col-4 mb-3 col-sm-12">
        Materia:
        <section class="input-group">
            <input class="form-control" type="text" id="txtMateria" name="materia">
            <button class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></button>
        </section>
    </label>
</form>
<hr>
<section id="showHorarios" class="table-responsive text-center rounded-4">
    <br>

</section>