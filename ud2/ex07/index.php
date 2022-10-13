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

$num = 8;

echo("Muestra la información");
echo('<br>');
echo("-------------------------------");
echo('<br>');
echo("Valor actual ".$num."<br>");
$num = $num+2;
echo("Suma 2. Valor ahora ".$num."<br>");
$num = $num-4;
echo("Resta 4. Valor ahora ".$num."<br>");
$num = $num*5;
echo("Multiplica por 5. Valor ahora ".$num."<br>");
$num = $num/3;
echo("Divide por 3. Valor ahora ".$num."<br>");
$num = $num+1;
echo("Incrementa el valor en 1. Valor ahora ".$num."<br>");
$num = $num-1;
echo("Decrementa el valor en 1. Valor ahora ".$num."<br>");
?>