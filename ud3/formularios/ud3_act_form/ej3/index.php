<?php

/** 
 *Unidad 3. Actividades Formularios.
 *Ejercicio 3. 
 *Crear una aplicación que almacene información de países: nombre capital y bandera. 
 *Diseñar un formulario que permita seleccionar un país y nos muestre el nombre de la capital 
 *y la bandera.
 *@author: Virginia Ordoño Bernier
 *@date: octubre 2021
 *http://192.168.10.10/ud3/ud3_act_form/ej3/index.php
 */

//Importamos array con países
require __DIR__ . "/php/options.php";

$opcionSeleccionada = [];



//Variables para el procesamiento de datos
$f_processForm = false;
$f_error = false;

//Se comprueban todos los datos introducidos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_processForm = true;

    if (isset($_POST['combo'])) {
        $opcionSeleccionada = $_POST['combo'];
    }
};
if ($f_error) {
    $f_processForm = false;
}
?>

<!DOCTYPE HTML>
<html lang='es'>
<head>
<style>
</style>
</head>
<body>
<?php
if (!$f_processForm) { 
    ?>
<h1>Formulario de Países</h1>
<form method='post' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'>

Selecciona un país:
        <select name="combo">
            <?php
            foreach (getCountries() as $value) {
                $selected = ($opcionSeleccionada == $value['value']) ? 'selected' : '';
                echo "<option value = \"" . $value['value'] . "\" $selected >" . $value['country'] . "</option>";
            }
            ?>

</select><br /><br />
        <input type="submit" name="submit" value="Submit"><br /><br />


</form>
<?php
} // Procesa Formulario
else {
echo '<h1>Your Input:</h1>';

foreach (getCountries() as $key => $value) {
    
    if (($key+1) == $opcionSeleccionada) {
        echo("País: ".$value['country']."<br><br>");
        echo("Capital: ".$value['capital']."<br><br>" );
        echo("Bandera: "."<br>".$value['flag']."<br>" );
            
        
    }
}

//echo $opcionSeleccionada;
echo "<br/>";


    

}
?>
</body>
</html>