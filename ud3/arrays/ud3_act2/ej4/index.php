<?php
/** 
*Unidad 3. Actividad 2.
*Ejercicio 4.Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor hexadecimal que le corresponde. 
*Cada celda será un enlace a una página que mostrará un fondo de pantalla con el color seleccionado. 
*¿Puedes hacerlo con los conocimientos que tienes?
*@author: Virginia Ordoño Bernier
*@date: octubre 2021
*/

echo("<table border=1>");

$red = 00;
$green = 00;
$blue = 80;
$increase = 5;

//Columna de la izquierda
for ($i=1; $i <= 4 ; $i++) { 
  echo("<tr align=\"center\">");
  echo("<td style=\"background-color:".sprintf("#%02X%02X%02X", $red , $green , $blue).";\">");
  echo("<a href=\"colorweb.php?color=" . sprintf("%02X%02X%02X", $red , $green , $blue) . "\" style = \"text-decoration:none; color:#FFFFFF\">" . sprintf("#%02X%02X%02X", $red , $green , $blue) . "<a/>");
  echo("</td>");

  $red = $red+$increase;
  $green = $green+$increase;
  $blue = $blue+$increase;

  //Resultado de las multiplicaciones
  for ($j=1; $j <=7 ; $j++) { 
    echo("<td style=\"background-color:".sprintf("#%02X%02X%02X", $red , $green , $blue).";\">");
    echo("<a href=\"colorweb.php?color=" . sprintf("%02X%02X%02X", $red , $green , $blue) . "\" style = \"text-decoration:none; color:#FFFFFF\">" . sprintf("#%02X%02X%02X", $red , $green , $blue) . "<a/>");
    echo("</td>");

    $red = $red+$increase;
    $green = $green+$increase;
    $blue = $blue+$increase;
  }
  echo("</tr>");
}

echo("</table>");
?>