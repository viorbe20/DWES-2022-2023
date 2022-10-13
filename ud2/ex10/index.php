<?php
require("../../require/view_home.php");
echo "</br>";
/**
 * Ejercicio 10. Pon ejemplo de uso de la sintaxis heredoc en el manejo de cadenas.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022
 */

$hola = <<<EOD
hola1<br>
hola2<br>
hola3<br>
EOD;

echo $hola;
?>