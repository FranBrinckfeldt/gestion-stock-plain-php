<?php 
require_once dirname(__FILE__).'/../models/Category.php';
require_once dirname(__FILE__).'/../core/Database.php';

class CategoryDAO {

    static function get_all () {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT id, name FROM category");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $stmt = null;
            $categories = array();
            foreach($rows as $row) {
                array_push(
                    $categories,
                    new Category(
                        $row['id'],
                        $row['name']
                    )    
                );
            }
            return $categories;
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
            $stmt = $dbconnection->prepare("SELECT id, name FROM category WHERE id = :id");
            $stmt->execute(
                [':id'=>$id]
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                return new Category(
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
            $stmt = $dbconnection->prepare("SELECT id, name FROM category WHERE name LIKE :name");
            $stmt->execute(
                [':name'=>'%'.$name.'%']
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                return new Category(
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

    static function create($category) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare(
                "INSERT INTO category (name) VALUES
                (:name)"
            );
            $stmt->execute(
                [
                    ':name'=>$category->name
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

