<?php
/**
 * Ejercicio 5. Script que escriba el resultado de la suma de dos números almacenados en dos variables.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022
 */

$number1=10;
$number2=15;

/**
 * Función que devuelve la suma de dos números
 * @param $number, $number
 * @return $number
 */
function addition ($param1, $param2){
    $addition=$param1+$param2;
    return $addition;
}

//Se muestra por pantalla
echo("Suma de dos números almacenados");
echo('<br>');
echo("---------------------------------------------");
echo('<br>');
echo($number1." + ".$number2." = ".addition($number1, $number2));
?>