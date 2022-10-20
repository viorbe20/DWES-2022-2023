<?php
require('../view/require/header_view.html');
require('../view/require/profile_view.php');
require('../view/require/nav_view.php');
require('../view/require/footer_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

if (isset($data)) {
    //var_dump($data);
}

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
    <title>Company profile</title>
</head>


<body id='body_company_info'>
    <?php

    ?>
    <form method="post" action="" enctype="multipart/form-data" id="form_company_profile">


        <section id='form_company_section_up'>

            <section id='form_company_section_up_1'>
                <!-- company logo -->
                <img src="<?php echo DIRFCT . '/assets/img/logos/' . $data['c_logo'] ?>" alt="company logo" id="company_logo">
                <h1><?php echo $data['c_name'] ?></h1>
            </section>

            <section id='form_company_section_up_2'>

                <section id='form_company_section_up_2_left'>
                    <fieldset>
                        <legend>Información general</legend>
                        <div><label for="c_cif">Cif</label><span> *</span>
                            <span class="error"><?php if (isset($data['cifError'])) echo $data['cifError'];  ?></span>
                        </div>
                        <div><input type="text" name="c_cif" value="<?php if (isset($data['c_cif'])) echo $data['c_cif']; ?>" <?php echo $readonly ?>></div>

                        <div><label for="c_address">Dirección</label><span> *</span>
                            <span class="error"><?php if (isset($data['addressError'])) echo $data['addressError'];  ?></span>
                        </div>
                        <div><input type="text" name="c_address" value="<?php if (isset($data['c_address'])) echo $data['c_address']; ?>" <?php echo $readonly ?>></div>

                        <div><label for="c_phone">Teléfono </label><span> *</span>
                            <span class="error"><?php if (isset($data['phoneError'])) echo $data['phoneError'];  ?></span>
                        </div>
                        <div><input type="phone" name="c_phone" maxlength="9" value="<?php if (isset($data['c_phone'])) echo $data['c_phone']; ?>" <?php echo $readonly ?>></div>

                        <div><label for="c_email">Email </label><span> *</span>
                            <span class="error"><?php if (isset($data['emailError'])) echo $data['emailError']; ?></span>
                        </div>
                        <div><input type="email" name="c_email" value="<?php if (isset($data['c_email'])) echo $data['c_email']; ?>" <?php echo $readonly ?>></div>
                    </fieldset>
                </section>

                <section id='form_company_section_up_2_right'>
                    <fieldset>
                        <legend>Descripción de la empresa</legend>
                        <textarea name="c_description" id="c_description" cols="4" rows="10" <?php echo $readonly ?>></textarea>
                    </fieldset>

                    <fieldset id='actions'>
                        <legend>Acciones</legend>
                        <section id="actions">
                            <!--Edit company-->
                            <td><a href="<?php echo DIRBASEURL . '/home/companies/company_edit/' . $value['c_id'] ?>">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span></a></td>
                            <!--Edit and delete company material icons-->
                            <a href="<?php echo DIRBASEURL . '/home/companies/company_delete/' . $data['c_id'] ?>">
                                <span class="material-symbols-outlined">
                                    delete
                                </span></a>
                        </section>

                    </fieldset>
                </section>
            </section>
        </section>

        <section id='form_company_section_down'>
            
        <h2>Empleados</h2>


        </section>

    </form>

</body>

</html>