<?php
class Database {
    private $host = 'bn12utiqveliehfcciia-mysql.services.clever-cloud.com';
    private $db_name = 'bn12utiqveliehfcciia';
    private $username = 'u2jcflna7lmkhbex';
    private $password = '1dwLsfeDvWMH5YvCzWT5';
    private $port = 3306;
    public $pdo;

    public function getConnection() {
        $this->pdo = null;

        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->pdo;
    }
}


?>
