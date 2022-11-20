<?php
require_once 'config/config.php';
require_once 'lib/myutils.php';


//Recuperate session variables
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
        <?php

                foreach ($_SESSION['cart']['purchase'] as $key => $value) {
                    var_dump($value);
                    print('</br>');
                }
        $total = 0;
            ?>
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Equipo Rival</th>
                                        <th scope="col">Zona</th>
                                        <th scope="col">Localidad</th>
                                        <th scope="col">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for ($i = 0; $i < count($_SESSION['user']['tickets']); $i++) {

                                            echo "<td>" . $_SESSION['user']['team'] . "</td>";
                                            echo "<td>" . $_SESSION['user']['zone'] . "</td>";
                                            echo "<td>" . $_SESSION['user']['tickets'][$i] . "</td>";

                                            //Get price through the zone
                                            foreach ($rates as $key => $team) {
                                                if ($team['equipo'] == $_SESSION['user']['team']) {
                                                    foreach ($team['tarifas'] as $key => $values) {
                                                        if ($values['zona'] == $_SESSION['user']['zone']) {
                                                            echo "<td>" . $values['precio'] . "</td>";
                                                            $total = $total +  $values['precio'];
                                                        };
                                                    }
                                                }
                                            }
                                            echo '</tr>';
                                        }
                                        ?>
                                </tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="p-3 bg-secondary text-white">Total</td>
                                    <td class="p-3 bg-secondary text-white"><?php echo $total; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> -->
                </form>
                
                
                </body>
                
                </html>
<?php
}
?>