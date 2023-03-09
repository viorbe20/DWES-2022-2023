<?php
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>
<form method="post" class='w-100'>

    <div class="card mx-4 my-2 p-1 d-flex flex-row" style='height:25rem'>
        <!--left-->
        <div class='card d-flex flex-column w-100 m-2 p-2 bg-light'>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="student name">Alumno</label>
                        <input type="text" name="student" class="form-control" value='<?php echo isset($data['student']['name']) ? $data['student']['name'] : '' ?>' />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee surnamesº">Profesor</label>
                        <input type="text" name="surnames" class="form-control" value='<?php echo isset($data['employee']['surnames']) ? $data['employee']['surnames'] : '' ?>' />
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee nif">Empresa</label>
                        <input type="text" name="nif" class="form-control" value='<?php echo isset($data['employee']['nif']) ? $data['employee']['nif'] : '' ?>' />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee job">Empleado</label>
                        <input type="text" name="job" class="form-control" value='<?php echo isset($data['employee']['job']) ? $data['employee']['job'] : '' ?>' />
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee nif">Año académico</label>
                        <input type="text" name="nif" class="form-control" value='<?php echo isset($data['employee']['nif']) ? $data['employee']['nif'] : '' ?>' />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee job">Convocatoria</label>
                        <input type="text" name="job" class="form-control" value='<?php echo isset($data['employee']['job']) ? $data['employee']['job'] : '' ?>' />
                    </div>
                </div>
            </div>

        </div>

        <!--right-->
        <div class='card d-flex flex-column w-100 m-2 p-2 bg-light '>
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee nif">Fecha comienzo</label>
                        <input type="text" name="nif" class="form-control" value='<?php echo isset($data['employee']['nif']) ? $data['employee']['nif'] : '' ?>' />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee job">Fecha finalización</label>
                        <input type="text" name="job" class="form-control" value='<?php echo isset($data['employee']['job']) ? $data['employee']['job'] : '' ?>' />
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee nif">Evaluación alumno</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label mb-3" for="employee nif">Evaluación profesor</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Buttons div-->
    <div class="form-outline d-flex justify-content-center mb-4">
        <button type="submit" class="btn btn-primary btn-lg btn-block mx-2" name="btn_save_employee">
            Guardar
        </button>
    </div>
</form>