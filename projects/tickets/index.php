<?php
require_once 'config/config.php';
require_once 'lib/myutils.php';

//Initialize sessions variables
if (!isset($_SESSION['user']['profile'])) {
    session_start();

    //Always start with a guest profile
    $_SESSION['user']['profile'] = 'guest';

    //Array with random numbers from 1 to capacity as much as members
    $_SESSION['membersSeats'] = getMembersSeats(MEMBERS, CAPACITY);
}



$msgError = "";
$usernameValidation = false;
$passwordValidation = false;
$processForm = false;

//Login form processing
if (isset($_POST['btn_login'])) {

    //Validate username
    if (isset($_POST['username'])) {
        if (clearData($_POST['username']) == "user1") {
            $_SESSION['user']['username'] = $_POST['username'];
            $msgError = "";
            $usernameValidation = true;
        } else {
            $msgError = "Credenciales no válidas";
        }
    } else {
        $msgError = "Credenciales no válidas";
    }

    //Validate password
    if (isset($_POST['password'])) {
        if (clearData($_POST['password']) == "user1") {
            $_SESSION['user']['password'] = $_POST['password'];
            $msgError = "";
            $passwordValidation = true;
        } else {
            $msgError = "Credenciales no válidas";
        }
    } else {
        $msgError = "Credenciales no válidas";
    }


    //Process form
    if ($usernameValidation && $passwordValidation) {
        $processForm = true;
        $_SESSION['user']['profile'] = "user";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./assets/css/styles.css">
    <link rel='stylesheet' href="./assets/css/bootstrap.min.css">
    <title>Pokemos Basket Club</title>
</head>

<body>
    <!--Link that destroys session and header to the index.php-->
    <a href="index.php?logout=true">Logout</a>
    <header>
        <h1 id='h1_general' class="text-bg-dark p-1 text-center m-0">Pokemons Basket Club</h1>
    </header>

    <!--Navigation bar-->
    <?php
    require_once 'require/navBar.php';
    ?>
    <span id="msgError"><?php echo $msgError; ?></span>

    <!--Basket video-->
    <section id="section_video">
        <iframe width="300" height="200" src="https://www.youtube.com/embed/CXLM08fZO5o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </section>

    <?php
    if ($processForm) { //Success login
        echo "<h1>Success login</h1>";
    }
    ?>
</body>

</html>