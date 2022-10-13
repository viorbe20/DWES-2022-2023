<?php
/**
 * Ejercicio 6: Script que cargue las siguientes variables:
 * $x=10; $y=7; 
 * y muestre
 * 10 + 7 = 17 10 - 7 = 3 10 * 7 = 70 10 / 7 = 1.4285714285714 10 % 7 = 3
 * @author: Virginia Ordoño Bernier
 * @since: September 2022
 */

$x = 10; 
$y = 7;

/**
 * Función que recibe dos parámetros y devuelve su suma
 * @param number, number
 * @return number
 */
function addition($param1, $param2){
    return $result = $param1 + $param2;
};

/**
 * Función que recibe dos parámetros y devuelve el resultado de la resta
 * @param number, number
 * @return number
 */
function substraction($param1, $param2){
    return $result = $param1 - $param2;
};

/**
 * Función que recibe dos parámetros y devuelve el resultado de la multiplicación
 * @param number, number
 * @return number
 */
function multiplication($param1, $param2){
    return $result = $param1*$param2;
};

/**
 * Función que recibe dos parámetros y devuelve el resultado de la división
 * @param number, number
 * @return number
 */
function division($param1, $param2){
    return $result = $param1 / $param2;
};

//Se muestra por pantalla
echo("Operaciones aritméticas");
echo('<br>');
echo("-------------------------------");
echo('<br>');
echo($x." + ".$y." = ".addition($x, $y));
echo('<br>');
echo($x." - ".$y." = ".substraction($x, $y));
echo('<br>');
echo($x." x ".$y." = ".multiplication($x, $y));
echo('<br>');
echo($x." / ".$y." = ".division($x, $y));
?>