<?php
class InstitucionModel extends MainModel{
    private $abreviatura;
    private $nom_inst;
    private $cve_inst;
    public function __construct($cve_inst, $abreviatura, $nom_inst) {
        $this->cve_inst = $cve_inst;
        $this->abreviatura = $abreviatura;
        $this->nom_inst = $nom_inst;
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
            return null;
        }
    }

    public function saveInstitution(PDO $conn) {
        try {
            $sql = "CALL InsertNewSchool(:abreviatura, :nom_inst)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':abreviatura', $this->abreviatura, PDO::PARAM_STR);
            $stmt->bindParam(':nom_inst', $this->nom_inst, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Error in saveInstitution: " . $e->getMessage());
            return false;
        }
    }
}