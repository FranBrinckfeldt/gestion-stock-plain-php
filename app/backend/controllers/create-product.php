<?php 
  require_once "../models/Product.php";
  $product = new Product(
    1, 
    $_POST['code'], 
    $_POST['name'], 
    $_POST['category'],
    $_POST['subsidiary1'],
    $_POST['subsidiary2'],
    $_POST['subsidiary3'],
    $_POST['description'],
    $_POST['qty'],
    $_POST['price']
  );

  $product->print();
?>