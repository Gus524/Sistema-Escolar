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
            $conn = Connection::getInstance()->getConn();
            $sql = "SELECT * FROM GetInicioDocente WHERE rfc = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->rfc, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in inicio: " . $e->getMessage());
            return null;
        }
    }
    public function consultar_datos() {
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM GetDatosDocente WHERE rfc = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(  1, $this->rfc, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("No purula") . $e->getMessage();
        }
    }
    public function subir_calificacion() {

    }
    public function consultar_alumnos(string $grupo, string $clave){
        try {
            $conn = Connection::getInstance()->getConn();
            $sql = 'SELECT * FROM GetAlumnosGrupo WHERE AND grupo = ? AND clave = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $grupo, PDO::PARAM_STR);
            $stmt->bindParam(2, $clave, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("No purula". $e->getMessage());
            return $e->getMessage();
        }
    }
    public function consultar_grupos(){
        
    }
    public function actualizar_calificacion(){

    }
}