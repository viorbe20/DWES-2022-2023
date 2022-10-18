<?php
require("../../require/view_unit_header.php");
require("../../require/view_home.php");

$ejercicios = array(
    array('id' => 1, 'titulo' => 'Ejercicio 1', 'descripcion' => 'Almacena tres números en variables y escribirlos en pantalla de manera ordenada.', 'enlace' => '../../index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/index.php'),
    array('id' => 2, 'titulo' => 'Ejercicio 2', 'descripcion' => 'Carga en variables mes y año e indica el número de días del mes. ', 'enlace' => 'ex02/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/condiciones/ex02/index.php'),
    array('id' => 3, 'titulo' => 'Ejercicio 3', 'descripcion' => 'Carga fecha de nacimiento en variables y calcula la edad.', 'enlace' => 'ex03/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/condiciones/ex03/index.php'),
    array('id' => 3, 'titulo' => 'Ejercicio 4', 'descripcion' => 'Modifica la página inicial realizada, incluyendo una imagen de cabecera en función de la estación del año en la que nos encontremos y un color de fondo en función de la hora del día.', 'enlace' => 'ex04/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/condiciones/ex04/index.php'),
    array('id' => 3, 'titulo' => 'Ejercicio 5', 'descripcion' => 'Script que muestre una lista de enlaces en función del perfil de usuario.', 'enlace' => 'ex05/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/ud3/condiciones/ex05/index.php'),
    
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