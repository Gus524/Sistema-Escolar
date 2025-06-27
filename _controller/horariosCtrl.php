<?php
include_once "carreraModel.php";
include_once "planModel.php";
class HorariosCtrl {
    public function __construct(
        public string $title = 'Horarios',
        public string $script = 'horarios.js',
        public string $view = 'horariosClase',
        private $planes = null,
        private $carreras = null,
    ) {
        $this->carreras = Carrera::get_carr_inst($_SESSION['id_inst']);
        $this->planes = Plan::get_plan_carrera($this->carreras[0]["abr_carr"]);
    }
    public function renderContent(){
        require_once $this->view . '.php';    
    }
}