<?php
include_once "mapaModel.php";
include_once "carreraModel.php";
include_once "planModel.php";
class MapaCtrl {
    public function __construct(
        public string $title = "Mapa",
        public string $view = "_view/mapaCurricular",
        public string $script = "js/mapa.js",
        private $carreras = null,
        private $planes = null,
    )
    {
        $this->carreras = Carrera::get_carr_inst($_SESSION['id_inst']);
        $this->planes = Plan::get_plan_carrera($this->carreras[0]["abr_carr"]);
    }
    public function renderContent(){
        require_once $this->view . '.php';    
    }

    public static function get_plan_carrera($carrera) {
        $planes = Plan::get_plan_carrera($carrera);
        return json_encode($planes);
    }
}