<?php
echo '<pre>';
//print_r($data);
echo '</pre>';

?>
<form action="" method="post" class='d-flex flex-column'>
    <div class="card mx-4 my-2 p-1 d-flex flex-row" style='height:26rem'>
        <!--left-->
        <div class='card d-flex flex-column w-100 m-2 p-2 bg-light'>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="student name">Alumno</label>
                        <?php
                        if (isset($data['new_assignment'])) {
                            echo '<input type="text" name="student" class="form-control" value="' . ($data['assignment']['student_name']) . " " . ($data['assignment']['student_surnames']) . '" readonly/>';
                        } else {
                            echo '<select class="form-select" name="enrollment_id">';
                            foreach ($data['students']['not_assigned']  as $value) {
                                echo '<option value="' . $value['id'] . '">' . $value['name'] . ' ' . $value['surnames'] . '</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="teacher">Profesor</label>
                        <?php
                        if (isset($data['new_assignment'])) {
                            echo '<input type="text" name="teacher" class="form-control" value="' . ($data['assignment']['teacher_name']) . " " . ($data['assignment']['teacher_surnames']) . '" readonly/>';
                        } else {
                            echo '<select class="form-select" name="teacher" aria-label="Default select example">';
                            foreach ($data['teachers_list'] as $value) {
                                echo '<option value="' . $value['id'] . '">' . $value['name'] . ' ' . $value['surnames'] . '</option>';
                            }
                        }
                        echo '</select>';
                        ?>
                    </div>

                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="company">Empresa</label>
                        <?php if (isset($data['new_assignment'])) {
                            echo '<input type="text" name="company" class="form-control" value="' . ($data['assignment']['company_name']) . '" readonly/>';
                        } else { ?>
                            <?php
                            require_once '../view/require/search_box_company2.php';
                            ?>
                        <?php
                        } ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee name">Empleado</label>
                        <?php
                        if (isset($data['new_assignment'])) {
                            echo '<input type="text" name="employee" class="form-control" value="' . ($data['assignment']['employee_name']) . " " . ($data['assignment']['employee_surnames']) . '" readonly/>';
                        } else { ?>
                            <div id="employee_select_div">
                                <select id="employee_select" class="form-control">
                                    <option value="">Selecciona un empleado</option>
                                </select>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="academic_year">Año académico</label>
                        <?php
                        if (isset($data['new_assignment'])) {
                            echo '<input type="text" name="ayear" class="form-control" value="' . ($data['assignment']['ayear']) . '" readonly/>';
                        } else { ?>
                            <input type="text" name="academic_year" class="form-control" value="<?php echo getCurrentAcademicYear() ?>" readonly />
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class=" col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="term">Convocatoria</label>
                        <?php
                        if (isset($data['new_assignment'])) {
                            echo '<input type="text" name="term" class="form-control" value="' . ($data['assignment']['term']) . '" readonly/>';
                        } else {
                            echo '<select class="form-select" name="term" aria-label="Default select example">';
                            foreach ($data['terms_list'] as $value) {
                                if ($value['term'] == getCurrentTerm()) {
                                    echo '<option value="' . $value['term'] . '" selected>' . $value['term']  . '</option>';
                                } else {
                                    echo '<option value="' . $value['term'] . '">' . $value['term']  . '</option>';
                                }
                            }
                        }
                        echo '</select>';
                        ?>
                    </div>
                </div>
            </div>


        </div>

        <!--right-->
        <div class='card d-flex flex-column w-100 m-2 p-2 bg-light '>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="start_date">Fecha comienzo</label>
                        <?php
                        if (isset($data['new_assignment'])) { ?>
                            <input type="date" name="start_date" class="form-control" value="<?php echo $data['assignment']['date_start'] ?>" />
                        <?php
                        } else {
                            echo '<input type="date" name="start_date" class="form-control" value="" />';
                        }

                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="end_date">Fecha finalización</label>
                        <?php
                        if (isset($data['new_assignment'])) { ?>
                            <input type="date" name="start_date" class="form-control" value="<?php echo $data['assignment']['date_end'] ?>" />
                        <?php
                        } else {
                            echo '<input type="date" name="start_date" class="form-control" value="" />';
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="eval_student">Evaluación alumno</label>
                        <textarea class="form-control" id="eval_student" name="eval_student" rows="6" readonly><?php echo isset($data['new_assignment']) ? $data['assignment']['eval_student'] : ''; ?></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="eval_teacher">Evaluación profesor</label>
                        <textarea class="form-control" id="eval_teacher" name="eval_teacher" rows="6" readonly><?php echo isset($data['new_assignment']) ? $data['assignment']['eval_teacher'] : ''; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row p-6 d-flex justify-content-center">
                <?php if (isset($data['new_assignment'])) { ?>
                    <a href="<?php echo DIRBASEURL?>/assignment/student/delete/<?php echo $data['assignment']['assignments_id']?>" class="btn btn-danger btn-lg btn-block w-25 mx-2" name="btn_delete_assignment">
                        Eliminar
                </a>
                <?php
                } ?>
                <button type="submit" class="btn btn-primary btn-lg btn-block w-25" name="btn_create_assignment">
                    Guardar
                </button>

            </div>

        </div>

    </div>

</form>