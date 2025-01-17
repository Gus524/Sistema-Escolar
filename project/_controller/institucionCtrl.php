<?php 
require_once 'institucionModel.php';
class InstitucionCtrl {
    public function __construct(
        private $view = '_view/listaEscuela', 
        public $title = 'Instituciones', 
        public $script = 'escuela.js', 
        private $data = null)
    {
        $model = new Institucion(null, null, null);
        $this->data = $model->getInstitutions($model->getConnection());
    }

    public function renderContent(){
        require_once $this->view . '.php';
    }
    public static function save($abreviatura, $nombre){
        $model = new Institucion(null, $abreviatura, $nombre);
        $data = $model->saveInstitution($model->getConnection());
        return $data;
    }
}