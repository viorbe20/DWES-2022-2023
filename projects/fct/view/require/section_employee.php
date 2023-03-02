        <!--Section employee-->
        <div class="mx-4 col-md d-flex flex-column align-items-center d-none" id="section_employees">
            <div class="col-md-10 ">
                <div class="card" id='card_container'>
                    <div class="card-header py-3 bg-secondary" id="card_header">
                        <h5 class="mb-0 text-light">Datos Empleados</h5>
                    </div>

                    <!--Info employees-->
                    <div id="card_employee_0" class="card-body mx-4 my-4 bg-light border rounded shadow-sm p-3 mb-5 bg-white rounded d-none">

                        <!-- Delete employee -->
                        <div class="d-flex justify-content-end mb-3">
                            <button type="text" class="delete_btn btn btn-secondary text-lg border-rounded">X</button>
                        </div>

                        <!-- Name input -->
                        <div class="form-outline">
                            <label class="form-label" for="employee name">Nombre</label>
                            <input type="text" id="e_name" name="e_name[]" class="form-control" value='' />
                        </div>

                        <!--Box: nif and job-->
                        <div class="row mb-4">
                            <div class="col">
                                <!-- Nif input -->
                                <div class="form-outline">
                                    <label class="form-label" for="employee nif">Nif</label>
                                    <input type="text" id="e_nif" name="e_nif[]" class="form-control" value="" />
                                </div>
                            </div>

                            <!-- Job input -->
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="employee job">Puesto</label>
                                    <input type="text" id="e_job" name="e_job[]" class="form-control" value="" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <button type="button" class="btn btn-primary btn-lg btn-block mx-2" id="btn_add_employee" name="btn_add_employee">
                    Añadir Empleados
                </button>

        <!-- <div class="card-body w-100 d-flex" id="card_company">
                <div class='card d-flex flex-column w-100 mx-1 p-1 bg-light'>
                    <div class="card-header py-3 bg-secondary w-100 d-flex justify-content-center">
                        <h6 class="mb-0 text-light">Datos empleado</h6>
                    </div>
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
                </div>
            </div> -->