<?php

/**
 * Ejercicio 6: Script que cargue las siguientes variables:
 * $x=10; $y=7; 
 * y muestre
 * 10 + 7 = 17 10 - 7 = 3 10 * 7 = 70 10 / 7 = 1.4285714285714 10 % 7 = 3
 * @author: Virginia Ordoño Bernier
 * @since: September 2022
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
    <title>Ud2 Ej6</title>
</head>

<body>
    <main>
        <div>
            <h3>Ejercicio 6</h3>
            <h4>Script que carga dos enteros y muestra diferentes operaciones con ambos números.</h4>
            <hr>
        </div>
        <?php
        $x = 10;
        $y = 7;

        /**
         * Función que recibe dos parámetros y devuelve su suma
         * @param number, number
         * @return number
         */
        function addition($param1, $param2)
        {
            return $result = $param1 + $param2;
        };

        /**
         * Función que recibe dos parámetros y devuelve el resultado de la resta
         * @param number, number
         * @return number
         */
        function substraction($param1, $param2)
        {
            return $result = $param1 - $param2;
        };

        /**
         * Función que recibe dos parámetros y devuelve el resultado de la multiplicación
         * @param number, number
         * @return number
         */
        function multiplication($param1, $param2)
        {
            return $result = $param1 * $param2;
        };

        /**
         * Función que recibe dos parámetros y devuelve el resultado de la división
         * @param number, number
         * @return number
         */
        function division($param1, $param2)
        {
            return $result = $param1 / $param2;
        };

        //Se muestra por pantalla
        echo ("Operaciones aritméticas");
        echo ('<br>');
        echo ("-------------------------------");
        echo ('<br>');
        echo ($x . " + " . $y . " = " . addition($x, $y));
        echo ('<br>');
        echo ($x . " - " . $y . " = " . substraction($x, $y));
        echo ('<br>');
        echo ($x . " x " . $y . " = " . multiplication($x, $y));
        echo ('<br>');
        echo ($x . " / " . $y . " = " . division($x, $y));

        ?>
    </main>
</body>

</html>