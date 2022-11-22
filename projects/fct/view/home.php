<?php
require_once '../app/Config/constantes.php';
$processLogin = false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="<?php echo DIRBASE; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo DIRBASE; ?>/assets/js/login.js"></script>
    <title>FCT Home</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    if (!$processLogin) {

    ?>
        <div class="container d-flex justify-content-center mt-5">
            <!--Company Image-->
            <img src="../../assets/img/logos/logo_ies_gc_portada.png" class="img-fluid" alt="Responsive image" style="width: 50%;">
        </div>

    <?php
    }
    ?>
</body>

</html>