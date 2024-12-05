<?php
class InstitucionModel extends MainModel{
    public function __construct(
        private $table = 'Institucion',
    ) {}
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
}