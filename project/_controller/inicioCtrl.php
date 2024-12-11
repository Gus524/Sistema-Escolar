<?php
include_once '_model/alumnoModel.php';
include_once '_model/docenteModel.php';
class InicioCtrl {
    public function __construct(
        public string $title = "Inicio",
        public string $view = "_view/inicio",
        public string $script = "",
        private $data = null,
    )
    {
        $this->data = $this->get_data();
    }
    // Carga la vista del controlador
    public function renderContent(){
        require_once $this->view . '.php';
    }

    // Compara el tipo de usuario y renderiza la vista correspondiente
    // Se cargan los datos de acuerdo a las sesiones del usuario
    public function get_data(){ 
        $user = $_SESSION['user'];
        $pass = $_SESSION['pass'];
        switch ($_SESSION['tipo']) {
            case 'alumno':
                $model = new Alumno($user);
                $model->get_connection($user, $pass);
                return $model->inicio();
            case 'docente':
                $model = new Docente($user);
                $model->get_connection($user, $pass);
                return $model->inicio();
            case 'gestion':
                break;
        }
    }
}