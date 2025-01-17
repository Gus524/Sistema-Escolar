<h2>Datos personales</h2>
<hr>
<article class="d-flex flex-wrap justify-content-center gap-5">
    <article class="card flex-shrink-0 h-100" aria-hidden="true">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#868e96"></rect>
        </svg>
    </article>
    <article class="card flex-grow-1">
        <section class="btn-group" role="group" aria-label="botones">
            <input type="radio" class="btn-check" name="datos" value="Generales" id="chk_Generales" autocomplete="off" checked>
            <label class="btn btn-outline-dark" for="chk_Generales">Generales</label>
            <input type="radio" class="btn-check" value="Direccion" name="datos" id="chk_Direccion" autocomplete="off">
            <label class="btn btn-outline-dark" for="chk_Direccion">Direccion</label>
        </section>
        <article id="Generales">
            <p class="p-2">
                <strong>Academia: </strong> <?= $this->data['nom_academia'] ?>
            </p>
            <p class="p-2">
                <strong>Edificio: </strong> <?= $this->data['desc_edificio'] ?>
            </p>
            <p class="p-2">
                <strong>RFC: </strong> <?= $this->data['rfc'] ?>
            </p>
            <p class="p-2">
                <strong>Nombre: </strong> <?= $this->data['nombre'] ?>
            </p>
            <p class="p-2">
                <strong>Telefono personal: </strong> <?= $this->data['tel_doc'] ?>
            </p>
            <p class="p-2">
                <strong>Correo institucional: </strong> <?= $this->data['email_i_doc'] ?>
            </p>
            <p class="p-2">
                <strong>Correo personal: </strong> <?= $this->data['email_p_doc'] ?>
            </p>
        </article>
        <article id="Direccion" hidden>
            <p class="p-2">
                <strong>Calle: </strong> <?= $this->data['calle'] ?>
            </p>
            <p class="p-2">
                <strong>No exterior: </strong> <?= $this->data['no_ext'] ?>
            </p>
            <p class="p-2">
                <strong>No interior: </strong> <?= $this->data['no_int'] ?>
            </p>
            <p class="p-2">
                <strong>Colonia: </strong> <?= $this->data['colonia'] ?>
            </p>
            <p class="p-2">
                <strong>Delegacion: </strong> <?= $this->data['delegacion'] ?>
            </p>
            <p class="p-2">
                <strong>Codigo postal: </strong> <?= $this->data['cp'] ?>
            </p>
        </article>
    </article>
</article>