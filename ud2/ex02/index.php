<?php
require("../../require/view_exercise.php");
/**
 * Ejercicio 2. Ficha personal con los datos cargados en variables. 
 * @author: Virginia Ordoño Bernier
 * @date: September 2022
 */

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='../../css/style_exercises.css' />
    <title>Ud2 Ej2</title>
</head>

<body>
    <main>
        <div>
            <h3>Ejercicio 2</h3>
            <h4>Ficha personal con los datos cargados en variables.</h4>
            <hr>
        </div>
        <?php
        $name = "Virginia";
        $surname = "Ordoño Bernier";

        echo "Nombre: $name $surname <br><br>";
        echo "<img src='foto_vir.jpg'/ width='100'>"
        ?>
    </main>
</body>

</html>