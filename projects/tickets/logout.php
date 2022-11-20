<?php

session_start();
//Vaciamos todas las posibles variables que puedan tener valor
unset($_SESSION['user']);
unset($_SESSION['cart']);
//Cierre de sesión
session_destroy();
//Dirigimos a la página principal
header('location: index.php');