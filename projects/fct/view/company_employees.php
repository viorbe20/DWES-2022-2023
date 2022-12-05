<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://localhost/dwes/projects/fct/assets/js/company_employees.js"></script>
    <title>Company Employees</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>
    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">
        <h4 class='d-flex justify-content-center'><?php echo $data['companyName'] ?></h4>

        <!--Search box company-->
        <form method="post" id="form_search_employee" class="d-flex m-5" role="search">
            <input name="input_search_employee" id="input_search_employee" class="form-control me-5" type="text" placeholder="Nombre del empleado">
            <button name="btn_search_employee" id="btn_search_employee" class="btn btn-primary mx-1 w-25" type="submit">Buscar</button>
        </form>

        <!--Table with las 5 last inserted employees-->
        <table id="table-employees" class="table text-center mt-5">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_employees">
                <?php
                if (isset($data['employees'])) {
                    foreach ($data['employees'] as $key => $employee) {
                        echo "<tr>";
                        echo "<td>" . $employee['emp_name'] . "</td>";
                        echo "<td>" . $employee['emp_job'] . "</td>";
                        echo "<td>";
                        echo "<a href='#' target='_self' onclick='deleteEmployee(". $employee['emp_id'] .")'><span class=\"material-symbols-outlined\">delete</span>";
                        echo "<a href='http://localhost/dwes/projects/fct/employee/" . $employee['emp_id'] . "'><span class=\"material-symbols-outlined\">edit</span></td>";
                        echo "</tr>";
                    }
                }
                ?>

            </tbody>
        </table>

    </div>

    <!-- Modal Employee Deleted -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_delete_employee">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Empresa</h5>
                    <button type="text" class="btn btn-secondary text-lg border-rounded" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-ligth" id="span_modal_exit">X</span>
                    </button>
                </div>
                <div class="modal-body" id="delete_message">
                </div>
                <div class="modal-footer">
                    <button id="btn_modal_exit" name="btn_modal_close" type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>