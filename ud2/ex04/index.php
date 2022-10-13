<?php
require("../../require/view_home.php");
echo "</br>";
/**
 * Ejercicio 4: ¿Cuál es la salida del siguiente script?.
 * Prueba el script y modifícalo para las palabras DAW y DWES apararezcan en negrita.
 * Investiga uso de print y printf para salida de texto.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022
 */

$ciclo="DAW";
$modulo="DWES";

//Salida
print"<p>";
printf("<b>%s</b> es un módulo de <b>%d</b> curso de <b>%s</b>", $modulo, 2, $ciclo);
print"</p>"
?>