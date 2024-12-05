<?php
require_once 'DAO/connection.php';

class MainModel
{
    private $conn;
    public function getData()
    {
        $db = Connection::getInstance("2020600407", "Gus123456_");
        $this->conn = $db->getConn();
        return $this->conn;
    }
}
