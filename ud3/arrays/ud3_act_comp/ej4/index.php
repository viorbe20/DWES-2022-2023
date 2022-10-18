<?php
/**
 * Unidad 3. Actividades complementarias
 * Ejercicio 4. Programa que lea un número entero N de 5 cifras 
 * y muestre sus cifras igual que en el ejemplo.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 */

$number = 12345;
$digit1=substr($number,0,1);
$digit2=substr($number,0,2);
$digit3=substr($number,0,3);
$digit4=substr($number,0,4);

echo($number."<br><br>");
echo($digit1."<br>");
echo($digit2."<br>");
echo($digit3."<br>");
echo($digit4."<br>");
echo($number."<br>");
