<?php
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>
<form method="post" class='w-100'>

    <div class="card mx-4 my-2 d-flex flex-column align-items-center">

        <div class="card-body w-100 d-flex flex-column">

            <div class='card d-flex flex-column w-100 mx-1 p-1 bg-light'>

                <!--Name and surnames-->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                            <label class="form-label mb-3" for="employee name">Nombre</label>
                            <input type="text" name="name" class="form-control" value='<?php echo isset($data['employee']['name']) ? $data['employee']['name'] : '' ?>' />
                        </div>
                    </div>
                    <div class="col">
                        <!-- Surnames input -->
                        <div class="form-outline">
                            <label class="form-label mb-3" for="employee surnamesº">Apellidos</label>
                            <input type="text" name="surnames" class="form-control" value='<?php echo isset($data['employee']['surnames']) ? $data['employee']['surnames'] : '' ?>' />
                        </div>
                    </div>
                </div>

                <!--Nif and job-->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Nif input -->
                        <div class="form-outline">
                            <label class="form-label mb-3" for="employee nif">Nif</label>
                            <input type="text" name="nif" class="form-control" value='<?php echo isset($data['employee']['nif']) ? $data['employee']['nif'] : '' ?>' />
                        </div>
                    </div>
                    <div class="col">
                        <!-- Job input -->
                        <div class="form-outline">
                            <label class="form-label mb-3" for="employee job">Puesto</label>
                            <input type="text" name="job" class="form-control" value='<?php echo isset($data['employee']['job']) ? $data['employee']['job'] : '' ?>' />
                        </div>
                    </div>
                </div>

                <!--Buttons div-->
                <div class="form-outline d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mx-2" name="btn_save_employee">
                        Guardar
                    </button>
                </div>

            </div>
        </div>
    </div>
</form>