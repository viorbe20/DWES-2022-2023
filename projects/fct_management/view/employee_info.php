<?php
require('../view/require/header_view.html');
require('../view/require/profile_view.php');
require('../view/require/nav_view.php');
require('../view/require/footer_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

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


if (isset($data)) {
    //var_dump($data);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='Author' content='Virginia Ordoño'>
    <link rel='stylesheet' href='css/estilos.css'>
    <meta name='viewport' content='width=device-width initial-scale=1.0'>
    <title>Worker Info</title>
</head>

<body>
<!--Title-->
<h2 class='page_title'>
    <?php echo $data['mode'] ?>
</h2>
    <form method="post" action="" enctype="multipart/form-data" id="form_add_employee">

        <section id='form_company_section_up'>

            <section id='form_company_section_up_left'>
                <fieldset>
                    <legend>Datos Trabajador</legend>
                    <div><label for="emp_name">Nombre</label><span> *</span>
                        <span class="error"><?php echo $nameError ?></span>
                    </div>
                    <div><input type="text" name="emp_name" value="<?php if (isset($data['emp_name'])) echo $data['emp_name']; ?>"></div>


                    <div><label for="emp_nif">Nif</label><span> *</span>
                        <span class="error"><?php echo $nifError; ?></span>
                    </div>
                    <div><input type="text" name="emp_nif" value="<?php if (isset($data['emp_nif'])) echo $data['emp_nif']; ?>"></div>


                    <div><label for="emp_job">Cargo</label><span> *</span>
                        <span class="error"><?php echo $jobError; ?></span>
                    </div>
                    <div><input type="text" name="emp_job" value="<?php if (isset($data['emp_job'])) echo $data['emp_job']; ?>"></div>
                </fieldset>
            </section>


        </section>

        <section id='form_company_section_down'>

            <input type="submit" value="Enviar" name="add_new_company" id="btn_add_company">
            <a href="<?php echo DIRBASEURL . '/home/companies/add_company' ?>" id="btn_reset">Borrar</a>

        </section>

    </form>
</body>

</html>