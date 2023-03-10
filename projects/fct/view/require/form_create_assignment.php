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
                        if (isset($data['student']['name'])) {
                            echo '<input type="text" name="student" class="form-control" value="' . ($data['student']['name']) . '" readonly/>';
                        } else {
                            echo '<input type="text" name="student" class="form-control" value="' . ($data['student']['name']) . '" readonly/>';
                        }
                        ?>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="teacher">Profesor</label>
                        <?php
                        echo '<select class="form-select" name="teacher" aria-label="Default select example">';
                        if (isset($data['teacher']['id'])) {
                            // Si ya hay un profesor seleccionado, lo mostramos por defecto
                            $selected_id = $data['teacher']['id'];
                            foreach ($data['teachers_list'] as $value) {
                                $selected = '';
                                if ($value['id'] == $selected_id) {
                                    $selected = 'selected';
                                }
                                echo '<option value="' . $value['id'] . '" ' . $selected . '>' . $value['name'] . ' ' . $value['surnames'] . '</option>';
                            }
                        } else {
                            // Si no hay profesor seleccionado, mostramos todos los disponibles
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
                        <?php
                        require_once '../view/require/search_box_company2.php';
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee name">Empleado</label>
                        <div id="employee_select_div">
                            <select id="employee_select" class="form-control">
                                <option value="">Selecciona un empleado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="academic_year">Año académico</label>
                        <?php
                        if (isset($data['assignments']['ayear'])) {
                            echo '<input type="text" name="academic_year" class="form-control" value="' . $data['assignments']['ayear'] . '" />';
                        } else {
                            echo '<input type="text" name="academic_year" class="form-control" value="" />';
                        }
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="term">Convocatoria</label>
                        <?php
                        echo '<select class="form-select" name="term" aria-label="Default select example">';
                        if (isset($data['assignments']['term'])) {
                            echo '<input type="text" name="term" class="form-control" value="' . $data['assignments']['term'] . '" />';
                        } else {
                            // Show all
                            foreach ($data['terms_list'] as $value) {
                                echo '<option value="' . $value['term'] . '">' . $value['term']  . '</option>';
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
                        <input type="date" name="start_date" class="form-control" value="<?php echo isset($data['assignments']['date_start']) ? $data['assignments']['date_start'] : ''; ?>" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="end_date">Fecha finalización</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo isset($data['assignments']['date_end']) ? $data['assignments']['date_end'] : ''; ?>" />
                    </div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="eval_student">Evaluación alumno</label>
                        <textarea class="form-control" id="eval_student" name="eval_student" rows="6"><?php echo isset($data['assignments']['eval_student']) ? $data['assignments']['eval_student'] : ''; ?></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="eval_teacher">Evaluación profesor</label>
                        <textarea class="form-control" id="eval_teacher" name="eval_teacher" rows="6"><?php echo isset($data['assignments']['eval_teacher']) ? $data['assignments']['eval_teacher'] : ''; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row p-6 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block w-25" name="btn_create_assignment">
                    Guardar
                </button>
            </div>

        </div>

    </div>

</form>