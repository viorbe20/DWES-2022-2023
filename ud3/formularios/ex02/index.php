<?php

/**
 * Ejercicio 2. Formulario para crear un currículum que incluya: 
 * Campos de texto
 * Grupo de botones de opción
 * Casilla de verificación
 * Lista de selección única
 * Lista de selección múltiple
 * Botón de validación
 * Botón de imagen
 * Botón de reset
 * @author: Virginia Ordoño Bernier
 * @date: September 2022 
 */

require("../../../require/view_home.php");

$formProcess = false;
$error = false;

//Variables para el formulario
$name = $lastname = $borndate = $phoneNumber = $email = $gender;
$nameErr = $lastnameErr = $borndateErr = $phoneNumberErr = $emailErr = $genderErr;
$required = "<span style='color:red'>*</span>";

//Arrays datos para el formulario
$languages = ["Español", "Inglés", "Francés", "Alemán", "Italiano", "Portugués", "Chino", "Japonés", "Ruso", "Árabe"];
$levels = ["Básico", "Intermedio", "Avanzado"];
$gender = array(
    "woman"=> "Mujer", "man"=>"Hombre", "other"=>"Prefiero no decirlo"
);
$selectedLanguages = [];
$selectedLevels = [];
$selectedHobbies = [];

function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formProcess = true;

    //Empty input validation
    if (empty($_POST["name"])) {
        $nameErr = "El nombre es obligatorio";
        $error = true;
    } else {
        $name = clearData($_POST["name"]);
    }

    if (empty($_POST['lastname'])) {
        $lastnameErr = "El apellido es obligatorio";
        $error = true;
    } else {
        $lastname = clearData($_POST['lastname']);
    }

    if (empty($_POST['borndate'])) {
        $borndateErr = "La fecha de nacimiento es obligatoria";
        $error = true;
    } else {
        $borndate = clearData($_POST['borndate']);
    }

    if (empty($_POST['phoneNumber'])){
        $phoneNumberErr = "El teléfono es obligatorio";
        $error = true;
    } else {
        $phoneNumber = clearData($_POST['phoneNumber']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "El email es obligatorio";
        $error = true;
    } else {
        $email = clearData($_POST['email']);
    }

    if (empty($_POST['gender'])){
        $genderErr = "El género es obligatorio";
        $error = true;
    } else {
        $gender = clearData($_POST['gender']);
    }

}
?>


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Formulario CV</title>
</head>
<style>
<?php require("css/style.css")
?></style>

<body>
    <main>
        <div class='enunciado'>
            <h3>Ejercicio 3</h3>
            <p>Formulario para crear un currículum que incluya diferentes campos.</p>
            <hr>
        </div>
        <?php
        if (!$formProcess) {
        ?>
            <h1>Plantilla CV</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php

            // Datos personales
            echo '<fieldset>';
            echo '<legend>Datos personales</legend>';
            echo '<label for="name">Nombre </label>';
            echo '<input type="text" name="name" value="Virginia" required> ' . $required;
            echo '<br><br><label for="lastname">Apellidos </label>';
            echo '<input type="text" name="lastname" size="100" value="Ordoño Bernier" required> ' . $required;
            echo '<br><br><label for="bornDate">Fecha de nacimiento </label>';
            echo '<input type="date" name="bornDate" value="1979-12-01" required> ' . $required;
            echo '<br><br><label for="phoneNumber">Teléfono </label>';
            echo '<input type="number" name="phoneNumber" value="123456789" maxlength="9" required> ' . $required;
            echo '<br><br><label for="email">Email </label>';
            echo '<input type="email" name="email" value="a20orbevi@ies.grancapitan.es" size="70" required> ' . $required;
            // Checkbox genero
            echo '<br><br><label for="genero">Género </label>';
            //"woman"=> "Mujer", "man"=>"Hombre", "other"=>"Prefiero no decirlo"
            
            foreach ($gender as $key => $value) {
                echo "<input type='radio' name='genre' value=". $key ." required>". $value ."";
            }
            echo '</fieldset>';

            //Idiomas lista desplegable
            echo '<br><br><fieldset>
            <legend>Idiomas</legend>
            <div class="languages">
            <select name="languages" id="languages">
            <option selected value=""</option>';
            foreach ($languages as $key) {
                echo '<option value="' . $key . '">' . $key . '</option>';
            }

            echo '</select>
            <select name="levels" id="levels">
            <option selected value=""</option>';

            foreach ($levels as $key) {
                echo '<option value="' . $key . '">' . $key . '</option>';
            }

            echo '</select>
            <button name="add_language">Añadir</button>
            </div></fieldset>';

            //Multiple choice
            echo '<br><br><fieldset>';
            echo '<legend>Intereses</legend>';
            echo '<select name="interests[]" id="interests" multiple>';
            echo '<option value="reading">Leer</option>';
            echo '<option value="movies">Cine</option>';
            echo '<option value="music">Música</option>';
            echo '<option value="sports">Deportes</option>';
            echo '<option value="travelling">Viajar</option>';
            echo '<option value="cooking">Cocinar</option>';
            echo '<option value="others">Otros</option>';
            echo '</select>';
            echo '</fieldset>';

            //Add a picture
            echo '<br><br><fieldset>';
            echo '<legend>Foto</legend>';
            echo '<input type="file" name="photo" id="photo">';
            echo '</fieldset>';

            //Textarea
            echo '<br><br><fieldset>';
            echo '<legend>Sobre mí</legend>';
            echo '<textarea name="about_me" id="about_me" cols="100" rows="10"></textarea>';
            echo '</fieldset>';

            //Text and conditions checkbox
            echo '<br><br><fieldset>';
            echo '<legend>Condiciones</legend>';
            echo '<input type="checkbox" name="conditions" id="conditions" required>';
            echo '<label for="conditions">Acepto las condiciones</label>';
            echo '</fieldset>';

            echo '<br><br><input type="submit" value="Enviar" id="btn_submit">';
            echo '<input type="reset" value="Borrar" id="btn_reset">';
            echo '</form>';
        } else {
            echo '<h1>CV</h1>';
        }

            ?>
    </main>
</body>

</html>