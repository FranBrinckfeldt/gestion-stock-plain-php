<?php
require_once dirname(__FILE__).'/../dao/UserDAO.php';
require_once dirname(__FILE__).'/../models/User.php';

  if(isset($_POST['password']) && isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {

    $user = new User(0, $_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['password']);
    
    try {
      UserDAO::create($user);
      header("location: /login.php?success=true");
    } catch (Exception $e) {
      header("location: /login.php?error=true");
    }
    
  }
?>