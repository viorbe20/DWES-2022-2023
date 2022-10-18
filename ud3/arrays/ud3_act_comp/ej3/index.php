<?php
/**
 * Unidad 3. Actividades complementarias
 * Ejercicio 3. Escribe un programa que genere tres números aleatorios correspondientes 
 * a la fecha de nacimiento (día, mes, año) de una persona. 
 * Debes garantizar que la fecha generada es válida.
 * El script mostrará en pantalla la fecha y una imagen con el horoscope del horoscope de la persona.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 */

//Año
$year = rand(1930, 2020);

//Mes
$month = rand(1, 12);

//Día
$day = rand(1, $daysAMonth = date("t"));

/**
 * Función que dado un mes y un día, establece el horóscopo
 * 
 * @param: number, number. El día y el mes.
 * @return: string. Nombre e imagen del horóscopo para mostrar por pantalla
 */
function checkHoroscope($day, $month): string
{
    $horoscope = "";
    switch ($month) {
        case 1:
            if ($day <= 20) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Capricornio</h1><img src=\"img/capricornio.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Acuario</h1><img src=\"img/acuario.png\" height=\"100\">";
            }
            break;
        case 2:
            if ($day <= 18) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Acuario</h1><img src=\"img/acuario.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Piscis</h1><img src=\"img/piscis.png\" height=\"100\">";
            }
            break;
        case 3:
            if ($day <= 20) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Piscis</h1><img src=\"img/piscis.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Aries</h1><img src=\"img/aries.png\" height=\"100\">";
            }
            break;
        case 4:
            if ($day <= 20) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Aries</h1><img src=\"img/aries.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Tauro</h1><img src=\"img/tauro.png\" height=\"100\">";
            }
            break;
        case 5:
            if ($day <= 21) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Tauro</h1><img src=\"img/tauro.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Géminis</h1><img src=\"img/geminis.png\" height=\"100\">";
            }
            break;
        case 6:
            if ($day <= 21) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Géminis</h1><img src=\"img/geminis.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Cáncer</h1><img src=\"img/cancer.png\" height=\"100\">";
            }
            break;
        case 7:
            if ($day <= 22) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Cáncer</h1><img src=\"img/cancer.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Leo</h1><img src=\"img/leo.png\" height=\"100\">";
            }
            break;
        case 8:
            if ($day <= 23) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Leo</h1><img src=\"img/leo.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Virgo</h1><img src=\"img/virgo.png\" height=\"100\">";
            }
            break;
        case 9:
            if ($day <= 23) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Virgo</h1><img src=\"img/virgo.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Libra</h1><img src=\"img/libra.png\" height=\"100\">";
            }
            break;
        case 10:
            if ($day <= 23) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Libra</h1><img src=\"img/libra.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Escorpio</h1><img src=\"img/escorpio.png\" height=\"100\">";
            }
            break;
        case 11:
            if ($day <= 22) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Escorpio</h1><img src=\"img/escorpio.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Sagitario</h1><img src=\"img/sagitario.png\" height=\"100\">";
            }
            break;
        case 12:
            if ($day <= 21) {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Sagitario</h1><img src=\"img/sagitario.png\" height=\"100\">";
            } else {
                $horoscope = "<h1 style=\"color:#1b5e20;\">Capricornio</h1><img src=\"img/capricornio.png\" height=\"100\">";
            }
            break;
    }
    return $horoscope;
}


echo ("La fecha de nacimiento es: ");
echo ($day . " del " . $month . " de " . $year . "<br>");
echo (checkHoroscope($day, $month));