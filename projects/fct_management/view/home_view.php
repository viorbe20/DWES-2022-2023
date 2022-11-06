<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href= "<?php echo DIRFCT;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo DIRFCT;?>/assets/js/login.js"></script>
    <title>Home page</title>
</head>

<body class="d-flex flex-column align-items-center justify-content-center">
    <h1 class="mt-3">Práctica FCT</h1>

    <div class="d-flex align-items-center justify-content-center" style="height: 70vh">
        <form method='post' id="form_login" class="d-flex flex-column px-4 py-3 bg-dark shadow rounded-4" style="width: 30vw">
            <div class="mb-3">
                <label for="user_psw" class="form-label text-light">Nombre de usuario</label>
                <input type="text" class="form-control" name="user_name" id="user_name">
            </div>
            <div class="mb-3">
                <label for="user_psw" class="form-label text-light">Contraseña</label>
                <input type="password" class="form-control" name="user_psw" id="user_psw">
            </div>
            <span class="text-danger" id="login_error_span"></span>
            <div class="mb-3">
            </div>
            <button type="submit" class="btn btn-success" name="btn-login" id="btn-login">Entrar</button>
        </form>
    </div>
</body>

</html>