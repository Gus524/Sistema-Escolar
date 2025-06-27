<?php
include 'grupo_horarioModel.php';
class DetalleGrupoCtrl
{
    public function __construct (
        public string $grupo = '',
        public string $clave = '',
        private $data = null,
        public string $view = 'detalleGrupo',
        public string $title = 'Detalle Grupo',
        public string $script = 'gruposDocente',
    ) {
        $this->getData();
    }
    public function renderContent()
    {
        include $this->view . '.php';
    }
    public function getData()
    {
        $model = new Grupo_Horario();
        $this->data = $model->consultar_grupo_alumnos($this->grupo, $this->clave);
    }
}
