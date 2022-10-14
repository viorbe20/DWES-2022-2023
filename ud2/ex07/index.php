<?php

/**
 * Ejercicio 7: Escribir un script que declare una variable 
 * y muestre la siguiente información en pantalla:
 * Valor actual 8.
 * Suma 2. Valor ahora 10.
 * Resta 4. Valor ahora 6. 
 * Multipica por 5. Valor ahora 30. 
 * Divide por 3. Valor ahora 10. 
 * Incrementa el valor en 1. Valor ahora 11. 
 * Decrementa el valor en 1. Valor ahora 10.
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
    <title>Ud2 Ej7</title>
</head>

<body>
    <main>
        <div>
            <h3>Ejercicio 7</h3>
            <h4>Script que declara una variable y muestra diferentes resultados por pantalla.</h4>
            <hr>
        </div>
        <?php
        $num = 8;

        echo ("Muestra la información");
        echo ('<br>');
        echo ("-------------------------------");
        echo ('<br>');
        echo ("Valor actual " . $num . "<br>");
        $num = $num + 2;
        echo ("Suma 2. Valor ahora " . $num . "<br>");
        $num = $num - 4;
        echo ("Resta 4. Valor ahora " . $num . "<br>");
        $num = $num * 5;
        echo ("Multiplica por 5. Valor ahora " . $num . "<br>");
        $num = $num / 3;
        echo ("Divide por 3. Valor ahora " . $num . "<br>");
        $num = $num + 1;
        echo ("Incrementa el valor en 1. Valor ahora " . $num . "<br>");
        $num = $num - 1;
        echo ("Decrementa el valor en 1. Valor ahora " . $num . "<br>");


        ?>
    </main>
</body>

</html>