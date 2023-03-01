<?php
namespace App\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Models\Ayear;
use App\Models\Term;
use App\Models\Enrollment; 
use Exception;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Virginia Ordoño Bernier">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/style.css">
    <link rel='stylesheet' href="http://localhost/dwes/projects/fct/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://localhost/dwes/projects/fct/assets/js/test.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FCT Employees</title>
</head>

<body>
<div class="col-md-4 bg-light">
                        <div>
                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label mb-3" for="company name">Nombre</label>
                                <span class="error_span"></span>
                                <input type="text" id="c_name" name="c_name" class="form-control" />
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->

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

                            <div class="row mb-4">
                                <div class="col">
                                    <!-- Address input -->
                                    <div class="form-outline">
                                        <label class="form-label mb-3" for="company address">Dirección</label>
                                        <span class="error_span"></span>
                                        <input type="text" id="c_address" name="c_address" class="form-control" />
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Cif input -->
                                    <div class="form-outline">
                                        <label class="form-label mb-3" for="company cif">Cif</label>
                                        <span class="error_span"></span>
                                        <input type="text" id="c_cif" name="c_cif" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <!--Logo section-->
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Imagen logo</label>
                                <input class="form-control" type="file" id="c_logo" name="c_logo">
                            </div>

                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <label class="form-label mb-3" for="company description">Información adicional</label>
                                <textarea class="form-control" id="c_description" name="c_description" rows="4"></textarea>
                            </div>

                            <!--Buttons div-->
                            <div class="form-outline mb-4 d-flex justify-content-lg-end">
                                <button type="button" class="btn btn-primary btn-lg btn-block mx-2" id="btn_add_employee" name="btn_add_employee">
                                    Añadir Empleados
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg btn-block mx-2" id="btn_create_company" name="btn_create_company">
                                    Crear Empresa
                                </button>
                            </div>
                        </div>
                    </div>
    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">
        
    <table id="table-companies" class="table text-center mt-5">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_students">
            </tbody>
        </table>
    </div>

    <form method="post" enctype="multipart/form-data" id="form_search_student" class="d-flex flex-column align-items-center justify-content-center" role="search">
            
<?php
$enrollment = Enrollment::getInstancia();


?>
        </form>
</body>

</html>