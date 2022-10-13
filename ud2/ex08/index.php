<?php
require("../../require/view_home.php");
echo "</br>";
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

$name = "Harry";
$num1 = 5;
$empty = NULL;

var_dump($name);
echo($name);
var_dump($num1);
var_dump($empty);
?>