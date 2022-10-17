<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Home page</title>
</head>

<body>
    <header>
        <h1>Práctica DWES</h1>
    </header>
    <nav>
        <ul>
            <li><a href="">Empresas</a></li>
        </ul>
    </nav>
    
    <form method="post" action="" id="form-company">

        <!--Datos personales-->
        <fieldset>
            <legend>Datos Empresa</legend>
            <label for="name">Nombre</label>
            <input type="text" name="c_name" value="">
            <span class="error">*
                <?php echo $nameErr; ?>

            <label for="lastname">Apellidos </label>
            <input type="text" name="lastname" size="100" value="<?php echo $lastname; ?>">
            <span class="error">*<?php echo $lastnameErr; ?></span><br /><br />

            <label for="borndate">Fecha de nacimiento </label>
            <input type="date" name="borndate" value="<?php echo $borndate; ?>">
            <span class="error">*<?php echo $borndateErr; ?></span><br /><br />

            <label for="phoneNumber">Teléfono </label>
            <input type="number" name="phoneNumber" maxlength="9" value="<?php echo $phoneNumber; ?>">
            <span class="error">*<?php echo $phoneNumberErr; ?></span><br /><br />

            <label for="email">Email </label>
            <input type="email" name="email" size="70" value="<?php echo $email; ?>">
            <span class="error">*<?php echo $emailErr; ?></span><br /><br />

            <label for="genre">Género </label>
            <?php foreach ($genreSelection as $value) {
                echo "<input type=\"radio\" name=\"genre\" value = \"$value\">$value";
            } ?>
            <span class="error">*<?php echo $genreErr; ?></span><br /><br />
        </fieldset>

        <!--Idiomas lista desplegable-->
        <br><br>
        <fieldset>
            <legend>Idiomas</legend>
            <div class="languages">
                <select name="languages" id="languages">
                    <option selected value=""></option>
                    <?php
                    foreach ($languages as $key) {
                        echo '<option value="' . $key . '">' . $key . '</option>';
                    } ?>

                </select>
                <select name="levels" id="levels">
                    <option selected value=""></option>';

                    <?php
                    foreach ($levels as $key) {
                        echo '<option value="' . $key . '">' . $key . '</option>';
                    } ?>

                </select>
                <button name="add_language">Añadir</button>
            </div>
        </fieldset>

        <!--Multiple choice-->
        <br><br>
        <fieldset>
            <legend>Intereses</legend>
            <select name="hobbies[]" id="hobbies" multiple>
                <option value="Leer">Leer</option>
                <option value="Cine">Cine</option>
                <option value="Música">Música</option>
                <option value="Deportes">Deportes</option>
                <option value="Viajar">Viajar</option>
                <option value="Cocinar">Cocinar</option>
            </select>
        </fieldset>

        <!--Add a picture-->
        <br><br>
        <fieldset>
            <legend>Foto</legend>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </fieldset>

        <!--Textarea-->
        <br><br>
        <fieldset>
            <legend>Sobre mí</legend>
            <textarea name="aboutme" id="aboutme" cols="100" rows="10"></textarea>
        </fieldset>

        <!--Text and conditions checkbox-->
        <br><br>
        <fields>
            <input type="checkbox" name="conditions" id="conditions" required>
            <label for="conditions">Acepto las condiciones</label>
        </fields>
        <br><br><input type="submit" value="Enviar" id="btn_submit">
        <input type="reset" value="Borrar" id="btn_reset">
    </form>

</body>

</html>