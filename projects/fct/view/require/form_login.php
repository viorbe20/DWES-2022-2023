        <!--Login form-->
        <form action="" method="post" name='form_login' id='form_login' class='d-flex text-white align-items-end mx-2'>
            <!--User group-->
            <div class="form-group d-flex justify-content-center align-items-center p-1 mx-0">
                <label for="username" class="text-white">Usuario</label>
                <div class="d-flex p-1 justify-content-center align-items-center">
                    <input type="text" class="form-control mx-1" name="username" autocomplete="on">
                </div>
            </div>
            <!--Password group-->
            <div class="form-group d-flex justify-content-center align-items-center p-1 mx-0">
                <label for="password" class="text-white">Contraseña</label>
                <div class="d-flex p-1 justify-content-center align-items-center">
                    <input type="password" class="form-control mx-1" name="psw" autocomplete="on">
                </div>
            </div>
            <!--Log in button-->
            <div class="form-group d-flex justify-content-center align-items-center pb-2">
                <button type="submit" class="btn btn-primary" name="btn_login">Log in</button>
            </div>
        </form>