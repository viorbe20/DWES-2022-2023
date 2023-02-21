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
    <script src="http://localhost/dwes/projects/fct/assets/js/calls.js
    "></script>
    <title>FCT Calls</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    require_once '../view/require/modal_add_call.php';
    ?>

    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">

        <!--Search company bar and icon-->
        <div id="form_search_call" class="d-flex justify-content-center" role="search">
            <div class='d-flex w-50 mx-5'>
                <input name="input_search_call" id="input_search_call" class="form-control" type="text" placeholder="Buscar convocatoria">
            </div>
        </div>

        <section class='d-flex justify-content-lg-end my-2 mt-5'>
            <button type="button" id='btn_add_call' class="btn btn-primary mx-1" data-toggle="modal" data-target="#modal_add_call">
                Nueva Convocatoria
            </button>
        </section>

        <!--Table with las 5 last inserted calls from js-->
        <table id="table-calls" class="table text-center mt-1">
            <thead>
                <tr>
                    <th scope="col">Curso académico</th>
                    <th scope="col">Período</th>
                    <th scope="col">Asignaciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_calls">
            </tbody>
        </table>
    </div>

</body>

</html>