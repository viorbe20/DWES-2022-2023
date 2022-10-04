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
                echo "<table>";
                foreach ($randomArray['geography'] as $continent => $countries) {
                    echo "<tr>";
                    echo "<td>$continent</td>";
                    echo "<td>";
                    echo "<table>";
                    foreach ($countries as $country => $info) {
                        echo "<tr>";
                        echo "<td>$country</td>";
                        echo "<td>";
                        echo "<table>";
                        foreach ($info as $key => $value) {
                            echo "<tr>";
                            echo "<td>$key</td>";
                            echo "<td>$value</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</td>";
                    echo "</tr>";
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
                echo "<table>";
                foreach ($randomArray['geography'] as $continent => $countries) {
                    echo "<tr>";
                    echo "<td>$continent</td>";
                    echo "<td>";
                    echo "<table>";
                    foreach ($countries as $country => $info) {
                        echo "<tr>";
                        echo "<td>$country</td>";
                        echo "<td>";
                        echo "<table>";
                        foreach ($info as $key => $value) {
                            echo "<tr>";
                            echo "<td>$key</td>";
                            echo "<td>$value</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
        }
        ?>
    </main>
</body>

</html>