<?php
/** 
*Unidad 3. Actividad 3.
*Ejercicio 5. Mejora calendario con un array de los días festivos: colores diferentes, nacionales, comunidad, locales.
*@author: Virginia Ordoño Bernier
*@date: octubre 2021
**$year_end = strtotime('last day of December 2020', time());
*echo date('D, M jS Y', $year_end);
*/

$year = 2019;
$month = "octubre";

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

//Festivos
$holiday = array(
    array( //Enero
        "estatal" => array(
            array(
                "numero" => 1,
                "nombre" => "Año Nuevo"
            ),
            array(
                "numero" => 6,
                "nombre" => "Día de Reyes"
            ),
        ),
        "autonomico" => array(),
        "local" => array(),
    ),
    array( //Febrero
        "estatal" => array(),
        "autonomico" => array(
            array(
                "numero" => 28,
                "nombre" => "Día de Andalucía"
            )
        ),
        "local" => array(),
    ),
    array( //Marzo
        "estatal" => array(),
        "autonomico" => array(),
        "local" => array(),
    ),
    array( //Abril
        "estatal" => array(),
        "autonomico" => array(),
        "local" => array(),
    ),
    array( //Mayo
        "estatal" => array(
            array(
                "numero" => 1,
                "nombre" => "Día del Trabajador"
            )
        ),
        "autonomico" => array(),
        "local" => array(),
    ),
    array( //Junio
        "estatal" => array(),
        "autonomico" => array(),
        "local" => array(),
    ),
    array( //Julio
        "estatal" => array(),
        "autonomico" => array(),
        "local" => array(),
    ),
    array( //Agosto
        "estatal" => array(
            array(
                "numero" => 15,
                "nombre" => "Día de la Asunción de la Virgen"
            )
        ),
        "autonomico" => array(),
        "local" => array(),
    ),
    array( //Septiembre
        "estatal" => array(),
        "autonomico" => array(),
        "local" => array(
            array(
                "numero" => 8,
                "nombre" => "Día de la Virgen de Guadalupe"
            )
        ),
    ),
    array( //Octubre
        "estatal" => array(
            array(
                "numero" => 12,
                "nombre" => "Día de la Hispanidad"
            )

        ),
        "autonomico" => array(),
        "local" => array(
            array(
                "numero" => 24,
                "nombre" => "Día de San Rafael"
            )
        ),
    ),
    array( //Noviembre
        "estatal" => array(
            array(
                "numero" => 1,
                "nombre" => "Día de todos los Santos"
            )
        ),
        "autonomico" => array(),
        "local" => array(),
    ),
    array( //Diciembre
        "estatal" => array(
            array(
                "numero" => 6,
                "nombre" => "Día de la Constitución"
            ),
            array(
                "numero" => 8,
                "nombre" => "Día de la Inmaculada"
            ),
            array(
                "numero" => 25,
                "nombre" => "Día de Navidad"
            ),
        ),
        "autonomico" => array(),
        "local" => array(),
    ),
);

//Semana santa
$easterDay = (date(("j"), easter_date($year)));
$easterMonth = (date(("n"), easter_date($year)));

$fecha1 = new DateTime($year."-".$easterMonth."-".$easterDay);
$fecha1->sub(new DateInterval('P2D'));
$holyFriday = $fecha1->format('j');

$fecha2 = new DateTime($year."-".$easterMonth."-".$easterDay);
$fecha2->sub(new DateInterval('P3D'));
$holyThursday = $fecha2->format('j');

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
    $regularDay = true;
    //Colorea verde día actual y rojo domingos
  if ($numberOnCalendar == $currentDay &&
  monthInNumbers($month) == $currentMonth &&
  $year == $currentYear) {
    echo("<td bgcolor=\"green\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
  } else if (($easterMonth == monthInNumbers($month)) && (($numberOnCalendar == $holyThursday) || ($numberOnCalendar == $holyFriday))){
    echo("<td bgcolor=\"pink\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
  } else if ($i%7==0){
    echo("<td bgcolor=\"red\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
  } else {
    foreach ($holiday[$currentMonth-1] as $key => $value) {
        if ($key == "estatal") {
            for ($j=0; $j < count($value); $j++) { 
                if ($numberOnCalendar == $value[$j]["numero"]) {
                    echo ("<td bgcolor=\"purple\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
                    $regularDay = false;
                }        
            }
        } else if ($key == "autonomico") {
            for ($k=0; $k < count($value); $k++) { 
                if ($numberOnCalendar == $value[$k]["numero"]) {
                    echo ("<td bgcolor=\"orange\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
                    $regularDay = false;
                }        
            }
        } else {
            for ($l=0; $l < count($value); $l++) { 
                if ($numberOnCalendar == $value[$l]["numero"]) {
                    echo ("<td bgcolor=\"yellow\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
                    $regularDay = false;
                }        
            }
        }
    }
    if ($regularDay) {
        echo("<td align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
    }
  }
  $numberOnCalendar++;
}
//Crea una nueva fila cuando llega al domingo
if($i%7==0){
echo("</tr><tr>");
}
}
echo("</tr>");
echo("</table>");



?>