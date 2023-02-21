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
    <script src="http://localhost/dwes/projects/fct/assets/js/test.js"></script>
    <title>FCT Employees</title>
</head>

<body>
    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">
        
    <table id="table-companies" class="table text-center mt-5">
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
    </div>

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
</body>

</html>