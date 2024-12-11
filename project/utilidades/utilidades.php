<?php
class Utilidades
{
    public static function get_tipo_usuario(string $user): string
    {
        return match (true) {
            preg_match('/^\d+$/', $user) === 1 => 'alumno',
            preg_match('/^[A-Z&Ñ]{3,4}\d{6}[A-Z\d]{3}$/', $user) === 1 => 'docente',
            default => 'gestion',
        };
    }

    public static function is_user_logged()
    {
        if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
            include 'login.php';
            exit();
        }
    }

    public static function close_loggin()
    {
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
