<?php
$ejercicios = array(
    array('id' => 1, 'titulo' => 'Ud2', 'descripcion' => 'Sintaxis básica', 'enlace' => 'ud2/index.php'),
    array('id' => 2, 'titulo' => 'Ud3', 'descripcion' => 'Estructuras de control', 'enlace' => 'ud3/index.php'),
    array('id' => 3, 'titulo' => 'Ud4', 'descripcion' => 'Cookies, sesiones, ficheros', 'enlace' => 'ud4/index.php'),
    array('id' => 4, 'titulo' => 'Ud5', 'descripcion' => 'POO', 'enlace' => 'ud5/index.php'),
    array('id' => 5, 'titulo' => 'Ud4', 'descripcion' => 'Sesiones', 'enlace' => 'ud6/index.php'),
    array('id' => 6, 'titulo' => 'Ud6', 'descripcion' => 'BBDD', 'enlace' => 'ud7/index.php'),
    array('id' => 7, 'titulo' => 'Ud7', 'descripcion' => 'Proyectos', 'enlace' => 'projects/index.php'),
)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <title>DWES Ejercicios Index</title>
</head>

<body>
    <h1>Ejercicios Desarrollo Web Entorno Servidor (2022/2023)</h1>
    <h3>Virginia Ordoño Bernier</h3>
    <main>
        <?php
        foreach ($ejercicios as $key => $value) {
        echo '<a target="_blank" href=' . $value['enlace'] . '>
        <article id=art' . $value['id'] . '>
        <p>' . $value['titulo'] . ': ' . $value['descripcion'] . '</p>
        </article>
        </a>';
        }
        ?>
    </main>
    <?php
    require("require/view_footer.php");
    ?>
</body>

</html>