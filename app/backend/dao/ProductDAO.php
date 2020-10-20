<?php 
require_once dirname(__FILE__).'/../models/Product.php';
require_once dirname(__FILE__).'/../models/Category.php';
require_once dirname(__FILE__).'/../core/Database.php';
require_once dirname(__FILE__).'/./SubsidiaryDAO.php';

class ProductDAO {

    static function get_all () {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT p.id, p.code, p.name, c.id as category_id, c.name as category_name, p.description, p.qty, p.active, p.price FROM product p LEFT JOIN category c ON p.category = c.id");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $stmt = null;
            $products = array();
            foreach($rows as $row) {
                $subsidiaries = SubsidiaryDAO::get_by_product($row['id']);
                array_push(
                    $products,
                    new Product(
                        $row['id'],
                        $row['code'],
                        $row['name'],
                        new Category($row['category_id'], $row['category_name']),
                        $row['description'],
                        $row['qty'],
                        $row['active'],
                        $row['price'],
                        $subsidiaries
                    )    
                );
            }
            return $products;
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
            $stmt = $dbconnection->prepare("SELECT p.id, p.code, p.name, c.id as category_id, c.name as category_name, p.description, p.qty, p.active, p.price FROM product p LEFT JOIN category c ON p.category = c.id WHERE p.id = :id");
            $stmt->execute(
                [':id'=>$id]
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                $subsidiaries = SubsidiaryDAO::get_by_product($row['id']);
                return new Product(
                    $row['id'],
                    $row['code'],
                    $row['name'],
                    new Category($row['category_id'], $row['category_name']),
                    $row['description'],
                    $row['qty'],
                    $row['active'],
                    $row['price'],
                    $subsidiaries
                );
            }
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function get_by_code ($code) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT p.id, p.code, p.name, c.id as category_id, c.name as category_name, p.description, p.qty, p.active, p.price FROM product p LEFT JOIN category c ON p.category = c.id WHERE p.code = :code");
            $stmt->execute(
                [':code'=>$code]
            );
            $row = $stmt->fetch();
            $stmt = null;
            if(empty($row)) {
                return null;
            } else {
                $subsidiaries = SubsidiaryDAO::get_by_product($row['id']);
                return new Product(
                    $row['id'],
                    $row['code'],
                    $row['name'],
                    new Category($row['category_id'], $row['category_name']),
                    $row['description'],
                    $row['qty'],
                    $row['active'],
                    $row['price'],
                    $subsidiaries
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
            $stmt = $dbconnection->prepare("SELECT p.id, p.code, p.name, c.id as category_id, c.name as category_name, p.description, p.qty, p.active, p.price FROM product p LEFT JOIN category c ON p.category = c.id  WHERE p.name LIKE :name");
            $stmt->execute(
                [':name'=>'%'.$name.'%']
            );
            $rows = $stmt->fetchAll();
            $stmt = null;
            $products = array();
            foreach($rows as $row) {
                $subsidiaries = SubsidiaryDAO::get_by_product($row['id']);
                array_push(
                    $products,
                    new Product(
                        $row['id'],
                        $row['code'],
                        $row['name'],
                        new Category($row['category_id'], $row['category_name']),
                        $row['description'],
                        $row['qty'],
                        $row['active'],
                        $row['price'],
                        $subsidiaries
                    )    
                );
            }
            return $products;
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function get_by_subsidiary ($subsidiary_id) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare("SELECT p.id, p.code, p.name, c.id as category_id, c.name as category_name, p.description, p.qty, p.active, p.price FROM product p LEFT JOIN product_subsidiary ps ON p.id = ps.product LEFT JOIN category c ON p.category = c.id WHERE ps.subsidiary = :subsidiary_id");
            $stmt->execute(
                [':subsidiary_id'=>$subsidiary_id]
            );
            $rows = $stmt->fetchAll();
            $stmt = null;
            $products = array();
            foreach($rows as $row) {
                $subsidiaries = SubsidiaryDAO::get_by_product($row['id']);
                array_push(
                    $products,
                    new Product(
                        $row['id'],
                        $row['code'],
                        $row['name'],
                        new Category($row['category_id'], $row['category_name']),
                        $row['description'],
                        $row['qty'],
                        $row['active'],
                        $row['price'],
                        $subsidiaries
                    )    
                );
            }
            return $products;
        } catch(PDOException $e) {
            echo "Error en la consulta<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function create($product) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare(
                "INSERT INTO product (code, name, price, qty, active, category, description) VALUES
                (:code, :name, :price, :qty, :active, :category, :description)"
            );
            $stmt->execute(
                [
                    ':code'=>$product->code, 
                    ':name'=>$product->name,
                    ':price'=>$product->price,
                    ':qty'=>$product->qty,
                    ':active'=>$product->active,
                    ':category'=>$product->category->id,
                    ':description'=>$product->description
                ]
            );
            $new_id = $dbconnection->lastInsertId();
            $stmt = null;
            foreach($product->subsidiaries as $subsidiary) {
                if(!is_null($subsidiary)) {
                    $dbconnection2 = $db->connect();
                    $stmt2 = $dbconnection2->prepare(
                        "INSERT INTO product_subsidiary (subsidiary, product) VALUES
                        (:subsidiary, :product)"
                    );
                    $stmt2->execute(
                        [
                            ':subsidiary'=>$subsidiary->id, 
                            ':product'=>$new_id
                        ]
                    );
                    $stmt2 = null;
                } 
            }
            
            return $dbconnection->lastInsertId();
        } catch(PDOException $e) {
            echo "Error al insertar<br>";
            echo $e->getMessage();
            exit;
        }
    }

    static function edit($product) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare(
                "UPDATE product SET name = :name, description = :description, price = :price, active = :active WHERE id = :id"
            );
            $stmt->execute(
                [
                    ':id'=>$product->id,
                    ':name'=>$product->name,
                    ':price'=>$product->price,
                    ':description'=>$product->description,
                    ':active'=>$product->active
                ]
            );
            $stmt = null;
            return true;
        } catch(PDOException $e) {
            echo "Error al insertar<br>";
            echo $e->getMessage();
            return false;
        }
    }

    static function delete($id) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare(
                "DELETE FROM product WHERE id = :id"
            );
            $stmt->execute(
                [
                    ':id'=>$id
                ]
            );
            $stmt = null;
            return $id;
        } catch(PDOException $e) {
            echo "Error al insertar<br>";
            echo $e->getMessage();
            return false;
        }
    }

    static function delete_from_subsidiary($product_id, $subsidiary_id) {
        try {
            $db = new Database();
            $dbconnection = $db->connect();
            $stmt = $dbconnection->prepare(
                "DELETE FROM product_subsidiary WHERE product = :product AND subsidiary = :subsidiary"
            );
            $stmt->execute(
                [
                    ':product'=>$product_id, 
                    ':subsidiary'=>$subsidiary_id
                ]
            );
            $stmt = null;
            return $id;
        } catch(PDOException $e) {
            echo "Error al insertar<br>";
            echo $e->getMessage();
            return false;
        }
    }
}

