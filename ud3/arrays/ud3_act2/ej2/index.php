<?php
/**
 * Unidad 3. Actividad 2.
 * Ejercicio 1. Sumar los tres primeros números pares.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 */

$cont = 3;
$numbers = 1;

/**
 * Función que comprueba los 3 primeros números pares y los devuelve
 * @param{$number, $number} Cantidad de números pares y números que se irán incrementando
 */
function firstEvenNumbers($cont, $numbers){
  $result = 0;
  
  while ($cont > 0) {
    if ($numbers%2==0) {
    $result = $result + $numbers;
    $cont--;
    } 
    $numbers++;
} 

return $result;
};

//Muestra por pantalla
echo("La suma de los tres primeros números pares es " .firstEvenNumbers($cont, $numbers).".");
?>

