<?php 
    include "includes/top-html.php"; 
    include "includes/navbar-no-menu.php";
?>
<form onsubmit="return validateRegister()" method="POST" action="backend/controllers/register.php">
<h2 class="mb-5 mt-5 text-center">Registro</h2>

<div class="mb-5">
    <div class="form-group">
        <label for="firstname">Nombre</label>
        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Nombre">
    </div>

    <div class="form-group">
        <label for="lastname">Apellidos</label>
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Apellidos">    
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
    </div>
</div>

<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
<?php include "includes/bottom-html.php"; ?>