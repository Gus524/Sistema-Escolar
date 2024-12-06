<?php
include_once '_model/alumnoModel.php';
include_once '_model/mainModel.php';

class AlumnoCtrl
{
    private $view = '_view/listaAlumno';
    public $title = 'Alumnos';
    public $script = 'js/alumno.js';
    private $data;
    public function __construct()
    {
        $model = new AlumnoModel();
        $this->data = $model->getAlumnos($model->getData());
    }

    public function renderContent()
    {
        require_once $this->view . '.php';
    }
}