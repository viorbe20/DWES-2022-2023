<?php
require("../../require/view_home.php");
echo "</br>";
/**
 * Ejercicio 3. Script que, a partir del radio almacenado en una variable y la definición de la constante PI, 
 * calcule el área del círculo y la longitud de la circunferencia. 
 * El debe mostrar valor de radio, longitud de la circunferencia, área del círculo y dibujará un círculo u
 * A = Π x r²
 * L = 2pi*r
 * M_PI;
 * @author: Virginia Ordoño Bernier
 * @date: September 2022 
 */

$radius = 90;
$area = M_PI * pow($radius, 2);
$length = pow(M_PI, 2)*$radius;

//Se muestran los valores
echo("Radio: $radius<br>");
echo("Área: $area<br>");
echo("Longitud: $length<br>");
echo("<svg width=($radius*2) height=($radius*2)>
<circle cx=\"100\" cy=\"100\" r=$radius fill=\"blue\">
</svg>");
?>