<?php
include 'alumnoModel.php';
include 'docenteModel.php';
class DatosCtrl{
    public function __construct(
        private $data = null,
        public $script = '',
        public string $title = 'Datos personales',
        private string $view = '',
    ) {
        $this->getData();
    }
    public function getData() {
        $user = $_SESSION['tipo'];
        $this->data = match(true){
            $user == 'alumno' => $this->loadAlumno(),
            $user == 'docente' => $this->loadDocente(),
            default => $this->loadAlgo()
        };
    }
    public function renderContent(){
        include $this->view . '.php';
    }
    public function loadAlumno(){
        $alumno = new Alumno($_SESSION['user']);
        $this->view = 'datosAlumno';
        $this->script = 'datosAlumno.js';
        return $alumno->consultar_datos();
    }
    public function loadDocente(){
        $docente = new Docente($_SESSION['user']);
        $this->view = 'datosDocente';
        $this->script = 'datosDocente.js';
        return $docente->consultar_datos();
    }
    public function loadAlgo(){

    }
}