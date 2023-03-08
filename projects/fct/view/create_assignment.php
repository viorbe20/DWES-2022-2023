<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/fct/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Create assignment</title>
</head>

<body class='d-flex flex-column'>

    <?php
    require_once '../view/require/header.php';
    var_dump($data);
    ?>
    <main class='d-flex flex-column justify-content-center align-items-center' style='padding: 2% 8%'>
    <h3 class='d-flex text-center py-2 mx-5 text-secondary'>Crear asignación</h3>
    <?php
    require_once '../view/require/form_create_assinment.php';
    ?>
    </main>
</body>


</html>