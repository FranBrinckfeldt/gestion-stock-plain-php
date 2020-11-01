<?php 
    session_start();
    if(empty($_SESSION['email'])) {
        header("location: /login.php");
    }
    include "includes/top-html.php"; 
    include "includes/navbar-menu.php";
?>
<h2 class="mb-5 mt-5 text-center">Dashboard</h2>

<?php if(isset($_GET['email'])): ?>
    <div class="alert alert-success text-center mt-5" role="alert">
        <?php echo "Bienvenido ".$_GET['email'] ?>
    </div>
<?php endif; ?>

<div class="card-deck">

<div class="card">
    <div class="card-body text-center">
        <h3 class="card-title">Productos</h3>
        <h1 class="card-text mb-3 font-weight-bold text-primary">3</h1>
        <a type="button" href="/products" class="btn btn-primary btn-sm">Ir a productos</a>
    </div>
</div>

<div class="card">
    <div class="card-body text-center">
        <h3 class="card-title">Sucursales</h3>
        <h1 class="card-text mb-3 font-weight-bold text-primary">4</h1>
    </div>
</div>

<div class="card">
    <div class="card-body text-center">
        <h3 class="card-title">Usuarios</h3>
        <h1 class="card-text mb-3 font-weight-bold text-primary">3</h1>
        <a type="button" href="/users" class="btn btn-primary btn-sm">Ir a usuarios</a>
    </div>
</div>

</div>
<?php include "includes/bottom-html.php"; ?>