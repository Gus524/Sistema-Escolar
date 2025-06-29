<?php
$error_message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once ROOT_PATH . 'DAO/connection.php';
    require_once ROOT_PATH . 'DAO/AuthService.php';

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $authService = new AuthService();
    $userData = $authService->attemptLogin($user, $pass);

    if ($userData) {
        session_regenerate_id(true);
        $_SESSION['user'] = $userData['usuario'];
        $_SESSION['tipo'] = $userData['tipo'];
        header('Location: Inicio'); // La redirección en caso de ÉXITO se mantiene.
        exit();
    } else {
        $error_message = "Usuario o contraseña incorrectos.";
    }
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user']) && isset($_SESSION['tipo'])) {
    header('Location: Inicio');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="src/css/login.css">
</head>

<body>
    <main>
        <section class="left">
            <img src="src/img/logo_p.png" alt="Logo">
        </section>
        <form id="formulario" method="post" action="" class="right">
            <h2>Inicio de sesión</h2>
            <label for="user">Usuario: </label>
            <input type="text" id="user" name="user" placeholder="Usuario" required>
            <label for="pass">Contraseña: </label>
            <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
            <?php 
            if ($error_message): ?> 
                <label class="error"><?= $error_message; ?></label> 
            <?php endif; ?>
            <input type="submit" class="btn-aceptar" id="btnLogin" value="Iniciar Sesion">
        </form>
    </main>
</body>

</html>