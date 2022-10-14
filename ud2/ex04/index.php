<?php

/**
 * Ejercicio 4: ¿Cuál es la salida del siguiente script?.
 * Prueba el script y modifícalo para las palabras DAW y DWES apararezcan en negrita.
 * Investiga uso de print y printf para salida de texto.
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
    <title>Ud2 Ej4</title>
</head>

<body>
    <main>
        <div>
            <h3>Ejercicio 4</h3>
            <h4>Programa que prueba los usos de print y printf.</h4>
            <hr>
        </div>
        <?php
        $ciclo = "DAW";
        $modulo = "DWES";

        //Salida
        print "<p>";
        printf("<b>%s</b> es un módulo de <b>%d</b> curso de <b>%s</b>", $modulo, 2, $ciclo);
        print "</p>" 
        ?>
    </main>
</body>

</html>