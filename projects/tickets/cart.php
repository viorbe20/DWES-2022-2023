<?php
require_once 'config/config.php';
require_once 'lib/myutils.php';


//Recuperate sessions variables
session_start();



//If user is not logged, redirect to login page
if (!isset($_SESSION['user']['profile']) || $_SESSION['user']['profile'] == 'guest') {
    header('location: login.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href="./assets/css/styles.css">
        <link rel='stylesheet' href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <title>Pokemons Basket Club</title>
    </head>

    <body>
        <header>
            <h1 id='h1_general' class="text-bg-dark p-1 text-center m-0">Pokemons Basket Club</h1>
        </header>
        <a href="logout.php">Cerrar sesión</a>

        <!--Navigation bar-->
        <?php
        require_once 'require/navBar.php';
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form_cart">
    
        </form>


    </body>

    </html>
<?php
}
?>