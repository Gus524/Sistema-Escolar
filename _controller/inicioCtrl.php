<?php
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
    // Matriz para controlar los archivos y clases dependiendo del tipo de usuario
    private static $tipoUsuario = [
        'alumno' => ['model' => 'alumnoModel.php', 'class' => 'Alumno'],
        'docente' => ['model' => 'docenteModel.php', 'class' => 'Docente'],
        'gestion' => ['model' => 'gestionModel.php', 'class' => 'Gestion_Escolar']
    ];
    // Compara el tipo de usuario y renderiza la vista correspondiente
    // Se cargan los datos de acuerdo a las sesiones del usuario
    public function get_data(){ 
        // Obtiene el usuario con la variable de sesion
        $user = $_SESSION['user'];
        // Obtiene la informacion de la matriz con el tipo de usuario
        $model_info = self::$tipoUsuario[$_SESSION['tipo']];
        // Incluye el archivo de php
        include $model_info['model'];
        // Crea el modelo a partir de la informacion de la matriz
        $model = new $model_info['class']($user);
        // Llama la funcion de inicio (es el mismo nombre para los 3 modelos)
        return $model->inicio();
    }
}