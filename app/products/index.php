<?php 
    include "../includes/top-html.php"; 
    include "../includes/navbar-menu.php";
?>

<div class="mb-5 mt-5 text-center">
    <h2 class="mb-4">Productos</h2>
    <a type="button" href="/products/create.php" class="btn btn-primary btn-lg">Nuevo producto</a>
</div>

<div class="row mb-5">
    <div class="input-group col-md-4">
        <input class="form-control py-2" type="search" value="Código" id="example-search-input">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>

    <div class="input-group col-md-4">
        <input class="form-control py-2" type="search" value="Nombre" id="example-search-input">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>

    <div class="input-group col-md-4">
        <select class="form-control py-2" id="select">
            <option selected>Sucursal</option>
            <option>Pudahuel</option>
            <option>Providencia</option>
            <option>Santiago Centro</option>
            <option>Maipú</option>
            <option>Las Condes</option>
        </select>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Categoría</th>
            <th scope="col">Cantidad Sucursales</th>
            <th scope="col">Descripción</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio de venta</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>A1</td>
            <td>Oreo</td>
            <td>Galletas</td>
            <td>3</td>
            <td>Galletas rellenas con crema</td>
            <td>20</td>
            <td>$1.500</td>
            <td>
                <a type="button" href="/products/edit.php" class="btn btn-warning btn-sm">Editar</a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Eliminar
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>A2</td>
            <td>Sahne Nuss</td>
            <td>Chocolate</td>
            <td>1</td>
            <td>Chocolate con almendras</td>
            <td>6</td>
            <td>$3.000</td>
            <td>
                <a type="button" href="/products/edit.php" class="btn btn-warning btn-sm">Editar</a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Eliminar
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>B1</td>
            <td>Trix</td>
            <td>Cereal</td>
            <td>2</td>
            <td>Cereal de colores</td>
            <td>15</td>
            <td>$6.000</td>
            <td>
                <a type="button" href="/products/edit.php" class="btn btn-warning btn-sm">Editar</a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Eliminar
                </button>
            </td>
        </tr>
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