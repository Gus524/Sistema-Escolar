<?php
require_once 'connection.php';
require_once ROOT_PATH . 'utilidades/utilidades.php'; // Ajusta la ruta si es necesario

class AuthService {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Connection::getInstance()->getConn();
    }
    public function attemptLogin(string $user, string $password) {
        $tipo = Utilidades::get_tipo_usuario($user);

        switch ($tipo) {
            case 'alumno':
                $table = 'Alumno';
                $id_column = 'boleta';
                break;
            case 'docente':
                $table = 'Docente';
                $id_column = 'rfc';
                break;
            case 'gestion':
                $table = 'Gestion';
                $id_column = 'usuario';
                break;
            default:
                return false;
        }

        $stmt = $this->pdo->prepare(
            "SELECT *, '{$tipo}' as tipo FROM {$table} WHERE {$id_column} = ?"
        );
        $stmt->execute([$user]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData && password_verify($password, $userData['password_hash'])) {
            unset($userData['password_hash']);
            return $userData;
        }

        return false;
    }
}