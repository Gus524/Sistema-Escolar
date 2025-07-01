<?php
include_once 'connection.php';
function getRealClientIp() {
    $candidates = [
        'HTTP_X_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR',
    ];

    foreach ($candidates as $key) {
        if (!empty($_SERVER[$key])) {
            // Si contiene IP:PUERTO, elimina el puerto
            $ip = explode(':', $_SERVER[$key])[0];
            // Validar que sea una IP pública
            if (filter_var($ip, FILTER_VALIDATE_IP) && !isPrivateIp($ip)) {
                return $ip;
            }
        }
    }

    return 'UNKNOWN';
}

function isPrivateIp($ip) {
    return
        preg_match('/^127\./', $ip) ||
        preg_match('/^10\./', $ip) ||
        preg_match('/^172\.(1[6-9]|2[0-9]|3[0-1])\./', $ip) ||
        preg_match('/^192\.168\./', $ip) ||
        preg_match('/^169\.254\./', $ip); // Link-local (como la que Azure usa internamente)
}
class AuditService
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getConn();
    }

    public function logAction($accion, $user_id = null, $details): void
    {
        try {
            $ip_address = getRealClientIp();
            $stmt = $this->pdo->prepare(
                "INSERT INTO audit_log (ip_address, user_id, accion, detalles) VALUES (?, ?, ?, ?)"
            );

            if ($user_id === null && session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['user'])) {
                $user_id = $_SESSION['user'];
            }
            $user_id = $user_id ?? 'guest';

            $stmt->bindParam(1, $ip_address, PDO::PARAM_STR);
            $stmt->bindParam(2, $user_id, PDO::PARAM_STR);
            $stmt->bindParam(3, $accion, PDO::PARAM_STR);
            $stmt->bindParam(4, $details, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al escribir el log de auditoria: " . $e->getMessage());
        }
    }
}
