<?php
$randomArray = array(
    "months" => array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"),
    "board" => array(
        "A" => array('X', 'X', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'X'),
        "B" => array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'X'),
        "C" => array('O', 'O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'X'),
        "D" => array('O', 'X', 'X', 'X', 'O', 'O', 'X', 'O', 'O', 'X'),
        "E" => array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'X', 'O', 'X'),
        "F" => array('O', 'X', 'X', 'O', 'X', 'X', 'O', 'O', 'O', 'X'),
        "G" => array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
        "H" => array('O', 'X', 'X', 'X', 'X', 'O', 'X', 'O', 'O', 'X'),
        "I" => array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'X'),
        "J" => array('O', 'X', 'X', 'O', 'O', 'X', 'X', 'X', 'O', 'O'),
    ),
    "marks" => array(
        //array por alumno con nombre y nota
        "Alumno 1" => 9.9,
        "Alumno 2" => 7,
        "Alumno 3" => 7,
        "Alumno 4" => 8,
        "Alumno 5 " => 8,
        "Alumno 6" => 7,
    ),
    "verbs" => array(
        array(
            "espanyol" => "surgir",
            "infinitivo" => "arise",
            "pasado" => "arose",
            "participio" => "arisen"
        ),
        array(
            "espanyol" => "ser",
            "infinitivo" => "be",
            "pasado" => "was/were",
            "participio" => "been"
        ),
        array(
            "espanyol" => "golpear",
            "infinitivo" => "beat",
            "pasado" => "beat",
            "participio" => "beaten"
        ),
        array(
            "espanyol" => "llegar a ser",
            "infinitivo" => "become",
            "pasado" => "became",
            "participio" => "become"
        ),
        array(
            "espanyol" => "empezar",
            "infinitivo" => "begin",
            "pasado" => "began",
            "participio" => "begun"
        ),
    ),
    "geography" => array(
        "Asia" => array(
            "Corea del Sur" => array(
                "capital" => "Seúl",
                "flag" => "<img width='4%' src='../dwes/ud3/arrays/assets/corea.jpg'>"
            ),
            "Turquía" => array(
                "capital" => "Ankara",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Turkey.svg/1200px-Flag_of_Turkey.svg.png"
            )
        ),
        "Europa" => array(
            "España" => array(
                "capital" => "Madrid",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Spain.svg/1200px-Flag_of_Spain.svg.png"
            ),
            "Francia" => array(
                "capital" => "París",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/1200px-Flag_of_France.svg.png"
            )
        ),
        "América" => array(
            "México" => array(
                "capital" => "Ciudad de México",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Mexico.svg/1200px-Flag_of_Mexico.svg.png"
            ),
            "Estados Unidos" => array(
                "capital" => "Washington D.C.",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/1200px-Flag_of_the_United_States.svg.png"
            )
        ),
        "Oceanía" => array(
            "Australia" => array(
                "capital" => "Camberra",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_Australia_%28converted%29.svg/1200px-Flag_of_Australia_%28converted%29.svg.png"
            ),
            "Nueva Zelanda" => array(
                "capital" => "Wellington",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Flag_of_New_Zealand.svg/1200px-Flag_of_New_Zealand.svg.png"
            )
        ),
        "África" => array(
            "Egipto" => array(
                "capital" => "El Cairo",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/1200px-Flag_of_Egypt.svg.png"
            ),
            "Sudáfrica" => array(
                "capital" => "Pretoria",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/Flag_of_South_Africa.svg/1200px-Flag_of_South_Africa.svg.png"
            )
        )


    )
);

foreach ($randomArray['geography'] as $key => $country) {
    echo "<h3>". $key ."</h3>" ;
    echo "<ul>";
    foreach ($country as $name => $countryContent) {
        echo "<h4 style='color:blue'>". $name ."</h4>" ;
        echo "<li><p>Capital: " . $countryContent['capital'] . "</p></li>";
        echo "<li>Bandera: " . $countryContent['flag'] ."</li>";
        }
        echo "</ul>";
    }

