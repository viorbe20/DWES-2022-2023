<?php

/**
 * Ejercicio 3. Define un array que permita almacenar y mostrar la siguiente información.
 * a. Meses del año.
 * b. Tablero para jugar al juego de los barcos.
 * c. Nota de los alumnos de 2º DAW para el módulo DWES. 
 * d. Verbos irregulares en inglés.
 * e. Información sobre continentes, países, capitales y banderas.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022 
 */
require("../../../require/view_home_units.php");

$studentsDaw = array(
    "months" => array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"),
    "board" => array(
        "A" => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
        "B" => array(0, 0, 1, 1, 1, 1, 0, 0, 0, 1),
        "C" => array(0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
        "D" => array(0, 1, 0, 0, 0, 1, 0, 0, 0, 0),
        "E" => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        "F" => array(0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
        "G" => array(0, 0, 0, 0, 1, 0, 0, 0, 1, 0),
        "H" => array(0, 0, 0, 0, 1, 0, 0, 0, 1, 0),
        "I" => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        "J" => array(0, 1, 1, 1, 0, 0, 0, 1, 0, 0),
    ),
    "marks" => array(
        "Alumno 1" => 9.9,
        "Alumno 2" => 7,
        "Alumno 3" => 7,
        "Alumno 4" => 8,
        "Alumno 5 " => 8,
        "Alumno 6" => 7,
    ),
    "verbs" => array(
        "surgir" => array(
            "infinitivo" => "arise",
            "pasado" => "arose",
            "participio" => "arisen"
        ),
        "ser" => array(
            "infinitivo" => "be",
            "pasado" => "was/were",
            "participio" => "been"
        ),
        "golpear" => array(
            "infinitivo" => "beat",
            "pasado" => "beat",
            "participio" => "beaten"
        ),
        "convertirse" => array(
            "infinitivo" => "become",
            "pasado" => "became",
            "participio" => "become"
        ),
        "comenzar" => array(
            "infinitivo" => "begin",
            "pasado" => "began",
            "participio" => "begun"
        ),
    ),
    "geography" => array(
        "Asia" => array(
            "Corea del Sur" => array(
                "capital" => "Seúl",
                "flag" => "https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_South_Korea.svg/1200px-Flag_of_South_Korea.svg.png"
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

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <title></title>
</head>

<body>
    <style>
        #selectedStudent {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .center {
            text-align: center;
        }
    </style>
    <main>
        <div class='enunciado'>
            <h3>Ejercicio 3</h3>
            <p>Define un array que permita almacenar y mostrar la siguiente información.</p>
            <ol>
                <li>Meses del año.</li>
                <li>Tablero para jugar al juego de los barcos.</li>
                <li>Nota de los alumnos de 2º DAW para el módulo DWES.</li>
                <li>Verbos irregulares en inglés.</li>
                <li>Información sobre continentes, países, capitales y banderas.</li>
            </ol>
            <hr>
        </div>
        <form action="post">
            <label for="student">Selecciona la opción que quieras visualizar</label>
            <select name="options" id="options">
                <option value="opt1">Meses</option>
                <option value="opt2">Tablero barcos</option>
                <option value="opt3">Nota alumnos</option>
                <option value="opt4">Verbos irregulares inglés</option>
                <option value="opt5">Información geográfica</option>
            </select>
            <input type="submit" value="Enviar">
        </form>
        <?php

        ?>
    </main>
</body>

</html>