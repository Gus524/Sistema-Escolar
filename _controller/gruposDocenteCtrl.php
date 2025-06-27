<?php
include 'grupo_horarioModel.php';
class GruposDocenteCtrl {
    public function __construct(
        private $data = null,
        public string $view = 'gruposDocente',
        public string $title = 'Grupos',
        public string $script = 'gruposDocente',
    ) {
        $this->getData();
    }
    public function renderContent(){
        include $this->view . '.php';
    }
    public function getData() {
        $model = new Grupo_Horario();
        $this->data = $model->consultar_horario_docente($_SESSION['user']);
    }
}