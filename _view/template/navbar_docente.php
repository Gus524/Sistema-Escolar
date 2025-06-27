<header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-2 px-3" data-bs-theme="dark">
  <nav class="container-fluid px-3">
    <a class="navbar-brand" href="Inicio">
      <img src="<?= SITE_URL ?>/src/img/logo_p.png" width="50" height="45" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <section class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
      <section class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Periodo escolar actual
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="Horario">Horario actual</a>
              </li>
              <li>
                <a class="dropdown-item" href="Grupos">Grupos</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Horarios
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="Ocupabilidad">Ocupabilidad</a>
              </li>
              <li>
                <a class="dropdown-item" href="Horarios">Horarios de clase</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Detalles Escolares
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#">Agenda escolar</a>
              </li>
              <li>
                <a class="dropdown-item" href="Mapa">Mapa curricular</a>
              </li>
                <a class="dropdown-item" href="#">Calendario ETS</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown d-flex align-items-center">
            <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="Datos">Datos Personales</a>
              </li>
              <li>
                <hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="Cerrar">Cerrar Sesion</a>
              </li>
            </ul>
          </li>
        </ul>
      </section>
    </section>
  </nav>
</header>
<!-- Main Content -->
<main class="content p-5">