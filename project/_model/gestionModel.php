<?php
class Gestion_Escolar {
    public function __construct(
        private $user = null,
    )
    {}
    public function inicio() {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = "SELECT * FROM GetInicioGestion WHERE usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$this->user, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in inicio: " . $e->getMessage());
            return null;
        }
    }
    public function cargar_grupo (){

    }
    public function dar_baja_alumno (){

    }
    public function inscribir_alumno (){

    }   
    public function actualizar_horario(){

    }
    public function actualizar_alumno() {

    }
    public function consultar_grupos() {
        
    }
}