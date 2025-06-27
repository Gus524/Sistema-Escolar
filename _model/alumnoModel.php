<?php
require_once 'usuarioModel.php';
class Alumno extends Usuario {
    public function __construct(
        private $no_boleta = "",
    ) {
        parent::__construct();
    }
    public function consultar_inscripcion() {
        
    }
    public function consultar_datos(){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM GetDatosAlumno WHERE no_boleta = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(  1, $this->no_boleta, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("No purula") . $e->getMessage();
        }
    }
    public function consultar_calificaciones($plan) {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = "SELECT * FROM GetAlumnoCalificaciones WHERE (no_boleta, id_plan) = (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->no_boleta, PDO::PARAM_INT);
            $stmt->bindParam(2, $plan, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error en calificaciones: ". $e->getMessage());
            return null;
        }
    }
    public function inscribir_grupo(){

    }

    public function consultar_historial_alumno() {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = "SELECT * FROM GetHistorialAlumno WHERE no_boleta = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->no_boleta, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("No hay historial". $e->getMessage());
        }
    }
    public function consultar_historial_detalle(){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = "SELECT * FROM GetHistorialDetalle WHERE no_boleta = ? ORDER BY clave";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->no_boleta, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $materiasSemestre = [];
            foreach($result as $fila) {
                $semestre = $fila['semestre'];
                $materia = [
                    'nombre' => $fila['nom_materia'],
                    'clave' => $fila['clave'],
                    'fecha' => $fila['fecha_eval'],
                    'periodo' => $fila['desc_periodo'],
                    'forma' => $fila['forma_eval'],
                    'calificacion' => $fila['calificacion']
                ];
                $materiasSemestre[$semestre][] = $materia;
            }
            return $materiasSemestre;
        } catch (PDOException $e) {
            error_log("xd". $e->getMessage());
        }
    }
    public function consultar_estado_general($plan){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = "SELECT * FROM GetEstadoGeneralAlumno WHERE (no_boleta, id_plan) = (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->no_boleta, PDO::PARAM_INT);
            $stmt->bindParam(2, $plan, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error en calificaciones: ". $e->getMessage());
            return null;
        }
    }
    public function consultar_cita_reinscripcion() {

    }
    public function consultar_trayectoria(){

    }
    public function inicio(){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = "SELECT * FROM GetInicioAlumno WHERE no_boleta = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$this->no_boleta, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in inicio: " . $e->getMessage());
            return null;
        }
    }
    public static function getAlumnos(PDO $conn){
        try {
            $sql = "SELECT * FROM getAlumnos";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in getAlumnos: " . $e->getMessage());
            return null;
        }
    }
}