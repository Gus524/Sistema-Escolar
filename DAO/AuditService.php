<?php
include_once 'connection.php';
function getRealClientIp() {
    $ip = '';

    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] !== '') {
        $ip_addresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ip_addresses[0]);
    }
    else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    else if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }

    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        return $ip;
    }

    return 'UNKNOWN';
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
