<?php
include_once "carreraModel.php";
include_once "planModel.php";
class OcupabilidadCtrl {
    public function __construct(
        public string $title = 'Ocupabilidad',
        public string $script = 'ocupabilidad.js',
        public string $view = 'ocupabilidadHorario',
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