<?php
require('../view/require/header_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

//Login validation message
if (isset($data['loginMsg'])) {
    $loginMsg = $data['loginMsg'];
    $class = "class='error-message'";
} else {
    $class = $loginMsg = '';
}

?>

<div <?php echo $class ?> id='login-message' >
<span class="error-text"><?php echo $loginMsg ?></span>
</div>


<form action="" method="post" id="form-login">
    <div class="imgcontainer">
        <span class="material-symbols-outlined">
            account_circle
        </span>
    </div>

    <div class="container">

        <label for="user_name"><b>Usuario</b></label>
        <input type="text" name="user_name" required >

        <label for="user_psw"><b>Contraseña</b></label>
        <input type="password" name="user_psw" value="" required>

        <button type="submit" name="login">Login</button>
    </div>
</form>