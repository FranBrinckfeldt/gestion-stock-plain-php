<?php
require_once dirname(__FILE__).'/../backend/models/Product.php';
require_once dirname(__FILE__).'/../backend/models/Category.php';
require_once dirname(__FILE__).'/../backend/models/Subsidiary.php';
require_once dirname(__FILE__).'/../backend/dao/ProductDAO.php';

switch($_GET['action']) {
    case 'create':
        $category = new Category($_POST['category'], '');
        $subsidiaries = array();
        if(isset($_POST['subsidiary1'])) {
            array_push($subsidiaries, new Subsidiary($_POST['subsidiary1'],''));
        }
        if(isset($_POST['subsidiary2'])) {
            array_push($subsidiaries, new Subsidiary($_POST['subsidiary2'],''));
        }
        if(isset($_POST['subsidiary3'])) {
            array_push($subsidiaries, new Subsidiary($_POST['subsidiary3'],''));
        }
        $product = new Product(0, $_POST['code'], $_POST['name'], $category, $_POST['description'], $_POST['qty'], 1, $_POST['price'], $subsidiaries);
        ProductDAO::create($product);
        $_SESSION['status'] = 'Product creada con éxito';
        header('location: ./?status=success');
        break;
    case 'edit':
        $product = ProductDAO::get_by_id($_POST['id']);
        echo $product->id;
        if (is_null($product)) {
            $_SESSION['status'] = 'El Producto no existe';
            header('location: ./?status=error');
        }
        $product->name = $_POST['name'];
        $product->description = $_POST['description'];
        $product->price = $_POST['price'];
        $product->active = $_POST['active'];
        ProductDAO::edit($product);
        $_SESSION['status'] = 'Producto editado con éxito';
        header('location: ./?status=success');
        break;
    case 'delete':
        if (isset($_GET['subsidiary'])) {
            ProductDAO::delete_from_subsidiary($_GET['id'], $_GET['subsidiary']);
        } else {
            ProductDAO::delete($_GET['id']);
        }
        $_SESSION['status'] = 'Producto borrado con éxito';
        header('location: ./?status=success');
        break;
    default:
        $_SESSION['status'] = 'Acción inválida';
        header('location: ./?status=error');
        break;
}
?>