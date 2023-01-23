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
        <div id="form_search_company" class="d-flex justify-content-center" role="search">
            <!--Search company bar and icon-->
            <div class='d-flex w-50 mx-5'>
                <input name="input_search_company" id="input_search_company" class="form-control" type="text" placeholder="Nombre de la empresa">
                <button type="button" class="btn btn-outline-dark">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </button>
            </div>
        </div>

        <section class='d-flex justify-content-lg-end my-2 mt-5'>
            <a href="<?php echo DIRBASEURL; ?>/companies/add_company" class="btn btn-success mx-1">Nueva Empresa</a>
        </section>


        <!--Table with las 5 last inserted companies from js-->
        <table id="table-companies" class="table text-center mt-1">
            <thead>
                <tr>
                    <th scope="col">Logo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Empleados</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_companies">
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