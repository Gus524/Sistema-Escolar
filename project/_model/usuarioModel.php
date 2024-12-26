<?php
class Usuario {
    protected $conn;
    public function __construct(
        private string $nombre = "",
        private string $ap = "",
        private string $am = "",
        private string $curp = "",
        private string $email_p = "",
        private string $email_i = "",
        private string $telefono = "",
        private string $calle = "",
        private string $no_ext = "",
        private string $no_int = "",
        private string $colonia = "",
        private string $delegacion = "",
        private string $cp = "",
    ) 
    {
        $this->get_connection();
    }
    // Obtiene la conexión a la base de datos
    public function get_connection()
    {
        $db = Connection::getInstance();
        $this->conn = $db->getConn();
    }
    public function iniciar_sesion(){

    }
    public function cerrar_sesion(){

    }
    public function consultar_horario() {

    }
    public function consultar_mapa_curr() {

    }
    public function update_pass() {

    }
    public function update_email() {

    }
    public function consultar_datos() {

    }
    public function consultar_agenda() {

    }
}