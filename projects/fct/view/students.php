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
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/style.scss">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://localhost/dwes/projects/fct/assets/js/students.js"></script>

    <title>FCT Students</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>

    <div class="container d-flex-column justify-content-between mt-5">

        <form method="post" id="form_search_student" enctype="multipart/form-data" class="d-flex align-items-center justify-content-between mx-5" role="search">

            <!--Search student bar and icon-->
            <div class='d-flex w-50'>
                <input name="input_search_student" id="input_search_student" class="form-control" type="text" placeholder="Nombre del alumno">
                <button type="submit" class="btn btn-outline-dark">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </button>
            </div>

            <!--Upload file buttons-->
            <div class='d-flex w-50' style='margin-left: 3%;'>
                <div class='d-flex justify-content-center'>
                    <input type="file" id="real-file" hidden="hidden" />
                    <button type="button" id="upload-btn" class='btn btn-secondary'>Elige un fichero</button>
                    <span id="upload-btn-text">Ningún archivo seleccionado</span>
                    <button class='btn btn-success' name='submit_file_btn' >Subir</button>
                </div>
            </div>

            
        </form>
        <!--Error msg with file format-->
        <div class='d-flex justify-content-center '>
            <span class='error_span w-25 d-flex justify-content-center my-3'>El formato debe ser csv</span>
        </div>


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