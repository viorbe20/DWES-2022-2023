<?php
require("../require/view_unit_header.php");
require("../require/view_home.php");

$ejercicios = array(
    array('id' => 1, 'titulo' => 'Arrays', 'enlace' => './arrays/index.php'),
    array('id' => 2, 'titulo' => 'Formularios', 'enlace' => './formularios/index.php'),
    array('id' => 3, 'titulo' => 'Condiciones', 'enlace' => './condiciones/index.php')
);
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../css/style_units.css' />
    <title>Index Unidad 3</title>
</head>

<body>
    <main>
        <?php
        foreach ($ejercicios as $key => $value) {
            echo '<article id="art' . $value['id'] . '">
        <div class="titulo">
        <a target="_blank" href="' . $value['enlace'] . '">' . $value['titulo'] . '</a>
        </div>
        </article>';
        }
        ?>
    </main>
</body>

</html>