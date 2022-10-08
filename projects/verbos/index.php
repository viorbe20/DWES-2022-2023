<?php

/**
 * App que muestra un test sobre la lista de verbos irregulares en inglés.
 * Se pueden elegir la cantidad de verbos que se pueden mostrar.
 * El test tiene 3 niveles de dificultad: baja, media, alta.
 * Baja: muestra verbo en español, hay que rellenar un hueco aleatorio en inglés.
 * Media: hay que rellenar dos de cuatro huecos.
 * Alta: hay que rellenar tres de cuatro huecos.
 */
require("../../require/view_home.php");
// Incluimos el fichero con la lista de verbos
include 'irregular_verbs.php';

//Variables
$processTestType = False;
$processResult = False;
$generatedVerbsList = array();
$indexList = array();

function createVerbsList($level, $verbsNum, $list)
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
if (isset($_POST['submit_test_type'])) {
    $processTestType = True;
    $selectedTestType = array(
        "level"=> $_POST['level'], 
        "verbs" => $_POST['verbs_num']
    );
    // Creamos la lista de verbos
    $generatedVerbsList = createVerbsList($selectedTestType['level'], $selectedTestType['verbs'], $fakeVerbs);
    // Create blanks array
    $blanksArray = getBlanksArray($selectedTestType['level']);
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
        if (!$processTestType && !$processResult) {
        ?>
            <form action='index.php' method='post'>
                <div id="option1">
                    <label for='verbs_num'>Número de verbos a mostrar:
                        <input type='number' name='verbs_num' min='1' max='10' value='5'>
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
                    <input type="submit" name='submit_test_type' value='Enviar'>
                </div>
            </form>
        <?php
        } else if ($processTestType && !$processResult) {
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
                foreach ($generatedVerbsList as $verb) {
                    echo "<tr>";
                    shuffle($blanksArray);
                    for ($i = 0; $i < 4; $i++) {
                        //If True show the word, if False show an empty space
                        if ($blanksArray[$i]) {
                            echo "<td>" . $verb[$i] . "</td>";
                        } else {
                            echo "<td><input type='text' value=''></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
                </table>
                <input id='submit_result' type="submit" name='submit_result' value='Enviar'>
            </form>
        <?php
        } else {
            echo "hh";
        }

        ?>
    </main>
</body>

</html>