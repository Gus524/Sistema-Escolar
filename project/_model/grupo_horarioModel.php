<?php
class Grupo {
    public function __construct(
        public int $semestre,
        public string $turno,
        public int $no_grupo,
    )
    {}
}
class Horario {
    public function __construct(
        public string $dia = "",
        public string $hora_inicio = "",
        public string $hora_fin = "",
        public string $salon = "",
    ) {}
}

class Grupo_Horario {
    public Grupo $grupo;
    public array $horarios;
    private PDO $conn;
    public function __construct() {
        $this->get_connection();
    }
    public function consultar_horario_alumno($boleta, $periodo = 2) {
        try {
            $sql =  'CALL GetAlumnoHorario(?, ?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $boleta, PDO::PARAM_STR);
            $stmt->bindParam(2, $periodo, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in consultar_horario: " . $e->getMessage());
            return false;
        }
        
    }
    public function consultar_horario_docente($rfc, $periodo = 2) {
        try {
            $sql =  'CALL GetDocenteHorario(?, ?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $rfc, PDO::PARAM_STR);
            $stmt->bindParam(2, $periodo, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in consultar_horario: " . $e->getMessage());
            return false;
        }
    }
    public function get_connection() {
        $db = Connection::getInstance();
        $this->conn = $db->getConn();
    }
}