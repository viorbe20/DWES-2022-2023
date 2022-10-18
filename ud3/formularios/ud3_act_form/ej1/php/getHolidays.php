<?php
function getHolidays() {
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
return $holiday;
}
