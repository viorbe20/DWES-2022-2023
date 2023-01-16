<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="http://localhost/dwes/projects/fct/assets/js/employees.js"></script> -->
    <title>FCT Students</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>
    <div class="container d-flex-column justify-content-center mt-5">
        <form method="post" id="form_search_company" class="d-flex align-items-center justify-content-center" role="search">
            <div class='d-flex w-75'>
                <input name="input_search_company" id="input_search_company" class="form-control m-" type="text" placeholder="Nombre del alumno">
                <button type="submit" class="btn btn-primary">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </button>
            </div>
            <!-- <button name="btn_search_company" id="btn_search_company" class="btn btn-primary mx-1 w-25" type="submit">Buscar</button> -->
            <a href="" class="btn btn-success mx-1">Cargar archivo</a>
        </form>


        <table id="table-companies" class="table text-center mt-5">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_companies">
            </tbody>
        </table>
        <!--Table with las 5 last inserted companies-->

    </div>

    <?php

    ?>
</body>

</html>