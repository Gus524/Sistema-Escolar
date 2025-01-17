<?php
include_once 'alumnoModel.php';
class EstadoGeneralCtrl {
    public function __construct(
        public string $title = 'Estado General',
        public string  $view = 'estadoGeneral',
        public string $script = '',
        public $materias = null,
        public $datos = null, 
    ) {
        $this->getData();
    }
    public function renderContent() {
        require_once $this->view . '.php';
    }
    public function getData() {
        $model = new Alumno($_SESSION['user']);
        $this->datos = $model->inicio();
        $this->materias = $model->consultar_estado_general($this->datos['id_plan']);
    }
}