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
    <script src="http://localhost/dwes/projects/fct/assets/js/assignments.js
    "></script>
    <title>FCT Add Assignment</title>
</head>

<body>
    <?php
    require_once '../view/require/header.php';
    ?>
    <!--Content-->

    <form method="post" name='add_assignment_form' id='add_assignment_form' class='p-3 m-2 shadow p-3 mb-5 bg-white rounded'>
        <div class="mx-4 col-md d-flex flex-column align-items-center">

            <div class="col-md-10 ">
                <div class="card mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h4 class='d-flex justify-content-center text-white'>Nueva Asignación</h4>
                    </div>
                    <div class="card-body" id="card_company">

                        <!--Ayear , term-->
                        <div class="form-group d-flex my-2 p-4">
                            <div class="form-group w-50 mx-2">
                                <label for="ayear">Convocatoria</label>
                                <input class='form-control' type='text' value=<?php echo $_SESSION['selected_ayear_date'] ?> readonly />
                                <input type='hidden' id='selected_ayear_id' value=<?php echo $_SESSION['selected_ayear_id'] ?> />
                            </div>

                            <div class="form-group w-50 mx-2">
                                <label for="term">Período</label>
                                <input class='form-control' type='text' selected_group_id value=<?php echo $_SESSION['selected_term_name'] ?> readonly />
                                <input type='hidden' id='selected_term_id' value=<?php echo $_SESSION['selected_term_id'] ?> />
                            </div>
                        </div>
                        <!--Group, student-->
                        <div class="form-group d-flex my-2 p-4">
                            <div class="form-group w-50 mx-2">
                                <label for="group">Grupo</label>
                                <select class="form-control" id='selected_group_id' name='selected_group_id'>
                                    <?php
                                    // Empty option to avoid selecting a group by default
                                    echo "<option value=''>Selecciona un grupo</option>";
                                    foreach ($data['group_list'] as $key => $value) {
                                        echo "<option value= " . $value['g_id'] . ">" . $value['g_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group w-75 mx-2">
                                <label for="student">Alumno</label>
                                <!--Student select is filled with ajax in assignment.js-->
                                <select class="form-control" id='student_select'>
                                </select>
                            </div>
                        </div>

                        <!--company, teacher-->
                        <div class="form-group d-flex my-2 p-4">
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
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>