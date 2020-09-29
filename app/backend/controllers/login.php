<?php
  if(isset($_POST['password']) && isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == 'test@gmail.com' && $password == '123456') {
      header("location: /?email=".$email);
    } else {
      header("location: /login.php?error=true");
    }
  }
?>