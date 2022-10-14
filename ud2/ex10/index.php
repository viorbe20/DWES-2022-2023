<?php

/**
 * Ejercicio 10. Pon ejemplo de uso de la sintaxis heredoc en el manejo de cadenas.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022
 */
require("../../require/view_exercise.php");
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='../../css/style_exercises.css' />
    <title>Ud2 Ej10</title>
</head>

<body>
    <main>
        <div>
            <h3>Ejercicio 10</h3>
            <h4>Ejemplo de uso de la sintaxis heredoc en el manejo de cadenas.</h4>
            <hr>
        </div>
        <?php
        $hola = <<<EOD
hola1<br>
hola2<br>
hola3<br>
EOD;
        echo $hola;
        ?>
    </main>
</body>

</html>