<?php
class Plan {
    public function __construct(
        public string $plan = "",
        public string $desc_plan = "",
        public int $no_plan = 0,
        public string $abr_carr = '',
    ) {}
    public static function get_plan_carrera($carrera): ?array {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM GetForMapa WHERE abr_carr = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $carrera, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in get_planes: " . $e->getMessage());
            return null;
        }
    }
    public static function get_semestre_carrera($carrera): array|null {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM Carrera WHERE abr_carr = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $carrera, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in get_planes: " . $e->getMessage());
            return null;
        }
    }
}