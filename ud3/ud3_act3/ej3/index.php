<?php
/**
 * Unidad 3. Act 3.
 * Ejercicio 3. Define un array que permita almacenar y mostrar la siguiente información.
 * a. Meses del año.
 * b. Tablero para jugar al juego de los barcos.
 * c. Nota de los alumnos de 2º DAW para el módulo DWES.
 * d. Verbos irregulares en inglés.
 * e. Información sobre continentes, países, capitales y banderas.
 * https://www.infolaso.com/paises-y-capitales-del-mundo-por-continentes.html
 * https://www.banderas-mundo.es/indice
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st*
 */

 //Estilo de la tabla
echo <<<EOD
<style type="text/css">
table{
    margin: px;
}
td {
    border: 1px solid black;
    text-align: center;
    padding: 2px 6px;
    }
th {
    border: 1px solid black;
    text-align: center;
    padding: 2px 6px;
    }
    
</style>
EOD;

//Array general
$mixedArray = array(
    "meses" => array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", 
    "agosto", "septiembre", "octubre", "noviembre", "diciembre"),
    "tablero" => array(
        "A" => array(0,0,0,0,0,0,0,0,0,1),
        "B" => array(0,0,1,1,1,1,0,0,0,1),
        "C" => array(0,0,0,0,0,0,0,1,0,0),
        "D" => array(0,1,0,0,0,1,0,0,0,0),
        "E" => array(0,0,0,0,0,0,0,0,0,0),
        "F" => array(0,1,1,1,0,0,0,0,0,0),
        "G" => array(0,0,0,0,1,0,0,0,1,0),
        "H" => array(0,0,0,0,1,0,0,0,1,0),
        "I" => array(0,0,0,0,0,0,0,0,0,0),
        "J" => array(0,1,1,1,0,0,0,1,0,0),    
    ),
    "notas" => array(
        "Jesus Díaz Rivas" => 9.9,
        "Manuel Brito Guerrero" => 7,
        "Joaquín Baena Salas" => 7,
        "Laura Hidalgo Rivera" => 8,
        "Tomas Hidalgo Martin " => 8,
        "Carlos Hidalgo Risco" => 7,
        "Daniel Ayala Cantador" => 8,
        "Javier Cebrián Muñoz" => 7,
        "Javier Fernández Rubio" => 8,
        "Rubén Ramírez Rivera" => 8,
        "David Pérez Ruiz" => 7,
        "Alejandro Rabadán Rivas" => 7,
        "David Rosas Alcatraz" => 7,
        "Guillermo Tamajon Hernandez" => 8,
        "Sergio Vera Jurado" => 7,
        "Javier Salazar Almagro" => 7,
        "Manuel Solar Bueno" => 8,
        "Andrea Solís Tejada" => 7,
        "Juan Manuel González Prófumo" => 8,
        "Rafael Yuste Barrera" => 7,
        "Javier Epifanio López" => 7,
        "Carlos Chaves Hernández" => 8,
        "Virginia Ordoño Bernier" => 8,    
    ),
    "verbosIrregulares" => array(
         "surgir"=> array(
            "infinitivo" => "arise",
            "pasado" => "arose",
            "participio"=> "arisen"),
        "ser"=> array(
            "infinitivo" => "be",
            "pasado" => "was/were",
            "participio"=> "been"),
        "golpear"=> array(
            "infinitivo" => "beat",
            "pasado" => "beat",
            "participio"=> "beaten"),
        "convertirse"=> array(
            "infinitivo" => "become",
            "pasado" => "became",
            "participio"=> "become"),
        "comenzar"=> array(
            "infinitivo" => "begin",
            "pasado" => "began",
            "participio"=> "begun"),		
    ),
    "geografía" => array(
        "Europa"=> array(
            "España" => array(
                "capital" => "Madrid",
                "bandera" => "<img src=\"img/flagSpain.png\" height=\"80\">",
            ),
            "Portugal" => array(
                "capital" => "Lisboa",
                "bandera" => "<img src=\"img/flagPortugal.png\" height=\"80\">",
            ),
        ),
        "Asia"=> array(
            "Corea del Sur" => array(
                "capital" => "Seúl",
                "bandera" => "<img src=\"img/flagSouthKorea.png\" height=\"80\">",
            ),
            "Turquía" => array(
                "capital" => "Ankara",
                "bandera" => "<img src=\"img/flagTurkey.png\" height=\"80\">",
            ),
        ),
        "América"=> array(
            "Perú" => array(
                "capital" => "Lima",
                "bandera" => "<img src=\"img/flagPeru.png\" height=\"80\">",
            ),
            "Venezuela" => array(
                "capital" => "Caracas",
                "bandera" => "<img src=\"img/flagVenezuela.png\" height=\"80\">",
            ),
        ),
        "África"=> array(
            "Egipto" => array(
                "capital" => "El Cairo",
                "bandera" => "<img src=\"img/flagEgypt.png\" height=\"80\">",
            ),
            "Tanzania" => array(
                "capital" => "Dodoma",
                "bandera" => "<img src=\"img/flagTanzania.png\" height=\"80\">",
            ),
        ),
        "Oceanía"=> array(
            "Australia" => array(
                "capital" => "Canberra",
                "bandera" => "<img src=\"img/flagAustralia.png\" height=\"80\">",
            ),
            "Samoa" => array(
                "capital" => "Apia",
                "bandera" => "<img src=\"img/flagSamoa.png\" height=\"80\">",
            ),
        ),
    ),
);

