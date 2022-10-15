<?php

/**
 * Ejercicio 5. Tabla de multiplicar del 1 al 10. 
 * El programa muestra huecos para completar. Comprueba que los números introducidos son correctos y muestra resultado.
 * @author: Virginia Ordoño Bernier
 * @date: October 2022 
 */

require("../../../require/view_home.php");

$showSolution = false;
define("BLANKSNUMBER", 5);

/**
 * Función que devuelve un array con las posiciones de los huecos
 */
function getBlanks($number)
{
    $blanks = array();
    
    while ($number != 0) {
        $i = rand(1, 10);
        $j = rand(1, 10);
        
        $randomPosition = $i . "." . $j;

        if (!in_array($randomPosition, $blanks)) {
            array_push($blanks, $randomPosition);
            $number--;
        }
    }
    return $blanks;
}


if (isset($_POST['check'])) {
    $showSolution = true;
    //Array with user answers
    $answers = $_POST['answers'];
} 

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Ud3 Ex5. Tabla de multiplicar</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    tr {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        border: 1px solid black;
        padding: 8px;
    }

    td {
        border: 1px solid black;
        padding: 8px;
    }
</style>

<body>
    <main>
        <h1>Tabla de multiplicar</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table>
                <tr>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<th>$i</th>";
                    }
                    ?>
                </tr>
                <?php
                
                if (!isset($_POST['answers'])) { //Si no se ha enviado el formulario
                    $blanks = getBlanks(BLANKSNUMBER);
                } else {
                    $blanks = array();
                    foreach ($_POST['blanks'] as $key => $value) {
                        array_push($blanks, $key);
                    }
                }
                
                foreach ($blanks as $key => $value) { //Cargamos los huecos en post
                    echo "<input type='hidden' name='blanks[$value]' value=''>";
                
                }
        
                $index = 0; //Índice para obtener las respuestas cargadas en el array
                for ($i = 1; $i <= 10; $i++) {
                    echo "<tr>";
                    echo "<th>$i</th>";
                    for ($j = 1; $j <= 10; $j++) {
                        $position = $i . "." . $j;
                        if (($index < BLANKSNUMBER) and (in_array($position, $blanks))) { //Si es un hueco
                            $showSolution ? $value = $answers[$index] : $value = " ";
                            echo "<td><input type='text' name='answers[]' value='$value' size='1'></td>";
                            $index++;
                        } else { //Si no es un hueco
                            echo "<td>" . $i * $j . "</td>";
                        }
                    }
                    echo "</tr>";
                }

                ?>
            </table>
            <br>
            <input type="submit" value="Comprobar" name="check">
            <a href="<?php $_SERVER['PHP_SELF']; ?>"><input type='button' value='Comenzar'/></a>
        </form>

        <?php
        if ($showSolution) { //Comprueba las respuestas
            $index = 0;
            $correctAnswers = 0;
            for ($i = 1; $i <= 10; $i++) {
                for ($j = 1; $j <= 10; $j++) {
                    $position = $i . "." . $j;
                    if (($index < BLANKSNUMBER) and (in_array($position, $blanks))) {
                        if ($answers[$index] == $i * $j) {
                            $correctAnswers++;
                        }
                        $index++;
                    }
                }
            }
            echo "<p>Has acertado $correctAnswers respuestas</p>";
        }
        ?>
    </main>
</body>

</html>