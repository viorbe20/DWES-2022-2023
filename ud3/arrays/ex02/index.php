<?php
/**
 * Ejercicio 3. Define un array que permita almacenar y mostrar la siguiente información.
 * a. Meses del año.
 * b. Tablero para jugar al juego de los barcos.
 * c. Nota de los alumnos de 2º DAW para el módulo DWES. 
 * d. Verbos irregulares en inglés.
 * e. Información sobre continentes, países, capitales y banderas.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022 
 */

require ("../../../require/view_home.php");


$studentsDaw = array(
    array("name" => "Estudiante 1", 
        "image" => "../assets/avatar_woman.png"),
    array("name" => "Estudiante 2", 
        "image" => "../assets/avatar_man.png"),
    array("name" => "Estudiante 3", 
        "image" => "../assets/avatar_woman.png"),
    array("name" => "Estudiante 4", 
        "image" => "../assets/avatar_man.png"),
    array("name" => "Estudiante 5", 
        "image" => "../assets/avatar_woman.png"),
    array("name" => "Estudiante 6", 
        "image" => "../assets/avatar_man.png"),
    array("name" => "Estudiante 7", 
        "image" => "../assets/avatar_woman.png"),
    array("name" => "Estudiante 8", 
        "image" => "../assets/avatar_man.png"),
    array("name" => "Estudiante 9", 
        "image" => "../assets/avatar_woman.png"),
    array("name" => "Estudiante 10", 
        "image" => "../assets/avatar_man.png")
);

?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta name='author' content='Virginia Ordoño Bernier'>
<title></title>
</head>
<body>
<style>
    #selectedStudent {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .center {
        text-align: center;
    }
</style>
<main>
<div class='enunciado'>
<h3>Ejercicio 2</h3>
<p>Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos.<br> 
El resultado debe mostrar nombre y fotografía.</p><hr>
</div>
<?php
//Calculamos el tamaño del array para saber hasta qué índice podemos mostrar
    $arrayLength = count($studentsDaw);
    $randomNumber = rand(0, $arrayLength-1);
    echo "<div id='selectedStudent'>";
    foreach ($studentsDaw[$randomNumber] as $key => $value) {
        if ($key == "name") {
            echo("<h1 class='center'>$value</h1><br>");
        } else {
            echo("<img src=\"$value\" width='20%'>");
        }
    } 
    echo "</div>"; 
    ?>
</main>
</body>
</html>