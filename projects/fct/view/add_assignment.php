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
    <title>FCT Add Assignment</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>
    <!--Content-->
    <div class="container d-flex-column justify-content-center mt-5">

        <form method="post" name='add_assignment_form' id='add_assignment_form' class='p-3 m-2 shadow p-3 mb-5 bg-white rounded'>
            <div id="form_search_company" class="d-flex flex-column align-items-center" role="search">
                <h3>Nueva Asignación</h3>
                <h4>Convocatoria <?php echo $_SESSION['selected_ayear'] . ' (' . $_SESSION['selected_term'] . ')' ?> </h4>
            </div>

            <!--Student, company, teacher-->
            <div class="form-group d-flex my-2 p-4">
                <div class="form-group w-50 mx-2">
                    <label for="student">Alumno</label>
                    <select class="form-control">
                        <?php
                        foreach ($data['student_list'] as $value) {
                            echo "<option>$value</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group w-50 mx-2">
                    <label for="company">Empresa</label>
                    <select class="form-control">
                        <?php
                        foreach ($data['company_list'] as $value) {
                            echo "<option>$value</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group w-50 mx-2">
                    <label for="teacher">Profesor</label>
                    <select class="form-control">
                        <?php
                        foreach ($data['teacher_list'] as $value) {
                            echo "<option>$value</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!--start and end date-->
            <div class="form-group d-flex my-2 p-4">

                <div class="form-group w-50 mx-2">
                    <label for="start_date">Fecha inicio</label>
                    <input type="date" class="form-control" id="date">
                </div>

                <div class="form-group w-50 mx-2">
                    <label for="end_date">Fecha fin</label>
                    <input type="date" class="form-control" id="date">
                </div>
            </div>

            <!--Avaliation textareas-->
            <div class="form-group d-flex my-2 p-4">
                <div class="form-group w-50 mx-2">
                    <label for="avaliation_student">Evaluación alumno</label>
                    <textarea class="form-control" id="avaliation_student" rows="3"></textarea>
                </div>

                <div class="form-group w-50 mx-2">
                    <label for="avaliation_teacher">Evaluación profesor</label>
                    <textarea class="form-control" id="avaliation_student" rows="3"></textarea>
                </div>
            </div>
            <!--Submit button-->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name='add_assignment'>Añadir</button>
            </div>
        </form>

    </div>
</body>

</html>