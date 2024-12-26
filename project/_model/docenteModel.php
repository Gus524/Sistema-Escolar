<?php
include_once 'usuarioModel.php';
class Docente extends Usuario {
    public function __construct(
        private string $rfc = '',
    )
    {
        parent::__construct();
    }
    public function inicio(){
        try {
            $sql = "CALL InicioDocente(?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->rfc, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in inicio: " . $e->getMessage());
            return null;
        }
    }
    public function subir_calificacion() {

    }
    public function consultar_alumnos(){

    }
    public function consultar_grupos(){

    }
    public function actualizar_calificacion(){

    }
}