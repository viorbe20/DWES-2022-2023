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
$procesaFormulario = false;
$languages = ["Español", "Inglés", "Francés", "Alemán", "Italiano", "Portugués", "Chino", "Japonés", "Ruso", "Árabe"];
$levels = ["Básico", "Intermedio", "Avanzado"];
$required = "<span style='color:red'>*</span>";
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
    ::after,
    ::before {
        box-sizing: border-box;
    }

    body {
        font-family: sans-serif;
        margin-left: 10%;
        margin-right: 10%;
    }

    h1 {
        text-align: center;
    }

    #btn_reset{
        background-color: #f44336;
        color: white;
        padding: 14px 20px;
        margin-left: 1%;
        margin-bottom: 1%;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #btn_submit{
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin-left: 45%;
        margin-bottom: 1%;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<body>
    <main>
        <?php
        if (!$procesaFormulario) {
            echo '<h1>Plantilla CV</h1>';
            echo '<form action="index.php" method="post">';
            // Datos personales
            echo '<fieldset>';
            echo '<legend>Datos personales</legend>';
            echo '<label for="nombre">Nombre </label>';
            echo '<input type="text" name="nombre" id="nombre" required> ' . $required;
            echo '<br><br><label for="apellidos">Apellidos </label>';
            echo '<input type="text" name="apellidos" id="apellidos" size="100" required> ' . $required;
            echo '<br><br><label for="fechaNacimiento">Fecha de nacimiento </label>';
            echo '<input type="date" name="fechaNacimiento" id="fechaNacimiento" required> ' . $required;
            echo '<br><br><label for="telefono">Teléfono </label>';
            echo '<input type="number" name="telefono" id="telefono" maxlength="9" required> ' . $required;
            echo '<br><br><label for="email">Email </label>';
            echo '<input type="email" name="email" id="email" size="70" required> ' . $required;
            // Checkbox genero
            echo '<br><br><label for="genero">Género </label>';
            echo '<input type="radio" name="genre" id="genre" value="man" required>Hombre';
            echo '<input type="radio" name="genre" id="genre" value="woman" required>Mujer';
            echo '<input type="radio" name="genre" id="genre" value="other" required>Prefiero no decirlo';
            echo '</fieldset>';

            //Idiomas lista desplegable
            echo '<br><br><fieldset>
        <legend>Idiomas</legend>
        <div class="languages">
        <select name="languages" id="languages">';

            foreach ($languages as $key) {
                echo '<option value="' . $key . '">' . $key . '</option>';
            }

            echo '</select>
        <select name="levels" id="levels">';

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
            # code...
        }

        ?>
    </main>
</body>

</html>