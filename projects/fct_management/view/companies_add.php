<?php
require('../view/require/header_view.html');
//require('../view/require/profile_view.php');
require('../view/require/nav_view.html');
require('../view/require/footer_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

if (!isset($nameError)) {
    $nameError = '';
}

if (!isset($cifError)) {
    $cifError = '';
}

if (!isset($addressError)) {
    $addressError = '';
}

if (!isset($phoneError)) {
    $phoneError = '';
}

if (!isset($emailError)) {
    $emailError = '';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='Author' content='Virginia Ordoño'>
    <link rel='stylesheet' href='css/estilos.css'>
    <meta name='viewport' content='width=device-width initial-scale=1.0'>
    <title>Añade empresa</title>
</head>

<body>

    <form method="post" action="" id="form_add_company">
        <!--Datos personales-->
        <fieldset>
            <legend>Datos Empresa</legend>
            <div><label for="c_name">Nombre </label><span class="error"><?php echo $nameError; ?></span></div>
            <div><input type="text" name="c_name" value="" required><span> *</span></div>
            

            <div><label for="c_cif">Cif </label><span class="error"><?php echo $cifError; ?></span></div>
            <div><input type="text" name="c_cif" size="100" value="" required><span> *</span></div>
            

            <div><label for="c_address">Dirección</label><span class="error"><?php echo $addressError; ?></span></div>
            <div><input type="text" name="c_address" value="" required><span> *</span></div>
            

            <div><label for="c_phone">Teléfono </label><span class="error"><?php echo $phoneError; ?></span></div>
            <div><input type="number" name="c_phone" maxlength="9" value="" required><span> *</span></div>
            

            <div><label for="c_email">Email </label><span class="error"><?php echo $emailError; ?></span></div>
            <div><input type="email" name="c_email" size="100" value="" required><span> *</span></div>
            
        </fieldset>


        <!--Add a picture-->
        <fieldset>
            <legend>Logo</legend>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </fieldset>

        <fieldset>
            <legend>Descripción de la empresa</legend>
            <textarea name="c_description" id="c_description" cols="100" rows="10"></textarea>
        </fieldset>

        <!--Text and conditions checkbox-->

        <fields>
            <input type="checkbox" name="conditions" id="conditions" required>
            <label for="conditions">Acepto términos y condiciones</label>
        </fields>

        <section>
            <input type="submit" value="Enviar" id="btn_submit">
            <input type="reset" value="Borrar" id="btn_reset">
        </section>

    </form>
</body>

</html>