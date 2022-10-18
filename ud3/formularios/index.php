<?php
require("../../require/view_unit_header.php");
require("../../require/view_home.php");

$ejercicios = array(
    array('id' => 1, 'titulo' => 'Ejercicio 1', 'descripcion' => 'Modifica el ejercicio del calendario para que el mes y el año se lean en un formulario.', 'enlace' => '../../index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/ex01/index.php'),
    array('id' => 2, 'titulo' => 'Ejercicio 2', 'descripcion' => 'Formulario para crear un currículum que incluya diferentes campos.', 'enlace' => 'ex02/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/formularios/ex02/index.php'),
    array('id' => 3, 'titulo' => 'Ejercicio 3', 'descripcion' => 'Crear una aplicación que almacene información de países: nombre capital y bandera. Diseñar un
    formulario que permita seleccionar un país y nos muestre el nombre de la capital y la bandera.', 'enlace' => 'ex03/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/formularios/ex03/index.php'),
    array('id' => 4, 'titulo' => 'Ejercicio 4', 'descripcion' => 'Crear un script para sumar una serie de números. El número de números a sumar será introducido en
    un formulario.', 'enlace' => 'ex04/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/formularios/ex04/index.php'),
    array('id' => 5, 'titulo' => 'Ejercicio 5', 'descripcion' => ' Tabla de multiplicar del 1 al 10. El programa muestra huecos para completar. Comprueba que los números introducidos son correctos y muestra resultado.', 'enlace' => 'ex05/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/formularios/ex05/index.php'),
    )
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../../css/style_units.css' />
    <title>arrays/index.php</title>
</head>

<body>
    <main>
    <?php
        foreach ($ejercicios as $key => $value) {
            echo '<article id="art' . $value['id'] . '">
        <div class="titulo">' . $value['titulo'] . '</div>
        <div class="descripcion">' . $value['descripcion'] . '</div>
        <div class="enlaces">
        <a target="_blank" href="' . $value['enlace'] . '">Ejercicio</a>
        <a target="_blank" href="' . $value['github'] . '">Código</a>
        </div>
        </article>';
        }
        ?>
    </main>
</body>

</html>