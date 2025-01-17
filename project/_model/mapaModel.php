<?php
class MapaCurricular {
    public function __construct (
        private string $clave = "",
        public string $nombre = "",
        public float $creditos = 0.0,
        public float $horas_teoria = 0.0,
        public float $horas_prac = 0.0,
    )
    {}
    public function get_mapa_curricular($plan, $carrera) {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM GetMapaCurricular WHERE id_plan = ? AND abr_carr = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $plan, PDO::PARAM_STR);
            $stmt->bindParam(2, $carrera, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in get_mapa_curricular: " . $e->getMessage());
            return false;
        }
    }

    public function get_form_map($institucion) {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM GetForMapa WHERE abr_carr = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $institucion, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in get_form_map: " . $e->getMessage());
            return false;
        }
    }
}