<?php
include_once 'alumnoModel.php';
class CalificacionAlumnoCtrl {
    public function __construct(
        public string $title = 'Calificaciones',
        public string $script = '',
        public string $view = 'calificacionesAlumno',
        private $calificaciones = null,
        private $datos = null,
    ) {
        $this->getData();
    }
    public function rendercontent(){
        require_once $this->view . '.php';
    }
    public function getData() {
        $model = new Alumno($_SESSION['user']);
        $this->datos = $model->inicio();
        $this->calificaciones = $model->consultar_calificaciones($this->datos['id_plan']);
    }
}