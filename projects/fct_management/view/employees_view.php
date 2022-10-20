<?php
require('../view/require/header_view.html');
require('../view/require/profile_view.php');
require('../view/require/nav_view.php');
require('../view/require/footer_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

//Data array content
if (isset($data['employeesList'])) {
    $employeesList = $data['employeesList'];
} else {
    $employeesList = array();
}

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/style.css'>
    <title>Employees View</title>
</head>

<body>
<?php
if (isset($data['deleteEmployee'])) {
    //javascript popup confirmation. If user clicks 'Confirm' then it reload the page. If click "Cancel" then it redirects to admin page
    echo "<script>
        alert(Empleado " . $data['deletedEmployee'] . " eliminado correctamente.);
    </script>";
}
?>

    <main id='main_employees'>

        <section class="search-box" id="form-search-company">

            <form action="" method="post">
                <input type="text" name="search_employee" id="search" placeholder="Nombre empleado...">
                <button type="submit" name="search_employee_button">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                    Buscar</button>

            </form>
            <section id='add_employee'>
                <a href="<?php echo DIRBASEURL . '/home/companies/company_info' ?>"> <span class="material-symbols-outlined">
                        add_circle
                    </span>
                </a>
            </section>

        </section>

        <table class="table" id="table-companies">
            <tr>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Empresa</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
                <?php
                foreach ($employeesList as $key => $value) {
                    echo "<td>" . $value['emp_name'] . "</td>";
                    echo "<td>" . $value['emp_job'] . "</td>";
                    echo "<td>" . $value['emp_company_name'] . "</td>";
                ?>
                    <!--Delete employee-->
                    <td><a href="<?php echo DIRBASEURL . '/home/employees/employee_delete/' ?>"><span class="material-symbols-outlined">
                                delete
                            </span></a></td>
                    <!--Edit employee-->
                    <td><a href="<?php echo DIRBASEURL . '/home/employees/employee_edit/' ?>"><span class="material-symbols-outlined">
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