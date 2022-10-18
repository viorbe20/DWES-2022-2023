<?php
/**
 * Unidad 3. Actividades complementarias.
 * Ejercicio 1. Escribe un programa que genere e imprima 20 números aleatorios (0-100), 
 * mostrando también el mayor, el menor y la media.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 */

$numbersGroup = [];

//Generar 20 números aleatorios
print("1º) 20 números aleatorios: <br>");
for ($i = 0; $i < 20; $i++) {
    $randomNumber = rand(0, 100);
    $numbersGroup[] = $randomNumber;
    print($numbersGroup[$i].(", "));
}

//Número mayor
echo ("<br><br>");
print("2º) Número mayor: ");
print(max($numbersGroup));

//Número menor
echo ("<br><br>");
print("3º) Número menor: ");
print(min($numbersGroup));

//Calcular la media
echo ("<br><br>");
print("4º) La media: ");
print(array_sum($numbersGroup) / count($numbersGroup));
?>