<?php 
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    include dirname(__FILE__).'/../includes/top-html.php'; 
    include dirname(__FILE__).'/../includes/navbar-menu.php';
    require_once dirname(__FILE__).'/../backend/dao/ProductDAO.php';
    require_once dirname(__FILE__).'/../backend/dao/SubsidiaryDAO.php';

    $subsidiaries = SubsidiaryDAO::get_all();

    if(isset($_GET['code'])) {
        $product_by_code = ProductDAO::get_by_code($_GET['code']);
        $products = array($product_by_code);
    } elseif(isset($_GET['name'])) {
        $products = ProductDAO::get_by_name($_GET['name']);
    } elseif(isset($_GET['subsidiary'])) {
        $products = ProductDAO::get_by_subsidiary($_GET['subsidiary']);
    } else {
        $products = ProductDAO::get_all();
    }
    
?>

<div class="mb-5 mt-5 text-center">
    <h2 class="mb-4">Productos</h2>
    <a type="button" href="/products/create.php" class="btn btn-primary btn-lg">Nuevo producto</a>
</div>

<div class="row mb-5">
    <div class="col-md-4">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="input-group">
            <input class="form-control py-2" type="search" name="code" placeholder="Código" id="example-search-input">
            <span class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </form>
    </div>

    <div class="col-md-4">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="input-group">
            <input class="form-control py-2" type="search" name="name" placeholder="Nombre" id="example-search-input">
            <span class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </form>
    </div>

    <div class="col-md-4">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="input-group">
            <select class="form-control py-2" name="subsidiary" id="select">
                <option selected disabled>Choose...</option>
                <?php foreach($subsidiaries as $subsidiary): ?>
                <option value='<?php echo $subsidiary->id ?>'><?php echo $subsidiary->name ?></option>
                <?php endforeach; ?>
            </select>
            <span class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </form>
    </div>
</div>

<div class="mb-5 mt-5 text-center">
    <a href="./">Reiniciar Filtro</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col" class='text-center'>ID</th>
            <th scope="col" class='text-center'>Código</th>
            <th scope="col" class='text-center'>Nombre</th>
            <th scope="col" class='text-center'>Categoría</th>
            <th scope="col" class='text-center'>Cantidad Sucursales</th>
            <th scope="col" class='text-center'>Descripción</th>
            <th scope="col" class='text-center'>Cantidad</th>
            <th scope="col" class='text-center'>Precio de venta</th>
            <th scope="col" class='text-center'>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($products as $product): ?>
    <?php if(!is_null($product)): ?>
        <tr>
            <th scope="row" class='text-center'><?php echo $product->id ?></th>
            <td class='text-center'><?php echo $product->code ?></td>
            <td class='text-center'><?php echo $product->name ?></td>
            <td class='text-center'><?php echo $product->category->name ?></td>
            <td class='text-center'><?php echo count($product->subsidiaries) ?></td>
            <td class='text-truncate text-center'><?php echo $product->description ?></td>
            <td class='text-center'><?php echo $product->qty ?></td>
            <td class='text-center'><?php echo $product->price ?></td>
            <td class='text-center'>
                <a type="button" href="/products/edit.php" class="btn btn-warning btn-sm">Editar</a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Eliminar
                </button>
            </td>
        </tr>
    <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación de eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar este producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<?php include "../includes/bottom-html.php"; ?>