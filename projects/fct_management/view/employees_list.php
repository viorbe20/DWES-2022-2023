<?php
require('../view/require/header_view.html');
require('../view/require/profile_view.php');
require('../view/require/nav_view.php');
require('../view/require/footer_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

if (isset($data)) {
    var_dump($data);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='Author' content='Virginia Ordoño'>
    <link rel='stylesheet' href='css/estilos.css'>
    <meta name='viewport' content='width=device-width initial-scale=1.0'>
    <title>Employees list</title>
</head>

<body>

<main id='main_companies'>

<section class="search-box" id="form_search_employee">

    <form action="" method="post">
        <input type="text" name="search_employee" id="search" placeholder="Nombre empleado...">
        <button type="submit" name="search_employee_button">
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
        <th>Nombre</th>
        <th>Puesto</th>
        <th>Eliminar</th>
        <th>Editar</th>
    </tr>
    <tr>
        <?php
        foreach ($data['employees'] as $key => $value) {
            echo "<td>" . $value['emp_name'] . "</td>";
            echo "<td>" . $value['emp_job'] . "</td>";
        ?>
            </a></td>
            <!--Delete employee-->
            <td><a href="<?php echo DIRBASEURL . '/home/employees_list/employee_delete/' . $value['emp_id'] ?>"><span class="material-symbols-outlined">
                        delete
                    </span></a></td>
            <!--Edit employee-->
            <td><a href="<?php echo DIRBASEURL . '/home/employees_list/employee_edit/' . $value['emp_id'] ?>"><span class="material-symbols-outlined">
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