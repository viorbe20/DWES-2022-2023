<?php
echo "<pre>";
//print_r($data);
echo "</pre>";
?>
<form method="post" class='w-100'>

    <div class="card mx-4 my-2 d-flex flex-column align-items-center">

        <div class="card-body w-100 d-flex flex-column">

            <div class='card d-flex flex-column w-100 mx-1 p-1 bg-light'>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label mb-3" for="user name">Nombre</label>
                            <input type="text" name="name" class="form-control" value='<?php echo isset($data['name']) ? $data['name'] : '' ?>' />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label mb-3" for="username">Username</label>
                            <input type="text" name="username" class="form-control" value='<?php echo isset($data['username']) ? $data['username'] : '' ?>' />
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label mb-3" for="user psw">Contraseña</label>
                            <input type="text" name="psw" class="form-control" value='<?php echo isset($data['psw']) ? $data['psw'] : '' ?>' />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label mb-3" for="user profile">Perfil</label>
                            <selection>
                                <select name="profile" class="form-control">
                                    <?php foreach ($data['profiles_list'] as $profile) : ?>
                                        <option value="<?php echo $profile ?>"><?php echo $profile ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </selection>
                        </div>
                    </div>
                </div>


                <!--Buttons div-->
                <div class="form-outline d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mx-2" name="btn_save_user">
                        Guardar
                    </button>
                </div>


            </div>
        </div>
    </div>
</form>