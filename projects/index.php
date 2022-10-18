<?php
require("../require/view_home.php");

$ejercicios = array(
    array('id' => 1, 'titulo' => 'Ejercicio 1', 'descripcion' => 'Verbos irregulares.', 'enlace' => 'verbos/index.php', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/projects/verbs/index.php'),
    array('id' => 2, 'titulo' => 'Ejercicio 2', 'descripcion' => 'FCT Management.', 'enlace' => 'fct_management/public/index.php/home', 'github' => 'https://github.com/viorbe20/DWES-2022-2023/tree/main/projects/fct_managemente/public/index.php'),
    )
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../css/style_units.css' />
    <title>Índice Proyectos</title>
</head>

<body>
    <h1>Ejercicios Desarrollo Web Entorno Servidor (2022/2023)</h1>
    <h3>Proyectos</h3>
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