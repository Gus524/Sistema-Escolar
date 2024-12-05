<?php 
require_once '_model/institucionModel.php';
require_once '_model/mainModel.php';
class InstitucionCtrl {
    private $view = '_view/listaEscuela';
    public $title = 'Instituciones';
    private $data;
    public function __construct() {
        $model = new InstitucionModel();
        $this->data = $model->getInstitutions($model->getData());
    }

    public function renderContent(){
        require_once $this->view . '.php';
    }
}