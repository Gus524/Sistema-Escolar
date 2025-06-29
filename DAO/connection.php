<?php
class Connection
{
    private $host;
    private $db;
    private $usr;
    private $pass;
    private $conn;
    private static ?Connection $instance = null;
    private function __construct()
    {
        $this->load_credentials();
        $this->connect();
    }

    private function load_credentials()
    {
        $this->host = getenv('DB_HOST');
        $this->db = getenv('DB_NAME');
        $this->usr = getenv('DB_USER');
        $this->pass = getenv('DB_PASS');

        if (empty($this->host) || empty($this->db) || empty($this->usr) || empty($this->pass)) {
            throw new Exception("Error: Las variables de entorno de la base de datos no están configuradas correctamente en Azure.");
        }
    }

    private function connect()
    {
        $ssl_ca_path = __DIR__ . '/DigiCertGlobalRootG2.crt.pem';

        if (!file_exists($ssl_ca_path)) {
            throw new Exception("Error: No se encuentra el archivo de certificado SSL en la ruta: " . $ssl_ca_path);
        }

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT         => false,
            PDO::MYSQL_ATTR_SSL_CA       => $ssl_ca_path,
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        ];

        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8";
            $this->conn = new PDO($dsn, $this->usr, $this->pass, $options);
        } catch (PDOException $e) {
            error_log("Error de conexión a la base de datos: " . $e->getMessage());
            throw new Exception("No se pudo establecer conexión con el servicio. Por favor, intente más tarde.");
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function getConn(): PDO
    {
        return $this->conn;
    }
}
