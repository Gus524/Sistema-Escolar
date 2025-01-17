<?php
include 'alumnoModel.php';
class AlumnosCtrl{
    public function __construct(
        public string $title = 'Alumnos',
        public string $script = 'alumnos.js',
        private string $view = 'alumnos', 
    ){}
    public function renderContent(){
        include $this->view . '.php';
    }
}