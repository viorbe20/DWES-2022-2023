<?php
/**
 * Unidad 3. Act 1.
 * Ejercicio 3. Carga fecha de nacimiento en variables y calcula la edad.
 * @author: Virginia Ordoño Bernier
 * @date: October 2022
 */

require ("../../../require/view_home.php");
echo "</br>";

$day = 8;
$month = 10;
$year = 2021;

//Fecha actual
$currentDay = date("j");
$currentMonth = date("n");
$currentYear = date("Y");

echo("Tu nacimiento fue el ".$day." del ".$month." de ".$year.".<br>");
//Si el mes es menor que el actual que la fecha actual
if ($month < $currentMonth) {
    $age = $currentYear - $year;
    echo("Tienes $age años.");
//Si mes es igual y el día menor o igual que la fecha actual
} elseif ($month == $currentMonth && $day < $currentDay) {
        $age = $currentYear - $year;
        echo("Tienes $age años.");
} elseif ($month == $currentMonth && $day = $currentDay) {
    $age = $currentYear - $year;
    echo("Hoy cumples ".$age." años. ¡Felicidades!");
} else {
    $age = ($currentYear - $year)-1;
    echo("Tienes $age años.");
}
?>