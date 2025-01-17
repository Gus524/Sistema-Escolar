<?php
include_once "grupo_horarioModel.php";
include_once "alumnoModel.php";
include_once "docenteModel.php";
class HorarioPersonalCtrl {
    public function __construct(
        public string $title = "Horario",
        public string $view = "",
        public string $script = "horario.js",
        private $data = null,
        private $datos = null,
    )
    {
        $this->data = $this->get_horario();
    }
    public function renderContent(){
        require_once $this->view . '.php';
    }

    public function get_horario(){
        $model = new Grupo_Horario();
        switch ($_SESSION['tipo']) {
            case 'alumno':
                $usuario = new Alumno($_SESSION['user']);
                $this->datos = $usuario->inicio();
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