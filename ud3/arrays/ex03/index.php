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
require("../../../require/view_home.php");

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
                "flag" => "<img width='4%' src='../assets/corea.jpg'>"
            ),
            "Turquía" => array(
                "capital" => "Ankara",
                "flag" => "<img width='4%' src='../assets/turquia.jpg'>"
            )
        ),
        "Europa" => array(
            "España" => array(
                "capital" => "Madrid",
                "flag" => "<img width='4%' src='../assets/spain.jpg'>"
            ),
            "Francia" => array(
                "capital" => "París",
                "flag" => "<img width='4%' src='../assets/france.jpg'>"
            )
        ),
        "América" => array(
            "México" => array(
                "capital" => "Ciudad de México",
                "flag" => "<img width='4%' src='../assets/mexico.jpg'>"
            ),
            "Estados Unidos" => array(
                "capital" => "Washington D.C.",
                "flag" => "<img width='4%' src='../assets/usa.jpg'>"
            )
        ),
        "Oceanía" => array(
            "Australia" => array(
                "capital" => "Camberra",
                "flag" => "<img width='4%' src='../assets/australia.jpg'>"
            ),
            "Nueva Zelanda" => array(
                "capital" => "Wellington",
                "flag" => "<img width='4%' src='../assets/new_zeland.jpg'>"
            )
        ),
        "África" => array(
            "Egipto" => array(
                "capital" => "El Cairo",
                "flag" => "<img width='4%' src='../assets/egypt.jpg'>"
            ),
            "Sudáfrica" => array(
                "capital" => "Pretoria",
                "flag" => "<img width='4%' src='../assets/southafrica.jpg'>"
            )
        )


    )
);

$procesaFormulario = False;
$selectedOption = [];
$selected = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $procesaFormulario = True;
    $selectedOption = $_POST['selectedOption'];
    $selected = "selected";
}

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
        <?php
        if (!$procesaFormulario) {
        ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="student">Selecciona la opción que quieras visualizar</label>
                <select name="selectedOption" id="selectedOption">
                    <option value="Meses">Meses</option>
                    <option value="Tablero barcos">Tablero barcos</option>
                    <option value="Nota alumnos">Nota alumnos</option>
                    <option value="Verbos irregulares">Verbos irregulares</option>
                    <option value="Geografía">Geografía</option>
                </select>
                <input type="submit" value="Enviar">
            </form>
        <?php
        } else {
        ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="student">Selecciona la opción que quieras visualizar</label>
                <select name="selectedOption" id="selectedOption">
                    <option value="Meses" <?php if ($selectedOption == "Meses") echo $selected; ?>>Meses</option>
                    <option value="Tablero barcos" <?php if ($selectedOption == "Tablero barcos") echo $selected; ?>>Tablero barcos</option>
                    <option value="Nota alumnos" <?php if ($selectedOption == "Nota alumnos") echo $selected; ?>>Nota alumnos</option>
                    <option value="Verbos irregulares" <?php if ($selectedOption == "Verbos irregulares") echo $selected; ?>>Verbos irregulares</option>
                    <option value="Geografía" <?php if ($selectedOption == "Geografía") echo $selected; ?>>Geografía</option>

                </select>
                <input type="submit" value="Enviar">
            </form>
        <?php
            if ($selectedOption == "Meses") {
                echo "<h3>Meses del año</h3>";
                echo "<ul>";
                foreach ($randomArray['months'] as $month) {
                    echo "<li>$month</li>";
                }
            } elseif ($selectedOption == "Tablero barcos") {
                echo "<h3>Tablero para jugar al juego de los barcos</h3>";
                echo "<table>";

                foreach ($randomArray['board'] as $row) {
                    echo "<tr>";
                    
                    foreach ($row as $cell) {
                        echo "<td>$cell</td>";
                    }
                    echo "</tr>";
                }
            } elseif ($selectedOption == "Nota alumnos") {
                echo "<h3>Nota de los alumnos de 2º DAW para el módulo DWES</h3>";
                echo "<table>";
                foreach ($randomArray['marks'] as $student => $mark) {
                    echo "<tr>";
                    echo "<td>$student=> </td>";
                    echo "<td>$mark</td>";
                    echo "</tr>";
                }
            } elseif ($selectedOption == "Verbos irregulares") {
                echo "<h3>Verbos irregulares en inglés</h3>";
                //Muestra español, infinitivo, pasado y participio
                foreach ($randomArray['verbs'] as $verb) {
                    echo "<table BORDER CELLPADDING=5 CELLSPACING=2><tr>";
                    echo "<td>$verb[espanyol]</td>";
                    echo "<td>$verb[infinitivo]</td>";
                    echo "<td>$verb[pasado]</td>";
                    echo "<td>$verb[participio]</td>";
                    echo "</tr></table>";
                }

            } elseif ($selectedOption == "Geografía") {
                echo "<h3>Información sobre continentes, países, capitales y banderas</h3>";
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
                
            } elseif ($selectedOption == "verbs") {
                echo "<h3>Verbos irregulares en inglés</h3>";
                echo "<table>";
                foreach ($randomArray['verbs'] as $verb => $past) {
                    echo "<tr>";
                    echo "<td>$verb</td>";
                    echo "<td>$past</td>";
                    echo "</tr>";
                }
            } elseif ($selectedOption == "geography") {
                echo "<h3>Información sobre continentes, países, capitales y banderas</h3>";
                
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
                

            }
        }
        ?>
    </main>
</body>

</html>