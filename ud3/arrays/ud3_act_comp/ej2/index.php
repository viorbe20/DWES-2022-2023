<?php
/**
 * Unidad 3. Actividades complementarias.
 * Ejercicio 2. Escribe un programa que genere e imprima un número aleatorio de 4 cifras, 
 * mostrando a continuación cada una de sus cifras en un color diferente.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 */

//Array de colores
$colors = ["blue", "red", "green", "orange"];
$completeNumber = [];

//Generar número aleatorio de 4 cifras con diferentes colores
for ($i = 0; $i < 4; $i++) {
    $randomNumber = rand(0, 9);
    $completeNumber[] = $randomNumber;
    print($completeNumber[$i]);
}
echo ("<br><br>");
for ($i = 0; $i < 4; $i++) {
    echo ("<font color= $colors[$i]>$completeNumber[$i]</font><br>");
}