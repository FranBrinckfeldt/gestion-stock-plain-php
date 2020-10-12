<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('backend/dao/ProductDAO.php');

$products = ProductDAO::get_all();

foreach($products as $product) {
    echo $product->print();
}

$product_by_code = ProductDAO::get_by_code(1234);
if(!empty($product_by_code)) {
    echo $product_by_code->print();
}

$product_by_name = ProductDAO::get_by_name('Costa');
if(!empty($product_by_name)) {
    echo $product_by_name->print();
}

?>