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
    public function __construct() {
    }

    public function consultar_grupo_alumnos($grupo, $clave){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM GetAlumnosGrupo WHERE grupo = ? AND clave = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $grupo, PDO::PARAM_STR);
            $stmt->bindParam(2, $clave, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("No purula". $e->getMessage());
            return $e->getMessage();
        }
    }
    public function consultar_horario_alumno($boleta) {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql =  'SELECT * FROM GetAlumnoHorario WHERE no_boleta = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $boleta, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in consultar_horario: " . $e->getMessage());
            return false;
        }
        
    }
    public function consultar_horario_docente($rfc) {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql =  'SELECT * FROM GetDocenteHorario WHERE rfc = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $rfc, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in consultar_horario: " . $e->getMessage());
            return false;
        }
    }
    public function get_horarios_plan_semestre($plan, $semestre){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = $this->get_sentencia() . 'WHERE activo = 1 AND id_plan = ? AND semestre = ? ORDER BY turno, no_grupo, no_materia ASC';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $plan, PDO::PARAM_INT);
            $stmt->bindParam(2, $semestre, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log('Algo no purula'. $e->getMessage());
            return false;
        }
    }
    public function get_horario_turno($plan, $semestre, $turno){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = $this->get_sentencia() . 'WHERE activo = 1 AND id_plan = ? AND semestre = ? AND turno = ? ORDER BY turno, no_grupo, no_materia ASC';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $plan, PDO::PARAM_INT);
            $stmt->bindParam(2, $semestre, PDO::PARAM_INT);
            $stmt->bindParam(3, $turno, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log('Algo no purula'. $e->getMessage());
            return false;
        }
    }
    public function get_horario_grupo($plan, $grupo){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = $this->get_sentencia() . 'WHERE activo = 1 AND id_plan = ? HAVING secuencia = ? ORDER BY turno, no_grupo, no_materia ASC';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $plan, PDO::PARAM_INT);
            $stmt->bindParam(2, $grupo, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log('Algo no purula'. $e->getMessage());
        }
    }
    public function get_sentencia(): string{
        return "SELECT 	CONCAT(semestre, abr_carr, turno, semestre, no_grupo) AS secuencia,
                        CONCAT(abr_carr, semestre, no_materia) AS clave,
                        materia,
                        nombre,
                        lunes,
                        martes,
                        miercoles,
                        jue,
                        viernes,
                        cupo,
                        disponibles,
                        sobrecupo
                FROM GetHorarios ";
    }
    public function get_grupos($plan, $semestre) {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT secuencia FROM GetGruposPlan WHERE activo = 1 AND id_plan = ? AND semestre = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $plan, PDO::PARAM_INT);
            $stmt->bindParam(2, $semestre, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log('Algo no purula'. $e->getMessage());
        }
    }
    public function get_grupos_turno($plan, $semestre, $turno){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT secuencia FROM GetGruposPlan WHERE activo = 1 AND id_plan = ? AND semestre = ? AND turno = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $plan, PDO::PARAM_INT);
            $stmt->bindParam(2, $semestre, PDO::PARAM_INT);
            $stmt->bindParam(3, $turno, PDO::PARAM_STR_CHAR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log('Algo no purula'. $e->getMessage());
        }
    }
}