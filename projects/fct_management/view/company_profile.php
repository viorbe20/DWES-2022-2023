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
                <img width="5%" src="<?php echo DIRFCT . '/assets/img/logos/' . $data['c_logo'] ?>" alt="company logo" id="profile_company_logo">
                <h2><?php echo $data['c_name'] ?></h2>
            </section>

            <section id='form_company_section_up_2'>

                <section id='form_company_section_up_2_left'>
                    <fieldset>
                        <legend>Información general</legend>
                        <div><label for="c_cif">Cif</label>
                            <input type="text" value="<?php echo $data['c_cif'];?>" readonly/>
                        </div>

                        <div><label for="c_address">Dirección</label>
                            <input type="text" value="<?php echo $data['c_address'];?>" readonly/>
                        </div>

                        <div><label for="c_phone">Teléfono</label>
                            <input type="text" value="<?php echo $data['c_phone'];?>" readonly/>
                        </div>

                        <div><label for="c_email">Email</label>
                            <input type="email" value="<?php echo $data['c_email'];?>" readonly/>
                        </div>
                    </fieldset>
                </section>

                <section id='form_company_section_up_2_right'>
                    <fieldset>
                        <legend>Descripción de la empresa</legend>
                        <textarea name="c_description" id="c_description" cols="4" rows="10" <?php echo $readonly ?> readonly></textarea>
                    </fieldset>

                    <fieldset id='actions'>
                        <legend>Acciones</legend>
                        <section id="actions">
                            <!--Edit company-->
                            <a href="<?php echo DIRBASEURL . '/home/companies/company_delete/' . $data['c_id'] ?>">
                                <span class="material-symbols-outlined">
                                    delete
                                </span></a>
                            <!--Edit and delete company material icons-->
                            <a href="<?php echo DIRBASEURL . '/home/companies/company_edit/' . $data['c_id'] ?>">
                                <span class="material-symbols-outlined">
                                    edit
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