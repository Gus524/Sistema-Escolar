<?php
require_once 'DAO/connection.php';
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pass'])) {
    header('Location: Inicio');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    try {
        $db = Connection::getInstance($user, $pass);
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos.";
        header('Location: login.php'); // Redirige a login.php
        exit();
    }
    $conn = $db->getConn();
    if ($conn != null) {    
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass; 
        header('Location: Inicio');
        exit();
    }
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
        <form id="formulario" method="post" action="login.php" class="right">
            <h2>Inicio de sesión</h2>
            <label for="user">Usuario: </label>
            <input type="text" id="user" name="user" placeholder="Usuario" required>
            <label for="pass">Contraseña: </label>
            <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
            <?php 
            if (isset($_SESSION['error_message'])): ?> 
                <label class="error"><?= $_SESSION['error_message']; ?></label> 
                <?php unset($_SESSION['error_message']); ?> 
            <?php endif; ?>
            <input type="submit" class="btn-aceptar" id="btnLogin" value="Iniciar Sesion">
        </form>
    </main>
</body>

</html>