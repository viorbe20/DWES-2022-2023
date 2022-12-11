<?php
/**
 * Escriba una página que permita crear una cookie de duración limitada,
 * comprobar el estado de la
 * cookie y destruirla.
 * 
 * @author Virginia Ordoño Bernier
 * @since December 2022
 */


setcookie ("mycookie", "Virginia", time()+3600); // 1 hora
echo "La cookie existe y su valor es: " . $_COOKIE['mycookie'];

setcookie("mycookie", "", time()-3600); 
echo "<br>La cookie solicitada no existe";
?>