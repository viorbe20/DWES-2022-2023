<?php
require_once "../app/Config/constantes.php";
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/style.css">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://localhost/dwes/projects/fct/assets/js/company_info.js"></script>
    <script src="http://localhost/dwes/projects/fct/assets/js/header.js"></script>
    <title>Add company</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    require_once '../view/require/form_create_company.php';
    require_once '../view/require/modal_created_company.php';
    ?>
</body>
</html>