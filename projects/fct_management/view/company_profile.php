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
        <div class="mx-4 col-md d-flex flex-column align-items-center">
        <!--Info company-->    
        <div class="col-md-10 ">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Datos empresa</h5>
                    </div>
                    <div class="card-body">
                        <form>

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="c_name" class="form-control" />
                                <label class="form-label" for="form7Example3">Nombre</label>
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            
                            <div class="row mb-4">
                                <div class="col">
                            <!-- Phone input -->
                            <div class="form-outline">
                                <input type="number" id="form7Example6" class="form-control" />
                                <label class="form-label" for="form7Example6">Teléfono</label>
                            </div>
                                </div>
                                <div class="col">
                                    <!-- Email input -->
                                    <div class="form-outline">
                                        <input type="email" id="form7Example2" class="form-control" />
                                        <label class="form-label" for="form7Example2">Email</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="form7Example4" class="form-control" />
                                <label class="form-label" for="form7Example4">Dirección</label>
                            </div>

                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <textarea class="form-control" id="form7Example7" rows="4"></textarea>
                                <label class="form-label" for="form7Example7">Información adicional</label>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block ">
                                Añadir Empleados
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-10 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Empleados</h5>
                    </div>
                    <div class="card-body">
                    


                    </div>
                </div>
            </div>

        </div>
    </form>

</body>

</html>