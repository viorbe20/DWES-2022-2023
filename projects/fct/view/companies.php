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
    <script src="http://localhost/dwes/projects/fct/assets/js/companies.js"></script>
    <title>FCT Companies</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>
    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">
        
    <!--Search box company-->
        <form method="post" id="form_search_company" class="d-flex m-5" role="search">
            <input name="input_search_company" id="input_search_company" class="form-control me-5" type="text" placeholder="Nombre de la empresa">
            <button name="btn_search_company" id="btn_search_company" class="btn btn-primary mx-1 w-25" type="submit">Buscar</button>
            <a href="<?php echo DIRBASEURL;?>/home/create_company" class="btn btn-success mx-1">Crear Empresa</a>
        </form>
        
        
        <table id="table-companies" class="table text-center mt-5">
            <thead>
                <tr>
                    <th scope="col">Logo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Empleados</th>
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