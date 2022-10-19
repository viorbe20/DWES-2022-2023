<?php
require('../view/require/header_view.html');
require('../view/require/profile_view.php');
require('../view/require/nav_view.html');
require('../view/require/footer_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

// if (isset($data)) { 
// var_dump($data);
// }

if (isset($data['readonly'])) {
    $readonly = $data['readonly'];
} else {
    $readonly = " ";
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


<body id='body_company_info'>
<?php
if (isset($data['newCompany'])) {
    //javascript popup confirmation. If user clicks 'Confirm' then it reload the page. If click "Cancel" then it redirects to admin page
    echo "<script>
    if (confirm('Empresa " . $data['newCompany'] . " añadida correctamente. ¿Desea añadir otra empresa?')) {
        window.location.href = '" . DIRBASEURL . "/home/companies/company_info';
    } else {
        window.location.href = '" . DIRBASEURL . "/home/companies';
    }
    </script>";
}
?>
    <form method="post" action="" enctype="multipart/form-data" id="form_add_company">

        <section id='form_company_section_up'>

            <section id='form_company_section_up_left'>
                <fieldset>
                    <legend>Datos Empresa</legend>

                    <div><label for="c_name">Nombre</label><span> *</span>
                        <span class="error"><?php if (isset($data['nameError'])) echo $data['nameError'];  ?></span>
                    </div>
                    <div>
                        <input type="text" name="c_name" value="<?php if (isset($data['c_name'])) echo $data['c_name']; ?>" <?php echo $readonly ?>>
                    </div>

                    <div><label for="c_cif">Cif</label><span> *</span>
                        <span class="error"><?php if (isset($data['cifError'])) echo $data['cifError'];  ?></span>
                    </div>
                    <div><input type="text" name="c_cif" value="<?php if (isset($data['c_cif'])) echo $data['c_cif']; ?>"<?php echo $readonly ?>></div>

                    <div><label for="c_address">Dirección</label><span> *</span>
                        <span class="error"><?php if (isset($data['addressError'])) echo $data['addressError'];  ?></span>
                    </div>
                    <div><input type="text" name="c_address" value="<?php if (isset($data['c_address'])) echo $data['c_address']; ?>"<?php echo $readonly ?>></div>

                    <div><label for="c_phone">Teléfono </label><span> *</span>
                        <span class="error"><?php if (isset($data['phoneError'])) echo $data['phoneError'];  ?></span>
                    </div>
                    <div><input type="phone" name="c_phone" maxlength="9" value="<?php if (isset($data['c_phone'])) echo $data['c_phone']; ?>"<?php echo $readonly ?>></div>

                    <div><label for="c_email">Email </label><span> *</span>
                        <span class="error"><?php if (isset($data['emailError'])) echo $data['emailError']; ?></span>
                    </div>
                    <div><input type="email" name="c_email" value="<?php if (isset($data['c_email'])) echo $data['c_email']; ?>"<?php echo $readonly ?>></div>

                </fieldset>
            </section>

            <section id='form_company_section_up_right'>
                <fieldset>
                    <legend>Logo</legend>
                    <input type="file" name="c_logo" <?php echo $readonly ?>>
                    <span class="error"><?php if (isset($data['logoError'])) echo $data['logoError']; ?></span>
                </fieldset>

                <fieldset>
                    <legend>Empleados</legend>
                    <a href="<?php echo DIRBASEURL . '/home/companies/worker_info' ?>;"> <input type="button" value="Añadir empleado" id="add_employee"></a>
                </fieldset>

                <fieldset>
                    <legend>Descripción de la empresa</legend>
                    <textarea name="c_description" id="c_description" cols="40" rows="12" <?php echo $readonly ?>></textarea>
                </fieldset>
                

            </section>

        </section>

        <section id='form_company_section_down'>

            <input type="submit" value="Enviar" name="add_new_company" id="btn_add_company">
            <a href="<?php echo DIRBASEURL . '/home/companies/company_info' ?>" id="btn_reset">Borrar</a>

        </section>

    </form>

</body>

</html>