<?php
// Conexión con PDO
class Database {
    private $driver = 'mysql';
    private $host = 'mysql';
    private $dbname = 'gestion_stock';
    private $user = 'root';
    private $password = 'root';
    
    public function connect() {
        try {
            $pdo = new PDO($this->driver.':host='.$this->host.';dbname='.$this->dbname.';charset=utf8', $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch(PDOException $e) {
            echo $e->getCode().': '.$e->getMessage();
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}

?>