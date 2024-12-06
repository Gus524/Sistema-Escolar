<?php
require_once "_model/mainModel.php";

class nuevoRegistro {
    public $title = "Prueba";
    private $view = "_view/prueba.html";
    public $script = "js/ajax/prueba.js";
    public function __construct()
    {
        
    }
    public function renderContent()
    {
        require_once $this->view;
    }
}