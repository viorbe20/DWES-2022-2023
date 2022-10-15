<?php
require ('require/header_view_php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' href='css/style.css'>
<title>Home page</title>
</head>
<body>

<section>

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
</section>
</body>
</html>
