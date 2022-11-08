<?php
require_once "../app/Config/constantes.php";
// if (isset($data)) {
//     var_dump($data);
// }
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href="<?php echo DIRFCT; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="<?php echo DIRFCT; ?>/assets/css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo DIRFCT; ?>/assets/js/companies.js"></script>
    <title>Companies profile</title>
</head>

<body>
    <?php require_once 'header.php'; ?>
    <?php

    ?>
    <form method="post" action="" enctype="multipart/form-data" id="form_company_profile">

        <h3 class="text-center mt-4 mb-4">Alta empresa</h3>

        <!--Section company-->
        <div class="mx-4 col-md d-flex flex-column align-items-center">
            <div class="col-md-10 ">
                <div class="card mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h5 class="mb-0 text-light">Datos empresa</h5>
                    </div>
                    <div class="card-body" id="card_company">
                        <!-- Text input -->
                        <div class="form-outline mb-4">
                            <label class="form-label mb-3" for="company name">Nombre</label>
                            <span class="error_span"></span>
                            <input type="text" id="c_name" class="form-control" />
                        </div>
                        <!-- 2 column grid layout with text inputs for the first and last names -->

                        <div class="row mb-4">
                            <div class="col">
                                <!-- Phone input -->
                                <div class="form-outline">
                                    <label class="form-label mb-3" for="company phone">Teléfono</label>
                                    <span class="error_span"></span>
                                    <input type="text" id="c_phone" class="form-control" />
                                </div>
                            </div>
                            <div class="col">
                                <!-- Email input -->
                                <div class="form-outline">
                                    <label class="form-label mb-3" for="company email">Email</label>
                                    <span class="error_span"></span>
                                    <input type="email" id="c_email" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="form-outline mb-4">
                            <label class="form-label mb-3" for="company address">Dirección</label>
                            <span class="error_span"></span>
                            <input type="text" id="c_address" class="form-control" />
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <label class="form-label mb-3" for="company description">Información adicional</label>
                            <textarea class="form-control" id="c_description" rows="4"></textarea>
                        </div>

                        <!--Buttons div-->
                        <div class="form-outline mb-4 d-flex justify-content-lg-end">
                            <button type="button" class="btn btn-primary btn-lg btn-block mx-2" id="btn_add_employee">
                                Añadir Empleados
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mx-2" id="btn_create_company">
                                Crear Empresa
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Section employee-->
        <div class="mx-4 col-md d-flex flex-column align-items-center" id="section_employees">
            <div class="col-md-10 ">
                <div class="card" id='card_container'>
                    <div class="card-header py-3 bg-secondary" id="card_header">
                        <h5 class="mb-0 text-light">Datos Empleados</h5>
                    </div>

                    <!--Info employees-->
                    <div id="card_employee_0" class="card-body mx-4 my-4 bg-light border rounded shadow-sm p-3 mb-5 bg-white rounded">

                        <!-- Delete employee -->
                        <div class="d-flex justify-content-end mb-3">
                            <button type="text" class="delete_btn btn btn-secondary text-lg border-rounded">X</button>
                        </div>

                        <!-- Name input -->
                        <div class="form-outline">
                            <input type="text" id="e_name" class="form-control" />
                            <label class="form-label" for="e_name">Nombre</label>
                        </div>

                        <!--Box: nif and job-->
                        <div class="row mb-4">
                            <div class="col">
                                <!-- Nif input -->
                                <div class="form-outline">
                                    <input type="text" id="e_nif" class="form-control" />
                                    <label class="form-label" for="e_nif">Nif</label>
                                </div>
                            </div>

                            <!-- Job input -->
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="e_job" class="form-control" />
                                    <label class="form-label" for="e_job">Puesto</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>


</body>
<!-- Modal Company Created -->
<div class="modal" tabindex="-1" role="dialog" id="modal_create_company">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Empresa</h5>
                <button type="text" class="btn btn-secondary text-lg border-rounded" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-ligth" id="span_modal_exit">X</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Has creado una nueva empresa.</p>
            </div>
            <div class="modal-footer">
                <button id="btn_modal_reload" name="btn_modal_reload" type="button" class="btn btn-primary">Crear otra</button>
                <button id="btn_modal_exit" name="btn_modal_close" type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

</html>