<?php
include_once "_model/grupo_horarioModel.php";
class HorarioCtrl {
    public function __construct(
        public string $title = "Horario",
        public string $view = "",
        public string $script = "js/horario.js",
        private $data = null,
    )
    {
        $this->data = $this->get_horario();
    }
    public function renderContent(){
        require_once $this->view . '.php';
    }

    public function get_horario(){
        $model = new Grupo_Horario();
        $model->get_connection($_SESSION['user'], $_SESSION['pass']);
        switch ($_SESSION['tipo']) {
            case 'alumno':
                $this->view = "_view/horarioAlumno";
                return $model->consultar_horario_alumno($_SESSION['user']);
            case 'docente':
                $this->view = "_view/horarioDocente";
                return $model->consultar_horario_docente($_SESSION['user']);
            case 'gestion':
                break;
        }
    }
}