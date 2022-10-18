<?php
/** 
*Unidad 3. Actividad 2.
*Ejercicio 5. Dado el mes y año almacenados en variables, 
*escribir un programa que muestre el calendario mensual correspondiente. 
*Marcar el día actual en verde y los festivos en rojo.
*@author: Virginia Ordoño Bernier
*@date: octubre 2021
**$year_end = strtotime('last day of December 2020', time());
*echo date('D, M jS Y', $year_end);
*/

$year = 2021;
$month = strtolower("octubre");

//Fecha actual
$currentDay = date("j");
$currentMonth = date("n");
$currentYear = date("Y");

//Devuelve el primer día dado un mes en número de la semana de 0 a 7.
$completeDate = strtotime($year."-".monthInNumbers($month));
$firstDayOfMonth = date("N", $completeDate);
$daysPerMonth = date("t", $completeDate);

/**
 * Función que convierte recibe un mes en string y devuelve su número
 * @param {string} mes
 * @return {number} número correspondiente
 */
function monthInNumbers($month){ 
  switch ($month) {
  case 'enero';
  return $monthNumber = 1;
  break;
  case 'febrero'; 
  return $monthNumber = 2;
  break;
  case 'marzo'; 
  return $monthNumber = 3;
  break;
  case 'abril';
  return $monthNumber = 4;
  break;
  case 'mayo'; 
  return $monthNumber = 5;
  break;
  case 'junio'; 
  return $monthNumber = 6;
  break;
  case 'julio'; 
  return $monthNumber = 7;
  break;
  case 'agosto';
  return $monthNumber = 8;
  break;
  case 'septiembre'; 
  return $monthNumber = 9;
  break;
  case 'octubre'; 
  return $monthNumber = 10;
  break;
  case 'noviembre'; 
  return $monthNumber = 11;
  break;
  case 'diciembre';
  return $monthNumber = 12;
  break;
  default;
      echo("El mes introducido no es correcto.");
      break;    
}
}

//Mes
echo("<table border=1>");
//Cabecera
echo("<tr align=\"center\">");
echo("<td colspan=\"7\">".strtoupper($month)." ".$year."</td>");
echo("</tr>");

//Nombre días
echo("<tr>");
  echo("<th>L</th>");
  echo("<th>M</th>");
  echo("<th>X</th>");
  echo("<th>J</th>");
  echo("<th>V</th>");
  echo("<th>S</th>");
  echo("<th>D</th>");
echo("</tr>");//seguro?

//Semanas
$numberOnCalendar = 1;
$boxesNumber = 35;
for ($i=1; $i <= $boxesNumber; $i++) {
    //Si el mes ocupa 6 semanas ampliamos una fila
    if ($daysPerMonth >= 30 && $firstDayOfMonth == 6 || $firstDayOfMonth == 7 ) {
        $boxesNumber = 42;
    }

if ($i<$firstDayOfMonth) {
  echo("<td align=\"center\" height=\"50\" width=\"50\"></td>");
} else if ($numberOnCalendar<=$daysPerMonth){
  
    //Colorea verde día actual y rojo domingos
  if ($numberOnCalendar == $currentDay &&
  monthInNumbers($month) == $currentMonth &&
  $year == $currentYear) {
    echo("<td bgcolor=\"green\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
  } else if ($i%7==0) {
    echo("<td bgcolor=\"red\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
  } else {
    echo("<td align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
  }
  
  $numberOnCalendar++;
}
if($i%7==0){
echo("</tr><tr>");
}

}
echo("</tr>");
echo("</table>");


?>