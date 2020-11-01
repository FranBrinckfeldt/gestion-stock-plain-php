<?php 
require_once dirname(__FILE__).'/../models/User.php';
require_once dirname(__FILE__).'/../core/Database.php';

class UserDAO {

    static function get_all () {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT id, email, firstname, lastname FROM user");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $stmt = null;
            $users = array();
            foreach($rows as $row) {
                array_push(
                    $users,
                    new User(
                        $row['id'],
                        $row['email'],
                        $row['firstname'],
                        $row['lastname']
                    )    
                );
            }
            return $users;
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
            $stmt = $dbconnection->prepare("SELECT id, email, firstname, lastname FROM user WHERE id = :id");
            $stmt->execute(
                [':id'=>$id]
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                return new User(
                    $row['id'],
                    $row['email'],
                    $row['firstname'],
                    $row['lastname']
                );
            }
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function get_by_email ($email) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT id, email, firstname, lastname, password FROM user WHERE email LIKE :email");
            $stmt->execute(
                [':email'=>'%'.$email.'%']
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                return new User(
                    $row['id'],
                    $row['email'],
                    $row['firstname'],
                    $row['lastname'],
                    $row['password']
                );
            }
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function create($user) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare(
                "INSERT INTO user (email, firstname, lastname, password) VALUES
                (:email, :firstname, :lastname, :password)"
            );
            $stmt->execute(
                [
                    ':email'=>$user->email, 
                    ':firstname'=>$user->firstname,
                    ':lastname'=>$user->lastname,
                    ':password'=>$user->password
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

