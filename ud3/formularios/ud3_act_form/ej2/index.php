<?php

/** 
 *Unidad 3. Actividades Formularios.
 *Ejercicio 2. 
 *Formulario para crear un currículum que incluya: 
 *Campos de texto, grupo de botones de opción, casilla de verificación, lista de selección única, 
 *lista de selección múltiple, botón de validación, botón de imagen, botón de reset, etc.
 *@author: Virginia Ordoño Bernier
 *@date: octubre 2021
 *http://192.168.10.10/ud3/ud3_act_form/ej2/index.php
 */

//Variables para inputs de texto
$name = $surname1 = $surname2 = $email = $website = $workExperience = $education = "";

//Variables para mensaje de error en inputs de texto
$nameErr = $surnameErr = $emailErr = $websiteErr = "";

//Botón verificación. Checkbox
$a_languages = array('Español', 'Inglés', 'Francés', 'Italiano', 'Otros');
$a_selectedLanguages = [];

//Lista de selección múltiple
$a_employmentSituation = array('Trabajador', 'Desempleado', 'Estudiante', 'Autónomo');
$a_selectedEmploymentSituation = [];

//Botones de opción: lista única
$a_city = array(
    array(
        "value" => 1,
        "literal" => "Jaén"
    ),
    array(
        "value" => 2,
        "literal" => "Córdoba"
    ),
    array(
        "value" => 3,
        "literal" => "Sevilla"
    ),
    array(
        "value" => 4,
        "literal" => "Huelva"
    ),
    array(
        "value" => 5,
        "literal" => "Cádiz"
    ),
    array(
        "value" => 6,
        "literal" => "Málaga"
    ),
    array(
        "value" => 7,
        "literal" => "Granada"
    ),
    array(
        "value" => 8,
        "literal" => "Almería"
    )
);
$a_selectedCity = [];


//VALIDACIÓN DE DATOS

//Flag que pasará a true cuando los datos se puedan procesar.
$f_processForm = false;
//Flag que pasará a true mientras los datos no sean correctos.
$f_error = false;

/**
 * Función que limpia los datos introducidos
 */
function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Se comprueban todos los datos introducidos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_processForm = true;
    
    //Validación nombre
    if (empty($_POST['name'])) {
        $nameErr = "El nombre es obligatorio";
        $f_error = true;
    } else {
        $name = clearData($_POST['name']);
    }

    //Validación apellidos
    if (empty($_POST['surname1'])) {
        $surnameErr = "El apellido es obligatorio";
        $f_error = true;
    } else {
        $surname1 = clearData($_POST['surname1']);
    }

    //Validación apellido 2 (no obligatorio)
    if ($_POST['surname2']) {
        $surname2 = clearData($_POST['surname2']);
    }

    //Validación email
    if (empty($_POST['email'])) {
        $emailErr = "El email es obligatorio.";
        $f_error = true;
    } else {
        $email = clearData($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email incorrecto";
            $f_error = true;
        };
    }

    //Validación url
    $website = clearData($_POST['website']);
    if (!filter_var($website, FILTER_VALIDATE_URL)) {
        $websiteErr = "Formato incorrecto";
        $f_error = true;
    };

    //Validación experiencia laboral y educación
    $education = clearData($_POST['education']);
    $workExperience = clearData($_POST['workexperience']);

    //Validación idiomas
    if (isset($_POST['languages'])) {
        $a_selectedLanguages = $_POST['languages'];
    }

    //Validación estado laboral
    if (isset($_POST['employmentSituation'])) {
        $a_selectedEmploymentSituation = $_POST['employmentSituation'];
    }

    //Validación provincias
    if (isset($_POST['city'])) {
        $a_selectedCity = $_POST['city'];
    }

};
if ($f_error) {
    $f_processForm = false;
};

?>

<!--HTML inicial y con datos procesados-->
<!DOCTYPE HTML>
<html lang="es">
<link rel='stylesheet' href='css/cv.css'>

<head>

</head>


<body>

<?php
if (!$f_processForm) { ?>
    
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Completa tu CV</h1>
    <div id="container">
    <div id='box1'>
    <p><span class="error">* Campos requeridos...</span></p> 
    
    Nombre <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">*<?php echo $nameErr; ?></span><br /><br />

    Primer apellido <input type="text" name="surname1" value="<?php echo $surname1; ?>">
    <span class="error">*<?php echo $surnameErr; ?></span><br /><br />

    Segundo apellido <input type="text" name="surname2" value="<?php echo $surname2; ?>">
    <br/><br/>

    Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span><br /><br />
    
    Website: <input type="text" name="website" value="<?php echo $website; ?>">
    <span class="error"><?php echo $websiteErr; ?></span><br /><br />

    
    <input type="hidden" name="MAX_FILE_SIZE" value="100" />Seleccionar imagen
    <br><br>
    <input name="file" type="file" />
    </div>  

    <div id="box2">
    Experiencia Profesional:<br />
        <textarea name="comment" rows="5" cols="40"><?php echo $workExperience; ?></textarea><br /><br />

    Educación:<br />
    <textarea name="comment" rows="5" cols="40"><?php echo $education; ?></textarea><br /><br />

    
    </div>
    </div>
    <hr>
    Idiomas <br/><br/>
        <?php
        foreach ($a_languages as $value) {
            $selected = (in_array($value, $a_selectedLanguages)) ? 'checked' : '';
            echo "<input type =\"checkbox\" name=\"languages[]\" value = \"" . $value . "\" $selected >" . $value;
        }
        ?>
        <br/><br/>
        <hr>

    Estado laboral (múltiple):<br/><br/>
    <select multiple name="employmentSituation[]">
        <?php
        foreach ($a_employmentSituation as $value) {
            $selected = (in_array($value, $a_selectedEmploymentSituation)) ? 'selected' : '';
            echo "<option value = \"" . $value . "\" $selected >" . $value . "</option>";
        }
        ?>
    </select><br/><br/>
    <hr>

    Selecciona tu provincia:
        <select name="city">
            <?php
            foreach ($a_city as $value) {
                $selected = ($a_selectedCity == $value['value']) ? 'selected' : '';
                echo "<option value = \"" . $value['value'] . "\" $selected >" . $value['literal'] . "</option>";
            }
            ?>
        </select><br/><br/>
  <hr>
  <input type="reset" name="reset" value="Borrar">      
  <input type="submit" name="submit" value="Enviar"><br/><br/>
        
    </form>
<?php
} // Procesa Formulario
else {
    echo "<h1>Your Input:</h1>";
    echo $name;
    echo "<br/>";
    echo $surname1;
    echo "<br/>";
    echo $surname2;
    echo "<br/>";
    echo $email;
    echo "<br/>";
    echo $website;
    echo "<br/>";
   
    //Salida de botón verificación - checkbox   
    foreach ($a_selectedLanguages as $element) {
        echo $element . "<br/>";
    }

    //Salida de la lista de selección múltiple.
    foreach ($a_selectedEmploymentSituation as $element) {
        echo $element . "<br/>";
    }

    //Salida de la provincia
    foreach ($a_city[$a_selectedCity-1] as $key => $value) {
        if ($key == "literal") {
            echo($value . "<br>");
        }
    }
    echo "<br/>";

}
?>
</body>
</html>


