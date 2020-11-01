<?php 
  session_start();
  include "includes/top-html.php"; 
  include "includes/navbar-no-menu.php";

  if(!empty($_SESSION['email'])) {
    header("location: /?email=".$_SESSION['email']);
  }

?>

<form id="loginForm" onsubmit="return validateLogin()" method="POST" action="backend/controllers/login.php">
  <?php if($_GET['error'] == 'true'): ?>
    <div class="alert alert-danger text-center mt-5" role="alert">
      Credenciales erroneas
    </div>
  <?php endif; ?>
  <h2 class="mb-5 mt-5 text-center">Inicio de sesión</h2>
  <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" name="password" class="form-control" id="password">
  </div>
  <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Recordarme</label>
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
  <a type="button" href="/register.php" class="btn btn-link btn-lg btn-block text-danger">Register</a>
</form>
<?php include "includes/bottom-html.php"; ?>