<?php 
require_once dirname(__FILE__).'/../models/Subsidiary.php';
require_once dirname(__FILE__).'/../core/Database.php';

class SubsidiaryDAO {

    static function get_all () {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT id, name FROM subsidiary");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $stmt = null;
            $subsidiaries = array();
            foreach($rows as $row) {
                array_push(
                    $subsidiaries,
                    new Subsidiary(
                        $row['id'],
                        $row['name']
                    )    
                );
            }
            return $subsidiaries;
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function get_by_id ($id) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT id, name FROM subsidiary WHERE id = :id");
            $stmt->execute(
                [':id'=>$id]
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                return new Subsidiary(
                    $row['id'],
                    $row['name']
                );
            }
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function get_by_name ($name) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT id, name FROM subsidiary WHERE name LIKE :name");
            $stmt->execute(
                [':name'=>'%'.$name.'%']
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                return new Subsidiary(
                    $row['id'],
                    $row['name']
                );
            }
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function get_by_product ($product_id) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT s.id, s.name FROM subsidiary s INNER JOIN product_subsidiary ps ON s.id = ps.subsidiary WHERE ps.product = :product_id");
            $stmt->execute(
                [':product_id'=>$product_id]
            );
            $rows = $stmt->fetchAll();
            $stmt = null;
            $subsidiaries = array();
            foreach($rows as $row) {
                array_push(
                    $subsidiaries,
                    new Subsidiary(
                        $row['id'],
                        $row['name']
                    )    
                );
            }
            return $subsidiaries;
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function create($subsidiary) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare(
                "INSERT INTO subsidiary (name) VALUES
                (:name)"
            );
            $stmt->execute(
                [
                    ':name'=>$subsidiary->name
                ]
            );
            return $dbconnection->lastInsertId();
        } catch(PDOException $e) {
            echo "Error al insertar<br>";
            echo $e->getMessage();
            exit;
        }
    }

}

