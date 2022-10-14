<?php

/**
 * Ejercicio 9. Escribir un script que utilizando variables permita obtener el siguiente resultado:
 * Valor es string. 
 * Valor es double. 
 * Valor es boolean. 
 * Valor es integer. 
 * Valor is NULL.
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
    <title>Ud2 Ej9</title>
</head>

<body>
    <main>
        <div>
            <h3>Ejercicio 9</h3>
            <h4>Programa que muestra el tipo de dato de cada variable.</h4>
            <hr>
        </div>
        <?php
        $string = "string";
        $double = 3.5;
        $boolean = TRUE;
        $integer = 5;
        $null = NULL;

        echo ("El valor es " . gettype($string) . "<br>");
        echo ("El valor es  " . gettype($double) . "<br>");
        echo ("El valor es  " . gettype($boolean) . "<br>");
        echo ("El valor es  " . gettype($integer) . "<br>");
        echo ("El valor es  " . gettype($null) . "<br>");

        ?>
    </main>
</body>

</html>