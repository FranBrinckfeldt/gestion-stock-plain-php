<?php 
    include "../includes/top-html.php"; 
    include "../includes/navbar-menu.php";
?>

<div class="mb-5 mt-5 text-center">
    <h2>Usuarios</h2>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Correo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Juan</td>
            <td>Pérez Sánchez</td>
            <td>juanperez@gmail.com</td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Pedro</td>
            <td>González López</td>
            <td>pedrogonzalez@gmail.com</td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Diego</td>
            <td>Soto Torres</td>
            <td>diegosoto@gmail.com</td>
        </tr>
    </tbody>
</table>

<?php include "../includes/bottom-html.php"; ?>