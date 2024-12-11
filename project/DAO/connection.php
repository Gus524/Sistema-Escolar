<?php
define('CONFIG_DIR', dirname(__DIR__).'/config/.env');
$lines = file(CONFIG_DIR);
foreach ($lines as $line) {
    putenv(trim($line));
}
class Connection {
    private $usr;
    private $pass;
    private $host;
    private $db;
    private $conn;
    private static $instance;
    private function __construct($usr, $pass) {
        $this->usr = $usr;
        $this->pass = $pass;
        $this->connect();
    }
    private function connect(){
        $this->host = getenv('DB_HOST');
        $this->db = getenv('DB_NAME');
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db".';charset=utf8', $this->usr, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception($e->getMessage());            
        }
    }
    public static function getInstance($usr = null, $pass = null) {
        if(self::$instance == null) {
            self::$instance = new Connection($usr, $pass);
        }
        return self::$instance;
    }
    public function getConn(): PDO {
        return $this->conn;
    }
}