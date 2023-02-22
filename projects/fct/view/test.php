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