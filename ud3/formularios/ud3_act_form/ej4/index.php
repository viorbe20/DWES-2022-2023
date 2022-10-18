<?php
//Crear un script para sumar una serie de números. 
//El número de números a sumar será introducido en un formulario.
//http://192.168.10.10/ud3/ud3_act_form/ej4/index.php

//Iniciamos sesión
session_start();

//Si la variable SESSION no se ha generado, le asignamos un array vacío
if (!isset($_SESSION['numbersAdd'])) {
    $_SESSION['numbersAdd'] = array();
}

//Si se ha pulsado el botón enviar, asignamos a la variable los valores de los números
//Es un array asociativo con nombre y valor
if (isset($_POST['add'])) {
    $_SESSION['numbersAdd'][]=array('number'=>$_POST['number']);

}

?>


<!--VISTA-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suma números</title>
    <a href="closeSession.php">Cerrar sesión</a>
</head>
<body>
    <h1>
        Suma de números
    </h1>

    <form action="" method="post">
    <p>Introduce un número</p>
    <input type="number" name="number" placeholder="Número"/>

    <input type="submit" name="add" value="Agregar"><br /><br />

    <input type="submit" name="submit" value="Sumar"><br /><br />
    </form>

    

  
<h2>Números a sumar</h2>
<?php
//Recorremos el array SESSION[tasksList] donde se han ido guardando las tareas
//var_dump ($_SESSION['numbersAdd']);
foreach ($_SESSION['numbersAdd'] as $key => $value) {
    echo $value['number'].'<br>';
  
}

//Si se ha pulsado el botón sumar, se muestra el resultado de la suma
if (isset($_POST['submit'])) {
    $sum = 0;
    foreach ($_SESSION['numbersAdd'] as $key => $value) {
        $num = $value['number'];
        for ($i = 0; $i < strlen($num); $i++){
        $sum += $num[$i];
        }
    }
echo "<h2>Resultado: " . $sum . '</h2>';
}
?>
    
</body>
</html>