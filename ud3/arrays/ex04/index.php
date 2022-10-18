<?php
/**
 * Unidad 3. Act 3.
 * Ejercicio 4. Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres. 
 * Almacenar información incluyendo foto y mostrar los menús disponibles.
 *  Mostrar el precio del menú suponiendo que éste se calcula 
 * sumando el precio de cada uno de los platos incluidos y con un descuento del 20 %. 
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 * http://192.168.10.10/ud3/ud3_act3/ej4/index.php
 */

$menu = array(

    $starters = array(
        array(
            "name" => "Ensalada César",
            "price" => 4,
            "img" => "caesarSalad.jpg"
        ),
        array(
            "name" => "Nachos con Hummus",
            "price" => 5,
            "img" => "hummusNachos.jpg"
        ),
        array(
            "name" => "Poke de Salmón",
            "price" => 6,
            "img" => "salmonPoke.jpg"
        )
    ),
    $mainDishes = array(
        array(
            "name" => "Costillas a la Barbacos",
            "price" => 8.50,
            "img" => "bbqRibs.jpg"
        ),
        array(
            "name" => "Pollo Villaroy",
            "price" => 6.75,
            "img" => "villaroyChicken.jpg"
        ),
        array(
            "name" => "Entrecot",
            "price" => 9,
            "img" => "entrecote.jpg"
        )
    ),
    $desserts = array(
        array(
            "name" => "Brownie",
            "price" => 3,
            "img" => "brownie.jpg"
        ),
        array(
            "name" => "Tarta de Chocolate",
            "price" => 4.75,
            "img" => "chocolateCake.jpg"
        ),
        array(
            "name" => "Croissant de Frutas",
            "price" => 2,25,
            "img" => "fruitCroissant.jpg"
        )
    )
);

/**
 * Función que recibe un array con platos y muestra las posibles combinaciones
 * 
 * @param array
 */
function showMenus($array)
{   echo("<h1>Menús del Día</h1>");
    
    foreach ($array[0] as $comida1) {
        foreach ($array[1] as $comida2) {
            foreach ($array[2] as $comida3) {
                $totalBill = ($comida1["price"] + $comida2["price"] +$comida3["price"]);
                $discountBill = ($totalBill - ($totalBill*0.20));
                echo("<img src= ./img/>". $comida1["img"] . $comida1["name"]."<br>");
                echo("<img src= ./img/>". $comida2["img"] . $comida2["name"]."<br>");
                echo("<img src= ./img/>". $comida3["img"] . $comida3["name"]." Precio: ".$discountBill." €"."<br><br>");
            }
        }
    }
}

//Muestra por pantalla
showMenus($menu);
?>