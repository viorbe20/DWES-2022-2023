<form method="post" action="" enctype="multipart/form-data" id="form_company_info" class='w-100'>

    <div class="card mx-4 my-2 d-flex flex-column align-items-center">

        <div class="card-body w-100 d-flex" id="card_company">

            <!--Left section-->
            <div class='card d-flex flex-column w-100 mx-1 p-1 bg-light'>

                <div class="form-outline mb-4">
                    <label class="form-label mb-3" for="company name">Nombre</label>
                    <span class="error_span"></span>
                    <input type="text" name="name" class="form-control" value='<?php echo isset($data['company']['name']) ? $data['company']['name'] : '' ?>' />
                </div>

                <!--Phone and email-->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Phone input -->
                        <div class="form-outline">
                            <label class="form-label mb-3" for="company phone">Teléfono</label>
                            <span class="error_span"></span>
                            <input type="text" name="phone" class="form-control" value='<?php echo isset($data['company']['phone']) ? $data['company']['phone'] : ''?>'/>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                            <label class="form-label mb-3" for="company email">Email</label>
                            <span class="error_span"></span>
                            <input type="email" name="email" class="form-control" value='<?php echo isset($data['company']['email']) ? $data['company']['email'] : ''?>'/>
                        </div>
                    </div>
                </div>

                <!-- Address and cif -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label mb-3" for="company address">Dirección</label>
                            <span class="error_span"></span>
                            <input type="text" name="address" class="form-control" value='<?php echo isset($data['company']['address']) ? $data['company']['address'] : ''?>'/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label mb-3" for="company cif">Cif</label>
                            <span class="error_span"></span>
                            <input type="text" name="cif" class="form-control" value='<?php echo isset($data['company']['cif']) ? $data['company']['cif'] : ''?>'/>
                        </div>
                    </div>
                </div>
            </div>


            <!--Right section-->
            <div class='card d-flex flex-column w-75 mx-1 p-1 bg-light'>
                <!--Logo section-->
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagen logo</label>
                    <input class="form-control" type="file" name="logo">
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                    <label class="form-label mb-3" for="company description">Información adicional</label>
                    <textarea class="form-control" name="description" rows="6" value='<?php echo isset($data['company']['description']) ? $data['company']['description'] : ''?>'></textarea>
                </div>
            </div>
        </div>

        <!--Buttons div-->
        <div class="form-outline mb-4 d-flex justify-content-lg-end">
            <button type="submit" class="btn btn-primary btn-lg btn-block mx-2" name="btn_save_company">
                Guardar
            </button>
        </div>
    </div>
</form>