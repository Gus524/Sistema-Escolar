<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user']) && isset($_SESSION['tipo'])) {
    header('Location: ' . SITE_URL . '/Inicio');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="src/css/login.css">
</head>

<body>
    <main>
        <section class="left">
            <img src="src/img/logo_p.png" alt="Logo">
        </section>
        <form id="formulario" method="post" action="login" class="right">
            <h2>Inicio de sesión</h2>
            <label for="user">Usuario: </label>
            <input type="text" id="user" name="user" placeholder="Usuario" required>
            <label for="pass">Contraseña: </label>
            <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
            <?php
            if (isset($_SESSION['error_message'])): ?>
                <label class="error"><?= $_SESSION['error_message']; ?></label>
                <?php unset($_SESSION['error_message']); // Lo borramos después de mostrarlo 
                ?>
            <?php endif; ?>
            <input type="submit" class="btn-aceptar" id="btnLogin" value="Iniciar Sesion">
        </form>
    </main>
</body>

</html>