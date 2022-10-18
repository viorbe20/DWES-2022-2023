<?php

function getCountries(){
      
  $a_countries = array(
    array(
        "value" => 1,
        "country" => "España",
        "capital" => "Madrid",
        "flag" => "<img src=\"img/flagSpain.png\" height=\"80\">",
    ),
    array(
        "value" => 2,
        "country" => "Portugal",
        "capital" => "Lisboa",
        "flag" => "<img src=\"img/flagPortugal.png\" height=\"80\">",
    ),
    array(
        "value" => 3,
        "country" => "Turquía",
        "capital" => "Ankara",
        "flag" => "<img src=\"img/flagTurkey.png\" height=\"80\">",
    ),
    array(
        "value" => 4,
        "country" => "Corea del Sur",
        "capital" => "Seúl",
        "flag" => "<img src=\"img/flagSouthKorea.png\" height=\"80\">",
    ),
    array(
        "value" => 5,
        "country" => "Perú",
        "capital" => "Lima",
        "flag" => "<img src=\"img/flagPeru.png\" height=\"80\">",
    ),
    array(
        "value" => 6,
        "country" => "Venezuela",
        "capital" => "Caracas",
        "flag" => "<img src=\"img/flagVenezuela.png\" height=\"80\">",
    ),
);

return $a_countries;
};