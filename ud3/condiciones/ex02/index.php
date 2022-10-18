<?php
/**
 * Unidad 3. Act 1.
 * Ejercicio 2. Carga en variables mes y año e indica el número de días del mes. 
 * Utiliza la estructura de control switch.
 * Para saber si un año es bisiesto:
 * - Divisible entre 4 y no entre 100 o 400.
 * - Divisible entre 4, 100 y 400
 * - Ejemplo año bisiesto: 2020.
 * @author: Virginia Ordoño Bernier
 * @date: October 2022
 */

require ("../../../require/view_home.php");
echo "</br>";

$month = strtolower("octubre");
$year = 2020;

switch ($month) {
    case 'abril'; case'junio'; case'septiembre'; case 'noviembre';
        echo($month." de ".$year." tiene 30 días.");
        break;     
    case 'febrero';
        if ($year % 4 == 0 && $year % 100 !=0 || $year % 4 == 0 && 
        $year % 100 !=0 && $year % 400 == 0) {
            echo($month." de ".$year." tiene 29 días.");  
        } else {
            echo($month." de ".$year." tiene 28 días.");
        }
        break;
    default;
        echo($month." de ".$year." tiene 31 días.");
        break;    
}
?>