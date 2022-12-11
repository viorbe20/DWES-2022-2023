<?php

/**
 * Incluye en tu servidor un contador que indique las veces que un usuario ha visitado el sitio.
 * Versión con sesiones
 * 
 * @author Virginia Ordoño Bernier
 * @since December 2022
 */


session_start();
if (isset($_POST['btn_submit'])) {
    //Destruye session
    session_destroy();
    header("Location: ex01.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Ex 01 Sessions</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
</head>

<body class='m-0 row justify-content-center'>
    <h1 class='d-flex justify-content-center'>Bienvenido a la página de visitas</h1>
    <?php
    if (isset($_SESSION['contador'])) {
        $_SESSION['contador'] = $_SESSION['contador'] + 1;
        echo "<h1></h1>";
        echo "<br><br>";
        echo "Has visitado esta página " . $_SESSION['contador'] . " veces.";
        //Formulario que borra la cookie
        echo "<form action='' method='post'>";
        echo "<input type='submit' name='btn_submit' value='Iniciar contador'>";
        echo "</form>";
    } else {
        $_SESSION['contador'] = 1;
        echo "<br>";
        echo "Esta es la primera vez que visitas la página";
    }
    ?>
</body>

</html>


