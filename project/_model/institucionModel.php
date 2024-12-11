<?php
require_once dirname(__FILE__) . '/../config/global.php';
require_once ROOT_PATH.'DAO/connection.php';
class Institucion {
    private $conn;
    public function __construct(
        private $id_inst = null, 
        private $abreviatura = null, 
        private $nom_inst = null) 
    {}
    public function getConnection()
    {
        $db = Connection::getInstance("2020600407", "Gus123456_");
        $this->conn = $db->getConn();
        return $this->conn;
    }
    public static function getInstitutions(PDO $conn){
        try {
            $sql = "SELECT * FROM Institucion";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error in getInstitutions: " . $e->getMessage());
            return false;
        }
    }

    public function saveInstitution(PDO $conn) {
        try {
            $sql = "CALL InsertNewSchool(?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->nom_inst, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->abreviatura, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);   
            return $result['resultado'] == 1;
        } catch (PDOException $e) {
            error_log("Error in saveInstitution: " . $e->getMessage());
            return false;
        }
    }
}