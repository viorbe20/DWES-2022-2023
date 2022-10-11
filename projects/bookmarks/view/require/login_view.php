<div id="loginForm">
    <?php
    //Fomulario login se muestra mientras se está de invitado
    if ($_SESSION['user']['profile'] == "guest") {
    ?>
        <form id="form-login" action="" method="post">
            <div>
                <label>Iniciar sesión
                    <input class="myInput" type="text" name="username" id="inputWord" placeholder="Nombre de usuario" value="dani">
                </label>
                <input class="myInput" type="text" name="passwrd" id="inputWord" placeholder="Contraseña" value="dani">
                <input class="myButton" type="submit" name="login" value="Entrar">
            </div>
            <div>
            <a href='<?php echo DIRBASEURL ?>/home/signup'>Registrarse</a>
            </div>
        </form>
    <?php
    }
    ?>
</div>