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
    <script src="http://localhost/dwes/projects/fct/assets/js/company_employees.js
    "></script>
    <title>FCT Companies</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';

    ?>
    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">

        <div id="form_search_employee" class="d-flex justify-content-center" role="search">
            <!--Search company bar and icon-->
            <div class='d-flex w-50 mx-5'>
                <input name="input_search_employee" id="input_search_employee" class="form-control" type="text" placeholder="Buscar empleado">
            </div>
        </div>

        <section class='d-flex justify-content-lg-end my-2 mt-5'>
            <a href="<?php echo DIRBASEURL; ?>/companies/add_compan" class="btn btn-primary mx-1">Nuevo Empleadoº</a>
        </section>


        <!--Table with las 5 last inserted employees-->
        <table id="table-employees" class="table text-center mt-5">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_employees">

            </tbody>
        </table>

    </div>
</body>

</html>