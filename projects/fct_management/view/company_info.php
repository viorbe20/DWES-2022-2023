<?php
require('../view/require/header_view.html');
require('../view/require/profile_view.php');
require('../view/require/nav_view.php');
require('../view/require/footer_view.html');
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<script>" . file_get_contents('../view/js/main.js') . "</script>";

if (isset($data)) {
    var_dump($data);
    //print($data['mode']);
    if ($data['mode'] == "Alta empresa") {
        $disabled = "";
        $readonly = "";
    }
}


// Employee data
if (!isset($data['nameError'])) {
    $nameError = '';
} else {
    $nameError = $data['nameError'];
}

if (!isset($data['nifError'])) {
    $nifError = '';
} else {
    $nifError = $data['nifError'];
}

if (!isset($data['jobError'])) {
    $jobError = '';
} else {
    $jobError = $data['jobError'];
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

    if ($data['mode'] == 'Elimina empresa') {
        # code...
    }
    ?>
    <!--Title-->
    <h2 class='page_title'>
        <?php echo $data['mode'] ?>
    </h2>

    <form method="post" action="" enctype="multipart/form-data" id="form_add_company">

        <!--Company data-->
        <fieldset id="new_company_data">
            <legend>Datos Empresa</legend>

            <section id="new_company_data_left">
                <div><label for="c_name">Nombre</label><span> *</span>
                </div>
                <div>
                    <input type="text" name="c_name" value="<?php if (isset($data['c_name'])) echo $data['c_name']; ?>" <?php echo $readonly ?> required>
                    <span class="error"></span>
                </div>

                <div><label for="c_cif">Cif</label><span> *</span>
                </div>
                <div><input type="text" name="c_cif" value="<?php if (isset($data['c_cif'])) echo $data['c_cif']; ?>" <?php echo $readonly ?> required>
                    <span class="error"></span>
                </div>

                <div><label for="c_address">Dirección</label><span> *</span>
                </div>
                <div>
                    <input type="text" name="c_address" value="<?php if (isset($data['c_address'])) echo $data['c_address']; ?>" <?php echo $readonly ?> required>
                    <span class="error"></span>
                </div>

                <div><label for="c_logo">Logo</label><span> *</span>
                    <div>
                        <input type="file" name="c_logo" <?php echo $disabled ?>;>
                        <span class="error"><?php if (isset($data['logoError'])) echo $data['logoError']; ?></span>
                    </div>

            </section>

            <section id="new_company_data_right">
                <div><label for="c_phone">Teléfono </label><span> *</span>
                </div>
                <div>
                    <input type="phone" name="c_phone" maxlength="9" value="<?php if (isset($data['c_phone'])) echo $data['c_phone']; ?>" <?php echo $readonly ?> required>
                    <span class="error"></span>
                </div>

                <div><label for="c_email">Email </label><span> *</span>
                </div>
                <div><input type="email" name="c_email" value="<?php if (isset($data['c_email'])) echo $data['c_email']; ?>" <?php echo $readonly ?> required>
                    <span class="error"></span>
                </div>

                <div><label for="c_description" id="description">Descripción de la empresa</label>
                    <textarea name="c_description" id="c_description" cols="40" rows="5" <?php echo $readonly ?>>
                    <?php if (isset($data['c_description'])) {
                        echo $data['c_description'];
                    }
                    ?>
                    </textarea>
                </div>
            </section>
        </fieldset>

        <!--Employee data-->
        <fieldset id='new_employee_data'>
            <legend>Datos Empleado</legend>

            <section class="employee_section">
                <span class="material-symbols-outlined" data-icon="delete-employee">
                    cancel
                </span>
                <div><label for="e_name">Nombre</label><span> *</span>
                    <span class="error"><?php echo $nameError ?></span>
                </div>
                <div><input type="text" name="e_name[]" value="<?php if (isset($data['e_name'])) echo $data['e_name']; ?>"></div>


                <div><label for="e_nif">Nif</label><span> *</span>
                    <span class="error"><?php echo $nifError; ?></span>
                </div>
                <div><input type="text" name="e_nif[]" value="<?php if (isset($data['e_nif'])) echo $data['e_nif']; ?>"></div>


                <div><label for="e_job">Cargo</label><span> *</span>
                    <span class="error"><?php echo $jobError; ?></span>
                </div>
                <div><input type="text" name="e_job[]" value="<?php if (isset($data['e_job'])) echo $data['e_job']; ?>"></div>
            </section>

        </fieldset>

        <!--Company config-->
        <section id='company_config'>
            <?php
            if (isset($data['deleteCompany'])) {
            ?>
                <input type="submit" value="Eliminar" name="delete_current_company" id="btn_add_company">
                <a href="<?php echo DIRBASEURL . '/home/companies' ?>" id="btn_reset">Cancelar</a>
            <?php
            } elseif (isset($data['editCompany'])) {
            ?>
                <input type="submit" value="Editar" name="edit_current_company" id="btn_add_company">
                <a href="<?php echo DIRBASEURL . '/home/companies' ?>" id="btn_reset">Cancelar</a>
            <?php
            } else {
            ?>
                <input type="text" value="Añadir Empleado" id="add_employee_section" class="btn_add_green">
                <input type="submit" value="Crear Empresa" name="add_new_company" class="btn_add_green" id="btn_add_new_company">
                <a href="<?php echo DIRBASEURL . '/home/companies/company_info' ?>" class="btn_cancel_red">Cancelar</a>
            <?php } ?>
        </section>

    </form>

</body>

</html>