<?php

/**
 * Ejercicio 8: A veces es necesario conocer exactamente el contenido de una variable. 
 * Piensa como puedes hacer esto y escribe un script con la siguiente salida:
 * string(5) “Harry” 
 * Harry 
 * int(28) 
 * NULL
 * @author: Virginia Ordoño Bernier
 * @date: September 2022
 */
require("../../require/view_exercise.php");
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='../../css/style_exercises.css' />
    <title>Ud2 Ej8</title>
</head>

<body>
    <main>
        <div>
            <h3>Ejercicio 8</h3>
            <h4>Ejercicios con uso de variables.</h4>
            <hr>
        </div>
        <?php
        $name = "Harry";
        $num1 = 5;
        $empty = NULL;

        var_dump($name);
        echo ($name);
        var_dump($num1);
        var_dump($empty);

        ?>
    </main>
</body>

</html>