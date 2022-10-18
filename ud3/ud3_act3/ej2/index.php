<?php
/**
 * Unidad 3. Act 3.
 * Ejercicio 2. Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos. 
 * El resultado debe mostrar nombre y fotografía.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 * http://192.168.10.10/ud3/ud3_act3/ej2/index.php
 */

echo <<<EOD
<style type="text/css">
h1 { 
    text-align: center; 
}
img{
    display: block;
    margin-left: auto;
    margin-right: auto;
}    
</style>
EOD;

//Array indexado que contiene uno asociativo
$studentsDAW = array(
    array (
        "name" => "Jesus Díaz Rivas",
        "image" => "./img/JesusDiazRivas.jpg"
    ),
    array (
        "name" => "Manuel Brito Guerrero",
        "image" => "./img/ManuelBrito.jpg"
    ),
    array (
        "name" => "Joaquín Baena Salas",
        "image" => "./img/JoaquinBaenaSalas.jpg"
    ),
    array (
        "name" => "Laura Hidalgo Rivera",
        "image" => "./img/LauraHidalgoRivera.jpg"
    ),
    array (
        "name" => "Tomas Hidalgo Martín",
        "image" => "./img/TomasHidalgoMartin.jpg"
    ),
    array (
        "name" => "Carlos Hidalgo Risco",
        "image" => "./img/CarlosHidalgoRisco.png"
    ),
    array (
        "name" => "Daniel Ayala Cantador",
        "image" => "./img/DanielAyalaCantador.png"
    ),
    array (
        "name" => "Javier Cebrián Muñoz",
        "image" => "./img/javierCebrianMuñoz.jpeg"
    ),
    array (
        "name" => "Javier Fernández Rubio",
        "image" => "./img/javierfernandezrubio.jpeg"
    ),
    array (
        "name" => "Rubén Ramírez Rivera",
        "image" => "./img/RubenRamirezRivera.jpeg"
    ),
    array (
        "name" => "David Pérez Ruiz",
        "image" => "./img/DavidPerezRuiz.png"
    ),
    array (
        "name" => "Alejandro Rabadán Rivas",
        "image" => "./img/AlejandroRabadanRivas.jpg"
    ),
    array (
        "name" => "David Rosas Alcatraz",
        "image" =>  "./img/DavidRosasAlcatraz.jpg"
    ),
    array (
        "name" => "Guillermo Tamajon Hernandez",
        "image" => "./img/GuillermoTamajonHernandez.jpg"
    ),
    array (
        "name" => "Sergio Vera Jurado",
        "image" => "./img/sergiovera.png"
    ),
    array (
        "name" => "Javier Salazar Almagro",
        "image" => "./img/JavierSalazarAlmagro.jpg"
    ),
    array (
        "name" => "Manuel Solar Bueno",
        "image" => "./img/ManuelSolarBueno.jpg"
    ),
    array (
        "name" => "Andrea Solís Tejada",
        "image" => "./img/AndreaSolisTejada.jpeg"
    ),
    array (
        "name" => "Juan Manuel González Prófumo", 
        "image" => "./img/JuanManuelGonzalezProfumo.jpg"
    ),
    array (
        "name" => "Rafael Yuste Barrera", 
        "image" => "./img/RafaelYuste.png",
    ),
    array (
        "name" => "Javier Epifanio López", 
        "image" => "./img/JavierEpifanioLopez.jpeg"
    ),
    array (
        "name" =>  "Carlos Chaves Hernández",
        "image" => "./img/CarlosChaves.jpg"
    ),
    array (
        "name" => "Virginia Ordoño Bernier",  
        "image" => "./img/VirginiaOrdoño.jpg"    
    )
);

/**
 * Función que genera un número aleatorio y muestra la información de uno de los alumnos
 * @param {$array} Array que contiene a los alumnos
 */
function choseStudent($array){

    //Calculamos el tamaño del array para saber hasta qué índice podemos mostrar
    $arrayLength = count($array);
    $randomNumber = rand(0, $arrayLength-1);
    
    foreach ($array[$randomNumber] as $key => $value) {
        if ($key == "name") {
            echo("<h1 class='center'>$value</h1><br>");
        } else {
            echo("<img src=\"$value\">");
        }
    }  
};

//Salida por pantalla
choseStudent($studentsDAW);