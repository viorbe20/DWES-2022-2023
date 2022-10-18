<?php
/**
 * Unidad 3. Actividad 2.
 * Ejercicio 3.Tablas de multiplicar del 1 al 10. 
 * Aplicar estilos en filas/columnas.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 */

//Tabla general
echo("<table border=1px solid black</table>");

//Primera fila
echo("<tr align=\"center\" bgcolor=\"#4caf50\">");

//Celda con el título
echo("<td height=\"50\" width=\"50\">Tablas</td>");

//Contenido de la primera fila
for ($i=1; $i <= 10 ; $i++) {
    echo("<th height=\"50\" width=\"50\">$i</th>");
}

//Columna de la izquiera
for ($i=1; $i <= 10 ; $i++) { 
    echo("<tr align=\"center\">");
    echo("<td bgcolor=\"#4caf50\">");
    echo($i);
    echo("</td>");
  
    //Resultado de las multiplicaciones
    for ($j=1; $j <=10 ; $j++) { 
      echo("<td bgcolor=\"#c8e6c9\">");
      echo($i*$j);
      echo("</td>");
    }
    echo("</tr>");
  }

echo("</table>");
