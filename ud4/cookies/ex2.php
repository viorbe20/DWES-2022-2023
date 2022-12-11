
<?php
/**
 * Crea un formulario de login que permita al usuario recordar los datos introducidos. 
 * Si no se marca la opción guardar contraseña, la cookie se eliminará automáticamente.
 * 
 * @author Virginia Ordoño Bernier
 * @since December 2022
 * 
 */

$processForm = false;
$message = "";
$username = "";
$password = "";
$usernameValidation = false;
$passwordValidation = false;

if (isset($_COOKIE['user']['username']) && isset($_COOKIE['user']['password'])) {
    $username = $_COOKIE['user']['username'];
    $password = $_COOKIE['user']['password'];
}

function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Si se ha enviado el formulario
if (isset($_POST['submitForm'])) {

    if (isset($_POST['username'])) {
        $username = clearData($_POST['username']);
        $usernameValidation = true;
    } else {
        $message = "El campo usuario es obligatorio";
    }

    if (isset($_POST['password'])) {
        $password = clearData($_POST['password']);
        $passwordValidation = true;
    } else {
        $message = "El campo contraseña es obligatorio";
    }

    //Si se han validado los campos
    if ($usernameValidation && $passwordValidation) {
        //Si el usuario y la contraseña son correctos
        if ($username == "admin1" && $password == "admin1") {
            $message = "Usuario encontrado";
            $processForm = true;
        } else {
            $message = "Usuario no encontrado";
        }

        //Si se ha marcado la casilla de guardar contraseña
        if (isset($_POST['savePassword'])) {
            //Creamos la cookie con el usuario y la contraseña
            setcookie("user[username]", $username, time() + 60 * 60 * 24 * 365);
            setcookie("user[password]", $password, time() + 60 * 60 * 24 * 365);
        } else {
            //Si no se ha marcado la casilla de guardar contraseña
            //Eliminamos la cookie
            setcookie("user[username]", "", time() - 3600);
            setcookie("user[password]", "", time() - 3600);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class='m-0 row justify-content-center'>
    <h1 class='d-flex justify-content-center'>Formulario con login</h1>
    <div class="p-3 mb-2 bg-warning text-dark d-flex justify-content-center"><?php echo $message ?></div>

    <?php
    if ($processForm) { //Si el formulario se ha enviado y se ha validado
        echo "<p>Usuario: $username</p>";
        echo "<p>Contraseña: $password</p>";

        //Link para cerrar sesión
        echo "<a href='ex2.php'>Cerrar sesión</a>";
    } else {
    ?>
        <form action="" method="post" class='w-50 bg-secondary text-white'>
            <div class="mb-3">
                <label for="user" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value=<?php echo $username?>>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" value=<?php echo $password?>>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="savePassword" name="savePassword">
                <label class="form-check">Guardar contraseña</label>
            </div>
            <button type="submit" class="btn btn-primary my-3" name="submitForm">Enviar</button>
        </form>
    <?php
    }
    ?>


</body>

</html>