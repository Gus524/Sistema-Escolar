<?php 
require_once '_model/institucionModel.php';
require_once '_model/mainModel.php';
class InstitucionCtrl {
    private $view = '_view/listaEscuela';
    public $title = 'Instituciones';
    public $script = 'js/escuela.js';
    private $data;
    public function __construct() {
        $model = new InstitucionModel(null, null, null);
        $this->data = $model->getInstitutions($model->getData());
    }

    public function renderContent(){
        require_once $this->view . '.php';
    }
}