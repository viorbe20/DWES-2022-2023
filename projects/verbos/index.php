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
$selectedTestType = array();
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

// Tipo de test seleccionado
if (isset($_POST['submit_test_type'])) {
    $processTestType = True;
    array_push($selectedTestType, $_POST['level'], $_POST['verbs_num']);
    // Creamos la lista de verbos
    $generatedVerbsList = createVerbsList($selectedTestType[0], $selectedTestType[1], $fakeVerbs);
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
                    <label for='level'>Dificultad:
                        <select name='level'>
                            <option value='alta'>Alta</option>
                            <option value='media'>Media</option>
                            <option value='baja'>Baja</option>
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
                        <span><?php echo $selectedTestType[1]; ?></span>
                    </label>
                </div>
                <div>
                    <label>Números de verbos:
                        <span><?php echo $selectedTestType[0]; ?></span>
                    </label>
                </div>
            </div>
            <!-- Formulario que muestra los verbos -->
            <form action='index.php' method='post'>
                <?php
                echo('<pre>');
                var_dump($generatedVerbsList);
                echo('</pre>');
                ?>
                <table>

                </table>
            </form>
        <?php
        } else {
            echo "hh";
        }

        ?>
    </main>
</body>

</html>