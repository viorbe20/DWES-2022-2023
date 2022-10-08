<?php

/**
 * Ejercicio 4. Crear un script para sumar una serie de números. El número de números a sumar será introducido en un formulario.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022 
 */

require("../../../require/view_home.php");

$session_start();
$formProcess = false;

//Si la variable SESSION no se ha generado, le asignamos un array vacío
if (!isset($_SESSION['numbersAdd'])) {
    $_SESSION['numbersAdd'] = array();
}

if (isset($_POST['add'])) {
    $_SESSION['numbersAdd'][]=array('number'=>$_POST['number']);
}


?>


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Suma números</title>
</head>

<body>
    <main>
        <div class='enunciado'>
            <h3>Ejercicio 4</h3>
            <p>Crear un script para sumar una serie de números. El número de números a sumar será introducido en un formulario.</p>
            <hr>
        </div>
        <?php
        if (!$formProcess) {
        ?>
            <label>Introduce los números que quieras sumar</label>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <p>Introduce un número</p>
                <input type="number" name="number" placeholder="Número" />

                <input type="submit" name="add" value="Agregar"><br /><br />

                <input type="submit" name="submit" value="Sumar"><br /><br />
            </form>
        <?php
        } else {
        ?>

            <?php
        }
            ?>
    </main>
</body>

</html>