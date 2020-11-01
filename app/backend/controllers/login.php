<?php
  session_start();
  require_once dirname(__FILE__).'/../dao/UserDAO.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if(isset($_POST['password']) && isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = UserDAO::get_by_email($email);
    if (is_null($user)) {
      header("location: /login.php?error=true");
    } else {
      if ($password == $user->password) {
        $_SESSION['email'] = $user->email;
        header("location: /?email=".$email);
      } else {
        header("location: /login.php?error=true");
      }
    }
  }
?>