<?php

/**
 * Ejercicio 3. Crear una aplicación que almacene información de países.
 * 1. Nombre 
 * 2. Capital 
 * 3. Vandera. 
 * Diseñar un formulario que permita seleccionar un país y nos muestre el nombre de la capital y la bandera.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022 
 */

require("../../../require/view_home.php");

$formProcess = false;
$countries = array(
    "España" => array("capital" => "Madrid", "bandera" => "espana.jpg"),
    "Francia" => array("capital" => "París", "bandera" => "francia.jpg"),
    "Italia" => array("capital" => "Roma", "bandera" => "italia.jpg"),
    "Portugal" => array("capital" => "Lisboa", "bandera" => "portugal.jpg"),
    "Alemania" => array("capital" => "Berlín", "bandera" => "alemania.jpg"),
    "Grecia" => array("capital" => "Atenas", "bandera" => "grecia.jpg"),
    "Holanda" => array("capital" => "Ámsterdam", "bandera" => "holanda.jpg"),
    "Irlanda" => array("capital" => "Dublín", "bandera" => "irlanda.jpg"),
    "Polonia" => array("capital" => "Varsovia", "bandera" => "polonia.jpg"),
);
$selectedCountry = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formProcess = true;

    if (isset($_POST['selectedCountry'])) {
        $selectedCountry = $_POST['selectedCountry'];
    }
};


?>


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Muestra países</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid white;
        border-collapse: collapse;
    }

    th,
    td {
        background-color: #ddd;
    }

    th,
    td {
        padding-top: 10px;
        padding-bottom: 20px;
        padding-left: 30px;
        padding-right: 40px;
    }
</style>

<body>
    <main>
        <div class='enunciado'>
            <h3>Ejercicio 3</h3>
            <p>Diseñar un formulario que permita seleccionar un país y nos muestre el nombre de la capital y la bandera.</p>
            <hr>
        </div>
        <?php
        if (!$formProcess) {
        ?>
            <label>Selecciona un país</label>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <select name="selectedCountry">
                    <?php
                    foreach ($countries as $key => $value) {
                        echo "<option>$key</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Enviar">
            <?php
        } else {
            ?>
                <label>Selecciona un país</label>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <select name="selectedCountry">
                        <?php
                        foreach ($countries as $key => $value) {
                            if ($key == $selectedCountry) {
                                echo "<option selected>$key</option>";
                            } else {
                                echo "<option>$key</option>";
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" value="Enviar">
                    <br><br>
                    <table>
                        <tr>
                            <th>País</th>
                            <th>Capital</th>
                            <th>Bandera</th>
                        </tr>
                        <tr>
                            <td><?php echo $selectedCountry ?></td>
                            <td><?php echo $countries[$selectedCountry]['capital'] ?></td>
                            <td><img src="./img/<?php echo $countries[$selectedCountry]['bandera'] ?>" alt="Bandera de <?php echo $selectedCountry ?>" width="100px"></td>
                        </tr>
                    </table>
                <?php
            }
                ?>
    </main>
</body>

</html>