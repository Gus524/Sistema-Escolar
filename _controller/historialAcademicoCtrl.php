<?php
include_once 'alumnoModel.php';
class HistorialAcademicoCtrl {
    public function __construct(
        public string $title = 'Historial Academico',
        public string $script = '',
        private string $view = 'historialAcademico',
        private $user = null,
        private $materias = null,
    ) {
        $this->getData();
    }
    public function renderContent() {
        require_once $this->view . '.php'; 
    }
    public function getData(){
        $model = new Alumno($_SESSION['user']);        
        $this->user = $model->consultar_historial_alumno();
        $this->materias = $model->consultar_historial_detalle();
    }
}