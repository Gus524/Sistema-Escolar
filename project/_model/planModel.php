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
            $sql = 'CALL GetPlanCarr(?)';
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