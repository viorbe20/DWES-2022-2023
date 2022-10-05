<?php

/**
 * Ejercicio 4. 
 * Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres. 
 * Almacenar información incluyendo image y mostrar los menús disponibles. 
 * Mostrar el precio del menú suponiendo que éste se calcula 
 * sumando el precio de cada uno de los platos incluidos y con un descuento del 20 %.
 * @author: Virginia Ordoño Bernier
 * @date: September 2022 
 */
require("../../../require/view_home.php");

$menu = array(
    array(    
        array(
        "name" => "Ensalada",
        "price" => 5,
        "image" => "ensalada.jpg"
        ),
        array(
        "name" => "Sopa",
        "price" => 4,
        "image" => "sopa.jpg"
        ),
        array(
        "name" => "Crema",
        "price" => 3,
        "image" => "crema.jpg"
        )
        ),
    array(
        array(
        "name" => "Lentejas",
        "price" => 6,
        "image" => "lentejas.jpg"
        ),
        array(
        "name" => "Arroz",
        "price" => 7,
        "image" => "arroz.jpg"
        ),
        array(
        "name" => "Pasta",
        "price" => 8,
        "image" => "pasta.jpg"
        ),
        array(
        "name" => "Pollo",
        "price" => 9,
        "image" => "pollo.jpg"
        ),
        array(
        "name" => "Carne",
        "price" => 10,
        "image" => "carne.jpg"
        )
        ),
    array(
        array(
        "name" => "Flan",
        "price" => 4,
        "image" => "flan.jpg"
        ),
        array(
        "name" => "Tarta",
        "price" => 5,
        "image" => "tarta.jpg"
        ),
        array(
        "name" => "Helado",
        "price" => 6,
        "image" => "helado.jpg"
        ),
        array(
        "name" => "Natillas",
        "price" => 3,
        "image" => "natillas.jpg"
        ),
        array(
        "name" => "Yogur",
        "price" => 2,
        "image" => "yogur.jpg"
        )
    )
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
    <main>
    <div class='enunciado'>
                <h3>Ejercicio 4</h3>
                <p>Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres.</p>
                <ol>
                    <li>Almacenar información incluyendo image y mostrar los menús disponibles.</li>
                    <li>Mostrar el price del menú.</li>
                    <li>El price se calcula sumando el price de cada uno de los platos incluidos y con un descuento del 20 %.</li>
                </ol>
                <hr>
    </div>

    </main>
</body>

</html>