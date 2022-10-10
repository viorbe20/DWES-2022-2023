<?php

/**
 * App que muestra un test sobre la lista de verbos irregulares en inglés.
 * Se pueden elegir la cantidad de verbos que se pueden mostrar.
 * El test tiene 3 niveles de dificultad: baja, media, alta.
 * Baja: hay que rellenar uno de cuatro huecos.
 * Media: hay que rellenar dos de cuatro huecos.
 * Alta: hay que rellenar tres de cuatro huecos.
 */
require("../../require/view_home.php");
include 'irregular_verbs.php';

//Variables
$processForm1 = False;
$processForm2 = False;
//$generatedVerbsList = array();
$indexList = array();
$completedBlanks = array();

//Start session
//Iniciamos sesión
session_start();

//Si la variable SESSION no se ha generado, le asignamos un array vacío
if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = array();
}
if (!isset($_SESSION['test'])) {
    $_SESSION['test'] = array();
}
if (!isset($_SESSION['blanks'])) {
    $_SESSION['blanks'] = array();
}

function createVerbsList($verbsNum, $list)
{
    $result = array();
    $indexesList = array();


    //Add verbs to the array
    while (count($indexesList) < $verbsNum) {
        $index = rand(0, (count($list)-1));

        //Check non repeated indexes
        if (!in_array($index, $indexesList)) {
            array_push($indexesList, $index);
            //Add verb to the new array
            array_push($result, $list[$index]);
        }
    }
    
    return $result;
}

function getBlanksArray ($level) {
    $blanksArray = array();
    //Difficulty level
    switch ($level) {
        case 'Alto':
            $blanksArray = array(True, False, False, False);
            break;
        case 'Medio':
            $blanksArray = array(True, True, False, False);
            break;
        case 'Bajo':
            $blanksArray = array(False, True, True, True);
            break;
    }

    return $blanksArray;
}

// Tipo de test seleccionado
if (isset($_POST['submit_view1'])) {
    $processForm1 = True;
    $selectedTestType = array(
        "level"=> $_POST['level'], 
        "verbs" => $_POST['verbs_num']
    );
    // Creamos la lista de verbos
    $_SESSION['test'] = createVerbsList($selectedTestType['verbs'], $irregularVerbs);
    // Create blanks array
    $blanksArray = getBlanksArray($selectedTestType['level']);
}

if (isset($_POST['submit_view2'])) {
    $processForm1 = True;
    $processForm2 = True;
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Irregular verbs</title>
</head>
<style>
    <?php
    echo file_get_contents("css/style.css");
    ?>
</style>

<body>
    <main>
        <h1>Test Verbos Irregulares</h1>
        <hr>
        <?php
        if (!$processForm1 && !$processForm2) {
        ?>
            <form action='index.php' method='post'>
                <div id="test_info">
                    <label for='verbs_num'>Número de verbos a mostrar:
                        <input type='number' name='verbs_num' min='1' max='10' value='2'>
                    </label>
                    <br>
                    <label for='level'>Nivel de dificultad:
                        <select name='level'>
                            <option value='Alto'>Alto</option>
                            <option value='Medio'>Medio</option>
                            <option value='Bajo'>Bajo</option>
                        </select>
                    </label>
                    <br>
                    <input type="submit" name='submit_view1' value='Enviar'>
                </div>
            </form>
        <?php
        
        //VIEW 2
        } else if ($processForm1 && !$processForm2) {
        ?>
            <div id="test_description">
                <div>
                    <label>Nivel de dificultad:
                        <span><?php echo $selectedTestType['level']; ?></span>
                    </label>
                </div>
                <div>
                    <label>Números de verbos:
                        <span><?php echo $selectedTestType['verbs']; ?></span>
                    </label>
                </div>
            </div>
            <!-- Formulario que muestra los verbos -->
            <form action='index.php' method='post'>
                <table id='table1'>
                    <tr>
                        <th>Infinitivo</th>
                        <th>Pasado</th>
                        <th>Participio</th>
                        <th>Traducción</th>
                    </tr>
                <?php
                foreach ($_SESSION['test'] as $index => $value) {
                    echo "<tr>";
                    shuffle($blanksArray);
                    array_push($completedBlanks, $blanksArray);
                    for ($i = 0; $i < 4; $i++) {
                        //If True show the word, if False show an empty space
                        if ($blanksArray[$i]) {
                            echo "<td>" . $value[$i] . "</td>";
                            //echo "<td><input type='text' value='$value[$i]' name='answers[$index][$i]'></td>";
                        } else {
                            echo "<td><input type='text' value='' name='answers[]'></td>";
                        }
                    }
                    echo "</tr>";
                }
                //Save blanks array in session
                $_SESSION['blanks'] = $completedBlanks
                ?>
                </table>
                <input id='submit_view2' type="submit" name='submit_view2' value='Enviar'>
            </form>
        <?php
        //VIEW 3
        } else if ($processForm1 && $processForm2){
            //Save answers in session
            $_SESSION['answers'] = $_POST['answers'];
            ?>
            <table id='table1'>
            <tr>
                <th>Infinitivo</th>
                <th>Pasado</th>
                <th>Participio</th>
                <th>Traducción</th>
            </tr>
            
            <?php
            $r = 0;
            for ($i=0; $i < count($_SESSION['test']); $i++) { 
                echo '<tr>';
                for ($j=0; $j < 4; $j++){
                    //If true show the word from the original array
                    if ($_SESSION['blanks'][$i][$j] == 1) {
                        echo "<td>". $_SESSION['test'][$i][$j] ."</td>";
                    } else {
                        //If false show the answer from the user
                        $solution = "right";
                        if ($_SESSION['test'][$i][$j] != $_SESSION['answers'][$r]) {
                            $solution = "wrong";
                            echo "<td class=$solution>". $_SESSION['answers'][$r] .'-'.  $_SESSION['test'][$i][$j] ."</td>";
                        } else {
                            echo "<td class=$solution>". $_SESSION['answers'][$r] ."</td>";
                        }
                        $r++;
                    }
                }
                echo '</tr>';
            }
            ?>
            </table>
        <?php
        
        }

        ?>
    </main>
</body>

</html>