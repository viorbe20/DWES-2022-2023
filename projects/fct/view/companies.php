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
    <script src="http://localhost/dwes/projects/fct/assets/js/login_form.js"></script>
    <title>FCT Home</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>
    <!--Content-->
    <div class="container d-flex justify-content-center mt-5">
        <!--Search box company-->
        <form method="post" id="form_search_company" class="d-flex" role="search">
            <input name="input_search_company" id="input_search_company" class="form-control me-2" type="text" placeholder="Buscar">
            <button name="btn_search_company" id="btn_search_company" class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>

    <?php

    ?>
</body>

</html>