/**
 * Función que muestra los diferentes ejercicios según la opción escogida
 * @param {number}{array} 
 */
function choseOption($option, $array){
switch ($option) {
    case 'a':
        showOptionA($array);
        break;
    case 'b':
        showOptionB($array);
        break;
    case 'c':
        showOptionC($array);
        break;
    case 'd':
        showOptionD($array);
        break;
    case 'cd':
        showOptionE($array);
        break;
    default:
        print("Opción incorrecta.");
        break;
}
};

/**
 * Función que recibe un número y muestra la posición del array correspondiente
 * @param {number}
 */
function showOptionA($param){
    echo("<h1>Meses del año</h1>");
    foreach ($param as $key => $value) {
      if ($key == "meses") {
        foreach ($param[$key] as $key => $value) { 
          echo($value."<br>");
        }
      }  
    }  
  };

/**
 * Función que recibe un número y muestra la posición del array correspondiente
 * @param {number}
 */
function showOptionB($param){
    
    echo("<h1>Tablero Barcos</h1>");
    echo("<table style=\"border: 1px solid black;\">");
                
    //Primera fila
    echo("<tr>");
    for ($i=0; $i <= 10; $i++) { 
    echo("<th>$i</th>");
    }
    echo("</tr>");
    
    //Contenido
    foreach ($param as $key => $value) {
    
        if ($key == "tablero") {
         
           foreach ($param[$key] as $key => $value) {
            //key son las letras   
            echo("<tr>");
            echo("<th>$key</th>");
            
            //Recorre array de cade letra e imprime si hay barco 
                for ($i=0; $i < 10; $i++) { 
                    echo ("<td>");
                    echo ($value[$i]);
                    echo ("</td>");
                }
                echo("</tr>");
            }
        }  
    };


};

/**
 * Función que recibe un número y muestra la posición del array correspondiente
 * @param {number}
 */
function showOptionC($param) {

    echo("<h1>Notas DWES</h1>");
    echo("<table style=\"border: 1px solid black;\">");
                
    //Primera fila
    echo("<tr>");
    echo("<th colspan='8'>Alumno - Nota</th>");
    echo("</tr>");
    
    //Contenido
    foreach ($param as $key => $value) {
    
        if ($key == "notas") {
         
           foreach ($param[$key] as $key => $value) {
            //key son las letras   
            echo("<tr>");
            echo("<th>$key</th>");
            echo("<th>$value</th>");
            echo("</tr>");
            }
        }  
    };

};

/**
 * Función que recibe un número y muestra la posición del array correspondiente
 * @param {number}
 */
function showOptionD($param){
    
    echo("<h1>Irregular Verbs</h1>");
    echo("<table style=\"border: 1px solid black;\">");
                
    //Primera fila
    echo("<tr>");
    echo("<th>Spanish</th>");
    echo("<th>Infinitive</th>");
    echo("<th>Simple Past</th>");
    echo("<th>Past Participle</th>");
    echo("</tr>");
    
    //Contenido
    foreach ($param as $key => $value) {
    
        if ($key == "verbosIrregulares") {
         
            foreach ($value as $key => $value) {
                echo("<tr>");
                echo("<th>$key</th>");
                   foreach ($value as $key => $value) {
                    echo("<td>$value</td>");
                   }
                echo("</tr>");
            }
        }  
    };


};

/**
 * Función que recibe un número y muestra la posición del array correspondiente
 * @param {number}
 */
function showOptionE($param){
    
    echo("<h1>Países</h1>");
    echo("<table style=\"border: 1px solid black;\">");      
    echo("<ul>");
    
    //Contenido
    foreach ($param as $key => $value) {
    
        if ($key == "geografía") {
         
            foreach ($value as $key => $value) {
                echo("<li>$key</li><br>");
                   
                foreach ($value as $key => $value) {
                    echo("<ul>$key</ul><br>"); 
                    
                    foreach ($value as $key => $value) {
                        echo("<ul>$value</ul><br>");     
                    }
                }
            }
        }  
    };

    echo("</ul>");
  
};

//Salida por pantalla
$letter = "b";
choseOption($letter, $mixedArray);