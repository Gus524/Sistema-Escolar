<?php
class AlumnoModel extends MainModel {
    public function __construct(
        private $table = 'Alumno',
    ) {}
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