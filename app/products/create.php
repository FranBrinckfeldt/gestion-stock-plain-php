<?php 
    include "../includes/top-html.php"; 
    include "../includes/navbar-menu.php";
    require_once dirname(__FILE__).'/../backend/dao/CategoryDAO.php';
    require_once dirname(__FILE__).'/../backend/dao/SubsidiaryDAO.php';
    $categories = CategoryDAO::get_all();
    $subsidiaries = SubsidiaryDAO::get_all();
?>

<h2 class="mb-5 mt-5 text-center">Nuevo Producto</h2>

<form onsubmit="return validateCreateProduct()" method="POST" action="./_crud.php?action=create">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="id">ID</label>
            <input type="number" class="form-control" id="id" name="id" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="code">Código</label>
            <input type="text" class="form-control" id="code" name="code">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>

    <div class="form-group">
        <label for="category">Categoría</label>
        <select id="category" name="category" class="form-control">
            <option selected disabled>Choose...</option>
            <?php foreach($categories as $category): ?>
            <option value='<?php echo $category->id ?>'><?php echo $category->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 1</label>
            <select class="form-control" id="subsidiary1" name="subsidiary1">
                <option selected disabled>Choose...</option>
                <?php foreach($subsidiaries as $subsidiary): ?>
                <option value='<?php echo $subsidiary->id ?>'><?php echo $subsidiary->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 2</label>
            <select class="form-control" id="subsidiary2" name="subsidiary2">
                <option selected disabled>Choose...</option>
                <?php foreach($subsidiaries as $subsidiary): ?>
                <option value='<?php echo $subsidiary->id ?>'><?php echo $subsidiary->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="subsidiary">Sucursal 3</label>
            <select class="form-control" id="subsidiary3" name="subsidiary3">
                <option selected disabled>Choose...</option>
                <?php foreach($subsidiaries as $subsidiary): ?>
                <option value='<?php echo $subsidiary->id ?>'><?php echo $subsidiary->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="qty" name="qty">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Precio</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Registrar Producto</button>
</form>

<?php include "../includes/bottom-html.php"; ?>