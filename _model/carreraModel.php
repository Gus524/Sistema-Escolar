<?php
class Carrera {
    public function __construct(
        public string $abr_carr = "",
        public string $carrera = "",
        public int $no_sem = 0,
        public float $cred_total = 0.0,
    ) {}
    public static function get_carr_inst($institucion): ?array {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM GetCarrerasInst WHERE id_inst = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $institucion, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in get_carr_inst: " . $e->getMessage());
            return null;
        }
    }
}