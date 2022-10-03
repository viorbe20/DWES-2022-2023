<?php
require("../../require/view_unit_header.php");
require("../../require/view_home.php");

$ejercicios = array(
    array('id' => 1, 'titulo' => 'Ejercicio 1', 'descripcion' => 'Indexación de los ejercicios mediante un array.', 'enlace' => '../../index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/index.php'),
    array('id' => 2, 'titulo' => 'Ejercicio 2', 'descripcion' => 'Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos. El resultado
    debe mostrar nombre y fotografía.', 'enlace' => 'ex02/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/arrays/ex02/index.php'),
    array('id' => 3, 'titulo' => 'Ejercicio 3', 'descripcion' => 'Array que muestras diferentes informaciones como juego de barcos, verbos irregulares en inglés, etc', 'enlace' => 'ex03/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/arrays/ex03/index.php'),
    
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