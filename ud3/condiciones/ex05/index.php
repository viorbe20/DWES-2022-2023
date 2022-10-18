<?php
/**
 * Unidad 3. Act 1.
 * Ejercicio 5. Script que muestre una lista de enlaces en función del perfil de usuario:
 * - Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4
 * - Perfil Usuario: Pagina1, Pagina2
 * @author: Virginia Ordoño Bernier
 * @date: October 2022
 */

require ("../../../require/view_home.php");
echo "</br>";

//Tipos de perfiles
$adminProfile = "admin";
$userProfile = "user";

/**
 * Función que comprueba el perfil y te muestra los enlaces correctos
 * @param {string} EL perfil del usuario
 */
function checkProfile($profile){

    if ($profile == "admin") { 
        echo("<p>Perfil Administrador</p>");
        for ($i=1; $i <= 4; $i++) { 
            print("<li type=\"disc\"><a href=\" ". $i ."/index.php\">Pregunta ". $i ."</a></li><br>");
        }
    } else if ($profile == "user"){
        echo("<p>Perfil Usuario</p>");
        for ($i=1; $i <= 2; $i++) { 
            print("<li type=\"disc\"><a href=\" ". $i ."/index.php\">Pregunta ". $i ."</a></li><br>");
        }
    } else {
        print("El perfil introducido no es correcto.");
}
}

//Comprobamos
checkProfile($userProfile);
?>