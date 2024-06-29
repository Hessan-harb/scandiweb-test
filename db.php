<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'scandiweb_test2';
    private $username = 'root';
    private $password = '';
    public $pdo;

    public function getConnection() {
        $this->pdo = null;

        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->pdo->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->pdo;
    }
}

?>
