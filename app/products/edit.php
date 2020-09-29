<?php 
    include "../includes/top-html.php"; 
    include "../includes/navbar-menu.php";
?>

<h2 class="mb-5 mt-5 text-center">Editar Producto</h2>

<form onsubmit="return validateCreateProduct()" method="POST" action="/backend/controllers/create-product.php">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="id">ID</label>
            <input type="number" class="form-control" id="id" name="id" readonly value="1">
        </div>
        <div class="form-group col-md-3">
            <label for="code">Código</label>
            <input type="text" class="form-control" id="code" name="code" readonly value="123">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="Producto para editar">
        </div>
    </div>

    <div class="form-group">
        <label for="category">Categoría</label>
        <input type="text" class="form-control" id="category" name="category" value="Galletas" readonly>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 1</label>
            <input type="text" class="form-control" id="subsidiary1" name="subsidiary1" value="Pudahuel" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 2</label>
            <input type="text" class="form-control" id="subsidiary2" name="subsidiary2" placeholder="Choose..." readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 3</label>
            <input type="text" class="form-control" id="subsidiary3" name="subsidiary3" placeholder="Choose..." readonly>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="qty" name="qty" readonly value="20">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Precio</label>
            <input type="number" class="form-control" id="price" name="price" value="3000">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Editar Producto</button>
</form>

<?php include "../includes/bottom-html.php"; ?>