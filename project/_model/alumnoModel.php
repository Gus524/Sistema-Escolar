<?php
require_once '_model/usuarioModel.php';
class Alumno extends Usuario {
    public function __construct(
        private $no_boleta = "",
    ) {}
    public function consultar_inscripcion() {
        
    }
    public function consultar_calificaciones() {

    }
    public function inscribir_grupo(){

    }
    public function consultar_kardex(){

    }
    public function consultar_estado_general(){

    }
    public function consultar_cita_reinscripcion() {

    }
    public function consultar_trayectoria(){

    }
    public function inicio(){
        try {
            $sql = "CALL InicioAlumno(?)";
            $stmt = $this->conn->prepare($sql);
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