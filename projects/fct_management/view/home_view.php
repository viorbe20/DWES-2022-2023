<?php
require ('../view/require/header_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";
?>

<form action="" method="post" id="form-login">
        <div class="imgcontainer">
            <span class="material-symbols-outlined">
                account_circle
                </span>
        </div>

        <div class="container">
            <label for="uname"><b>Usuario</b></label>
            <input type="text" name="user_name" required>

            <label for="psw"><b>Contraseña</b></label>
            <input type="password"name="user_psw" required>

            <button type="submit">Login</button>
        </div>
    </form>

