<?php
require("../require/view_unit_header.php");
require("../require/view_home.php");

$ejercicios = array(
    array('id' => 1, 'titulo' => 'Encuesta', 'descripcion' => 'Modifica el ejercicio 4 de Actividades 1 para almacenar las opciones de la encuesta en un array.', 'enlace' => 'ej1.php', 'github' => 'https://github.com/viorbe20/viorbe20/DWES_2021_2022/blob/main/ud3_bucles/ej1.php'),
    array('id' => 2, 'titulo' => 'Países y capitales', 'descripcion' => 'Diseña y almacena en un array una lista de países junto con sus capitales. Muestra un formulario que permita al usuario introducir las capitales de los países presentados. En respuesta al formulario, la aplicación mostrará el número de aciertos y fallos. Incluye una opción que permita visualizar las opciones correctas.', 'enlace' => 'ej2.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_bucles/ej2.php'),
    array('id' => 3, 'titulo' => 'Comunidades Autónomas', 'descripcion' => 'A partir de un array que almacena comunidades autónomas y provincias, escribe un programa que muestre aleatoriamente una comunidad autónoma y presente un formulario con un checkbox que permita seleccionar las provincias que pertenecen a la comunidad. En respuesta al formulario, la aplicación mostrará número de aciertos y fallos. Incluye una opción que permita visualizar las opciones correctas.', 'enlace' => 'ej3.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_bucles/ej3.php'),
    array('id' => 4, 'titulo' => 'Notas académicas', 'descripcion' => 'A partir de un array que almacene los datos de la primera y segunda evaluación de los alumnos de 2o DAW, mostrar un menú de navegación que muestre la siguiente información. • Listados de alumnos con las notas de la primera y segunda evaluación, junto con su nota media. Asignatura con mayor número de aprobados. Asignatura con mayor número de suspensos. Número de aprobados en cada asignatura. Generación de boletines de notas en función de la evaluación seleccionada en una lista desplegable.', 'enlace' => 'ej4.php', 'github' => 'https://github.com/viorbe20/DWES_2021_2022/blob/main/ud3_bucles/ej4.php'),
)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../css/style_units.css' />
    <title>Virginia Ordoño Bernier</title>
</head>

<body>
    <main>
    <h3>En construcción</h3>
        <!-- <?php
        // foreach ($ejercicios as $key => $value) {
        //     echo '<article id="art' . $value['id'] . '">
        // <div class="titulo">' . $value['titulo'] . '</div>
        // <div class="descripcion">' . $value['descripcion'] . '</div>
        // <div class="enlaces">
        // <a target="_blank" href="' . $value['enlace'] . '">Ejercicio</a>
        // <a target="_blank" href="' . $value['github'] . '">Código</a>
        // </div>
        // </article>';
        // }
        ?> -->
    </main>
</body>

</html>