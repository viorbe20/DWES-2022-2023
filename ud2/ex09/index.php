<?php
require("../../require/view_home.php");
echo "</br>";
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

$string = "string";
$double = 3.5;
$boolean = TRUE;
$integer = 5;
$null = NULL;

echo("El valor es ".gettype($string)."<br>");
echo("El valor es  ".gettype($double)."<br>");
echo("El valor es  ".gettype($boolean)."<br>");
echo("El valor es  ".gettype($integer)."<br>");
echo("El valor es  ".gettype($null)."<br>");
?>