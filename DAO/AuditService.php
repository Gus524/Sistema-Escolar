<?php
include_once 'connection.php';
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
            $stmt = $this->pdo->prepare(
                "INSERT INTO audit_log (ip_address, user_id, accion, detalles) VALUES (?, ?, ?, ?)"
            );
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

            if ($user_id === null && isset($_SESSION['user'])) {
                $user_id = $_SESSION['user'];
            }

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
