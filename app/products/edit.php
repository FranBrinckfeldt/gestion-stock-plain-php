<?php 
    include dirname(__FILE__).'/../includes/top-html.php'; 
    include dirname(__FILE__).'/../includes/navbar-menu.php';
    require_once dirname(__FILE__).'/../backend/dao/ProductDAO.php';

    if (!isset($_GET['id'])) {
        header('location: ./?status=error');
    } 
    $product = ProductDAO::get_by_id($_GET['id']);
?>

<h2 class="mb-5 mt-5 text-center">Editar Producto</h2>

<form onsubmit="return validateCreateProduct()" method="POST" action="/products/_crud.php?action=edit">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="id">ID</label>
            <input type="number" class="form-control" id="id" name="id" readonly value="<?php echo $product->id ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="code">Código</label>
            <input type="text" class="form-control" id="code" name="code" readonly value="<?php echo $product->code ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $product->name ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="category">Categoría</label>
        <input type="text" class="form-control" id="category" name="category" value="<?php echo $product->category->name ?>" readonly>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 1</label>
            <input type="text" class="form-control" id="subsidiary1" name="subsidiary1" value="<?php echo $product->subsidiaries[0]->name ?>" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 2</label>
            <input type="text" class="form-control" id="subsidiary2" name="subsidiary2" placeholder="Choose..." value="<?php echo $product->subsidiaries[1]->name ?>" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 3</label>
            <input type="text" class="form-control" id="subsidiary3" name="subsidiary3" placeholder="Choose..." value="<?php echo $product->subsidiaries[2]->name ?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?php echo $product->description ?></textarea>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="qty" name="qty" readonly value="<?php echo $product->qty ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Precio</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $product->price ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="active">Estado</label>
        <select id="active" name="active" class="form-control">
            <option value='1'>Activo</option>
            <option value='0' <?php if (!$product->active) { echo 'selected'; } ?>>Inactivo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Editar Producto</button>
</form>

<?php include "../includes/bottom-html.php"; ?>