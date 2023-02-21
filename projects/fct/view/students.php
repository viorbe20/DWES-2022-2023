<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://localhost/dwes/projects/fct/assets/js/students.js"></script>
    <title>FCT Students</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    require_once('../view/require/modal_upload_students_file.php');
    ?>
    <div class="container d-flex-column justify-content-center mt-5">

    

        <form method="post" enctype="multipart/form-data" id="form_search_student" class="d-flex flex-column align-items-center justify-content-center" role="search">
            
            <!--Search student bar and icon-->
            <div class='d-flex w-50 my-2'>
                <input name="input_search_student" id="input_search_student" class="form-control" type="text" placeholder="Nombre del alumno">
                <button type="button" class="btn btn-outline-dark">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </button>
            </div>
        </form>

        <!--Add students file-->
        <section class='d-flex justify-content-lg-end my-2 mt-5'>
            <button type="button" id='btn_upload_students_file' class="btn btn-primary mx-1" data-toggle="modal" data-target="#modal_upload_students_file">
                Añadir alumnos
            </button>
        </section>

        <table id="table-students" class="table text-center mt-5">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_students">
            </tbody>
        </table>
        <!--Table with las 5 last inserted students-->

    </div>

    <?php

    ?>
</body>

</html>