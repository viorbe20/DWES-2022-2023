<?php
require_once "../app/Config/constantes.php";
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/style.css">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://localhost/dwes/projects/fct/assets/js/company_info.js"></script>
    <script src="http://localhost/dwes/projects/fct/assets/js/header.js"></script>
    <title>Company info</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>


    <form method="post" action="" enctype="multipart/form-data" id="form_company_info">

        <div class=" card mx-4 my-2 d-flex flex-column align-items-center">

            <div class="card-header py-3 bg-secondary w-100 d-flex justify-content-center">
                <h5 class="mb-0 text-light">Alta empresa</h5>
            </div>

            <div class="card-body w-100 d-flex" id="card_company">

                <!--Left section-->
                <div class='card d-flex flex-column w-100 mx-1 p-1 bg-light'>

                    <div class="form-outline mb-4">
                        <label class="form-label mb-3" for="company name">Nombre</label>
                        <span class="error_span"></span>
                        <input type="text" id="c_name" name="c_name" class="form-control" />
                    </div>

                    <!--Phone and email-->
                    <div class="row mb-4">
                        <div class="col">
                            <!-- Phone input -->
                            <div class="form-outline">
                                <label class="form-label mb-3" for="company phone">Teléfono</label>
                                <span class="error_span"></span>
                                <input type="text" id="c_phone" name="c_phone" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <!-- Email input -->
                            <div class="form-outline">
                                <label class="form-label mb-3" for="company email">Email</label>
                                <span class="error_span"></span>
                                <input type="email" id="c_email" name="c_email" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <!-- Address and cif -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label mb-3" for="company address">Dirección</label>
                                <span class="error_span"></span>
                                <input type="text" id="c_address" name="c_address" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label mb-3" for="company cif">Cif</label>
                                <span class="error_span"></span>
                                <input type="text" id="c_cif" name="c_cif" class="form-control" value='G39114111' />
                            </div>
                        </div>
                    </div>
                </div>


                <!--Right section-->
                <div class='card d-flex flex-column w-75 mx-1 p-1 bg-light'>
                    <!--Logo section-->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Imagen logo</label>
                        <input class="form-control" type="file" id="c_logo" name="c_logo">
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <label class="form-label mb-3" for="company description">Información adicional</label>
                        <textarea class="form-control" id="c_description" name="c_description" rows="6"></textarea>
                    </div>
                </div>
            </div>
            <?php
                require_once('../view/require/section_employee.php');
            ?>
            <!--Buttons div-->
            <div class="form-outline mb-4 d-flex justify-content-lg-end">
                <button type="button" class="btn btn-primary btn-lg btn-block mx-2" id="btn_add_employee" name="btn_add_employee">
                    Añadir Empleados
                </button>
                <button type="submit" class="btn btn-success btn-lg btn-block mx-2" id="btn_create_company" name="btn_create_company">
                    Crear Empresa
                </button>
            </div>
        </div>
        </div>

    </form>


</body>
<?php
require_once '../view/require/modal_add_company.php';
?>

</html>