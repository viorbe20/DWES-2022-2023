<?php
require('../view/require/header_view.html');
require('../view/require/profile_view.php');
require('../view/require/nav_view.php');
require('../view/require/footer_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

//Data array content
if (isset($data['lastCompanies'])) {
    $lastCompanies = $data['lastCompanies'];
} else {
    $lastCompanies = array();
}

if (isset($data['matchCompanies'])) {
    $matchCompanies = $data['matchCompanies'];
    var_dump($matchCompanies);
} else {
    $matchCompanies = array();
}

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/style.css'>
    <title>Companies View</title>
</head>

<body>
<?php
if (isset($data['deletedCompany'])) {
    //javascript popup confirmation. If user clicks 'Confirm' then it reload the page. If click "Cancel" then it redirects to admin page
    echo "<script>
        alert(Empresa " . $data['deletedCompany'] . " eliminada correctamente.);
    </script>";
}
?>
    <main id='main_companies'>

        <section class="search-box" id="form-search-company">

            <form action="" method="post">
                <input type="text" name="search_company" id="search" placeholder="Nombre empresa...">
                <button type="submit" name="search_company_button">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                    Buscar</button>

            </form>
            <section id='add_company'>
                <a href="<?php echo DIRBASEURL . '/home/companies/company_info' ?>"> <span class="material-symbols-outlined">
                        add_circle
                    </span>
                </a>
            </section>

        </section>

        <table class="table" id="table-companies">
            <tr>
                <th>Logo</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Empleados</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            <tr>
                <?php
                foreach ($lastCompanies as $key => $value) {
                    //Shows an image inside a td
                    echo "<td><img src='" . DIRFCT . "/assets/img/logos/" . $value['c_logo'] . "' alt='Logo de la empresa' width='50px' height='50px'></td>";


                    echo "<td>" . $value['c_name'] . "</td>";
                    echo "<td>" . $value['c_phone'] . "</td>";
                ?>
                    </a></td>
                    <!--Employees-->
                    <td><a href="<?php echo DIRBASEURL . '/home/employees_list/' . $value['c_id'] ?>"><span class="material-symbols-outlined">
                                group
                            </span></a></td>

                    <!--Delete company-->
                    <td><a href="<?php echo DIRBASEURL . '/home/companies/company_delete/' . $value['c_id'] ?>"><span class="material-symbols-outlined">
                                delete
                            </span></a></td>
                    <!--Edit company-->
                    <td><a href="<?php echo DIRBASEURL . '/home/companies/company_edit/' . $value['c_id'] ?>"><span class="material-symbols-outlined">
                                edit
                            </span></a></td>
            </tr>
        <?php
                }
        ?>
        </table>

    </main>
</body>

</html>