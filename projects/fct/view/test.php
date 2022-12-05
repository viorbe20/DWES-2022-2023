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
    <!-- <script src="http://localhost/dwes/projects/fct/assets/js/company_employees.js"></script> -->
    <title>FCT Employees</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>
    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">
        
    <!--Search box company-->
        <form method="post" id="form_search_employee" class="d-flex m-5" role="search">
            <input name="input_search_employee" id="input_search_employee" class="form-control me-5" type="text" placeholder="Nombre del empleado">
            <button name="btn_search_employee" id="btn_search_employee" class="btn btn-primary mx-1 w-25" type="submit">Buscar</button>
        </form>
        
        
        <!--Table with las 5 last inserted employees-->
        <table id="table-employees" class="table text-center mt-5">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Empresa</th>
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