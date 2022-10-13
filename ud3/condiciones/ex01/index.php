<?php
/**
 * Unidad 3. Act 1.
 * Ejercicio 1. Almacena tres números en variables y escribirlos en pantalla de manera ordenada.
 * @author: Virginia Ordoño Bernier
 * @date: October 2022
 */
require ("../../../require/view_home.php");
$num1 = 5;
$num2 = 2;
$num3 = 3;

echo("Números ordenados<br>");
echo("---------------------------<br>");

if($num1 < $num2 && $num2 < $num3){
    echo($num1." < ".$num2." < ".$num3);
}
else if ($num1 < $num3 && $num3 < $num2){
    echo($num1." < ".$num3." < ".$num2);
}
else if ($num2 < $num3 && $num3 < $num1){
    echo($num2." < ".$num3." < ".$num1);
}
else if ($num2 < $num1 && $num1 < $num3){
    echo($num2." < ".$num1." < ".$num3);
}
else if ($num3 < $num1 && $num1 < $num2){
    echo($num3." < ".$num1." < ".$num2);
}
else if ($num3 < $num2 && $num2 < $num1){
    echo($num3." < ".$num2." < ".$num1);
}
else if ($num1 == $num2 & $num1 < $num3){
    echo($num1." = ".$num2." < ".$num3);
}
else if ($num1 == $num2 & $num1 > $num3){
    echo($num3." < ".$num1." = ".$num2);
}
else if ($num2 == $num3 & $num2 < $num1){
    echo($num2." = ".$num3." < ".$num1);
}
else if ($num2 == $num3 & $num2 > $num1){
    echo($num1." < ".$num3." = ".$num2);
}
else if ($num1 == $num3 & $num1 < $num2){
    echo($num1." = ".$num3." < ".$num2);
}
else if ($num1 == $num3 & $num1 > $num2){
    echo($num2." < ".$num1." = ".$num3);
}
else{
    echo($num1." = ".$num2." = ".$num3);
}
?>