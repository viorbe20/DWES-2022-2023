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
    <!-- <script src="http://localhost/dwes/projects/fct/assets/js/companies.js
    "></script> -->
    <title>FCT Asignations</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>
    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">

        <div id="form_search_company" class="d-flex flex-column align-items-center" role="search">
            <!--Search call period and date-->
            <h3>Asignaciones</h3>
            <h4>Convocatoria <?php echo $data['ayear_date'] . ' (' . $data['term_name'] . ')' ?> </h4>
        </div>

        <section class='d-flex justify-content-lg-end my-2 mt-5'>
            <a href="<?php echo DIRBASEURL; ?>/calls/add_assignment" class="btn btn-success mx-1">Nueva Asignación</a>
        </section>


        <!--Table with las 5 last inserted asignations from js-->
        <table id="table-companies" class="table text-center mt-1">
            <thead>
                <tr>
                    <th scope="col">Alumno</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Profesor</th>
                </tr>
                <tr>
                    <td scope="col">
                        <a href="" class="text-dark" style='text-decoration:none'><?php echo  $data['assignment']['student']?></a>
                    </td>
                    <td scope="col">
                    <a href="" class="text-dark" style='text-decoration:none'><?php echo  $data['assignment']['company']?></a>
                    </td>
                    <td scope="col">
                    <a href="" class="text-dark" style='text-decoration:none'><?php echo  $data['assignment']['teacher']?></a>
                    </td>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_assignments">
            </tbody>
        </table>

    </div>

    <!-- Modal Company Deleted -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_delete_company">
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