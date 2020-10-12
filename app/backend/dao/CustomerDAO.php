<?php 
require_once dirname(__FILE__).'/../models/Customer.php';
require_once dirname(__FILE__).'/../core/Database.php';

class CustomerDAO {

    static function get_all () {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT id, email, firstname, lastname FROM customer");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $stmt = null;
            $users = array();
            foreach($rows as $row) {
                array_push(
                    $customers,
                    new Customer(
                        $row['id'],
                        $row['email'],
                        $row['firstname'],
                        $row['lastname']
                    )    
                );
            }
            return $customers;
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
            $stmt = $dbconnection->prepare("SELECT id, email, firstname, lastname FROM customer WHERE id = :id");
            $stmt->execute(
                [':id'=>$id]
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                return new Customer(
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
            $stmt = $dbconnection->prepare("SELECT id, email, firstname, lastname FROM customer WHERE email LIKE :email");
            $stmt->execute(
                [':email'=>'%'.$email.'%']
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                return new Customer(
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

    static function create($customer) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare(
                "INSERT INTO customer (email, firstname, lastname) VALUES
                (:email, :firstname, :lastname)"
            );
            $stmt->execute(
                [
                    ':email'=>$customer->email, 
                    ':firstname'=>$customer->firstname,
                    ':lastname'=>$customer->lastname
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

