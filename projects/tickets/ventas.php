<?php
require_once 'config/config.php';
require_once 'lib/myutils.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./assets/css/styles.css">
    <link rel='stylesheet' href="./assets/css/bootstrap.min.css">
    <title>Ventas</title>
</head>

<body>
    <a href="index.php?logout=true">Logout</a>
    <header>
        <h1 id='h1_general' class="text-bg-dark p-1 text-center m-0">Pokemons Basket Club</h1>
    </header>

    <!--Navigation bar-->
    <?php
    require_once 'require/navBar.php';
    ?>
    <?php
    echo "<h1>$_SESSION[user][profile]</h1>";
    echo "ventas";
    ?>
</body>

</html>