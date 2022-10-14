<?php

/**
 * Ejercicio 5. Script que escriba el resultado de la suma de dos números almacenados en dos variables.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022
 */
require("../../require/view_home.php");
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='../../css/style_exercises.css' />
    <title>Ud2 Ej5</title>
</head>

<body>
    <main>
        <div>
            <h3>Ejercicio 5</h3>
            <h4>Script que escribe el resultado de la suma de dos números almacenados en dos variables.</h4>
            <hr>
        </div>
        <?php
        $number1 = 10;
        $number2 = 15;

        /**
         * Función que devuelve la suma de dos números
         * @param $number, $number
         * @return $number
         */
        function addition($param1, $param2)
        {
            $addition = $param1 + $param2;
            return $addition;
        }

        //Se muestra por pantalla
        echo ("Suma de dos números almacenados");
        echo ('<br>');
        echo ("---------------------------------------------");
        echo ('<br>');
        echo ($number1 . " + " . $number2 . " = " . addition($number1, $number2));

        ?>
    </main>
</body>

</html>