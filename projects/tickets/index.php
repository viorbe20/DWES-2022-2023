<?php
require_once 'config/config.php';
require_once 'lib/myutils.php';

//Start session
session_start();

if (isset($_POST['logout'])) {
    unset($_SESSION);
    session_destroy();
    header('http://localhost/dwes/projects/tickets/index.php');
}

//Initialize sessions variables
if (!isset($_SESSION['user']['profile'])) {
    //Always start with a guest profile
    $_SESSION['user']['profile'] = 'guest';

    //Array with random numbers from 1 to capacity as much as members
    $_SESSION['membersSeats'] = array();
    $cont = 0;
    while ($cont < MEMBERS) {
        $random = rand(1, CAPACITY);
        print_r($random);
        if (!in_array($random, $_SESSION['membersSeats'])) {
            array_push($_SESSION['membersSeats'], $random);
            $cont++;
        }
    }
}

$seatsPerZone = CAPACITY / count($zones);
$processForm = False;
$selectedTeam = false;
$selectedZone = false;
$selectedTickets = false;

if (isset($_POST['btn_login'])) {

    //Validate username
    if (isset($_POST['username'])) {

        if ($_POST['username'] == "admin") {
            $_SESSION['user']['username'] = $_POST['username'];
        }
    }

    //Validate password
    if (isset($_POST['password'])) {

        if ($_POST['password'] == "admin") {
            $_SESSION['user']['password'] = $_POST['password'];
        }
    }

    //Process form
    if (isset($_SESSION['user']['username']) && isset($_SESSION['user']['password'])) {
        $processForm = true;
    }
}

if (isset($_POST['btn_submit'])) {
    $processForm = true;
    if (!empty($_POST['ticketSelection']) && isset($_POST['zoneSelection']) && isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $selectedZone = true;
        $selectedTickets = true;
        $zone = $_POST['zoneSelection'];
        $team = $_POST['teamSelection'];
        $tickets = $_POST['ticketSelection'];
        $_SESSION['user']['team'] = $_POST['teamSelection'];
        $_SESSION['user']['zone'] = $_POST['zoneSelection'];
        $_SESSION['user']['tickets'] = $_POST['ticketSelection'];
    } else if (isset($_POST['teamSelection']) && isset($_POST['zoneSelection'])) {
        $selectedTeam = true;
        $selectedZone = true;
        $zone = $_POST['zoneSelection'];
        $team = $_POST['teamSelection'];
        $_SESSION['user']['team'] = $_POST['teamSelection'];
        $_SESSION['user']['zone'] = $_POST['zoneSelection'];
    } else if (isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $team = $_POST['teamSelection'];
        $_SESSION['user']['team'] = $_POST['teamSelection'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./assets/css/bootstrap.min.css">
    <link rel='stylesheet' href="./assets/css/styles.css">
    <title>Pokemos Basket Club</title>
</head>
<body>
    <h1 id='h1_general' class="text-bg-dark p-1 text-center m-0">Pokemons Basket Club</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary d-flex">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="#">Inicio</a>
                    <?php
                    if ($_SESSION['user']['profile'] == 'user') {
                        echo "<a class='nav-link' href=>Venta</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if ($_SESSION['user']['profile'] == 'guest') {
            ?>
            <!--Login form-->
            <form action="" method="post" class='d-flex bg-dark w-100 rounded' id='form-login'>
                <!--User group-->
                <div class="form-group d-flex justify-content-center align-items-center p-1 mx-1">
                    <label for="username" class="text-white">Usuario</label>
                    <div>
                        <input type="text" class="form-control mx-1" name="username">
                    </div>
                </div>
                <!--Password group-->
                <div class="form-group d-flex justify-content-center align-items-center p-1 mx-1">
                    <label for="password" class="text-white">Contraseña</label>
                    <div class="d-flex p-1 justify-content-center align-items-center">
                        <input type="password" class="form-control mx-1" name="password">
                    </div>
                </div>
                <div class= "form-group d-flex justify-content-center align-items-center p-1 mx-1">
                    <button type="submit" class="btn btn-success" name="btn_login">Log in</button>
                </div>
            </form>
        <?php
        }
        ?>
    </nav>
    <!--Nav bar with two options-->
    <?php
    if (!$processForm) { //Shows login form
    ?>
    <?php
    } else { //Success login
    ?>
        <header>
            <div>
                <a href="http://localhost/dwes/projects/tickets/index.php">
                    <button class="btn btn-outline-success" id="btn_back">Atrás</button>
                </a>
            </div>
            <h1>Compra de localidades</h1>
            <div>
                <a href="http://localhost/dwes/projects/tickets/index.php">
                    <button class="btn btn-outline-success" id="btn_logout">Salir</button>
                </a>
            </div>
        </header>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form_2">
            <?php

            if ($selectedTickets && $selectedZone && $selectedTeam) { //Shows shopping cart
                $total = 0;
            ?>
                <div class="container">
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
                </div>
            <?php
            } else if ($selectedZone && $selectedTeam) { //Shows tickets selection
            ?>
                <section>
                    <label>Selecciona un partido</label>
                    <select name="teamSelection">
                        <?php foreach ($teams as $team) {
                            //Shows selected team
                            if ($team == $_POST['teamSelection']) {
                                echo "<option value='$team' selected>$team</option>";
                            } else {
                                echo "<option value='$team'>$team</option>";
                            }
                        }
                        ?>
                    </select>
                </section>

                <!--Radiobutton to select zone-->
                <section id="sec_zone">
                    <label>Selecciona una zona</label>
                    <?php
                    //Shows all zones
                    foreach ($zones as $key => $zoneData) {
                        if ($zoneData['zona'] == $_POST['zoneSelection']) {
                            echo "<input type='radio' name='zoneSelection' value=" . $zoneData['zona'] . " checked>";
                            echo "<label for='zone'" . $zoneData['zona'] . ">Zona " . $zoneData['zona'] . "</label><br>";
                        } else {
                            echo "<input type='radio' name='zoneSelection' value=" . $zoneData['zona'] . ">";
                            echo "<label for='zone'" . $zoneData['zona'] . ">Zona " . $zoneData['zona'] . "</label><br>";
                        }
                    }
                    ?>
                </section>

                <!--Select to select number of tickets-->
                <section id="sec_tickets">
                    <label>Selecciona las entradas</label>
                    <?php

                    //Get zone price
                    foreach ($rates as $teams) {
                        if ($teams['equipo'] == $_POST['teamSelection']) {
                            foreach ($teams['tarifas'] as $data) {
                                //Only price of zoneSelection
                                if ($data['zona'] == $_POST['zoneSelection']) {
                                    $zonePrice = $data['precio'];
                                }
                            }
                        }
                    }

                    //Get first seat number
                    foreach ($zones as $zoneData) {
                        if ($zoneData['zona'] == $_POST['zoneSelection']) {
                            $firstSeat = $zoneData['primera_localidad'];
                        }
                    }
                    $seatNumber = 0;
                    $count = 0;
                    ?>
                    <!--Show view-->
                    <div class='container' id="div_tickets">
                        <?php
                        for ($i = 0; $i < ROWS; $i++) {
                            ?>
                            <div class="row" id='row_tickets'>
                                <?php
                                for ($j = 0; $j < ROWS; $j++) {
                                    $seatNumber = $firstSeat + $count;
                                    echo "<div class='col-1 mb-1 p-0'>";

                                    //Show available seats and selected seats
                                    if (in_array($seatNumber, $_SESSION['membersSeats'])) {
                                        echo "<div class='alert alert-danger' id='card_ticket'>";
                                    } else {
                                        echo "<div class='alert alert-success' id='card_ticket'>";
                                    }
                                    
                                    echo "<p>Localidad ". $seatNumber ."</p>";
                                    echo "<p>Precio: ". $zonePrice ."</p>";
                                    //Available seats show a checkbox
                                    if (!in_array($seatNumber, $_SESSION['membersSeats'])) {
                                        echo "<input type='checkbox' name='ticketSelection[]' value=" . $seatNumber . ">";
                                    } 
                                    echo "</div>";
                                    echo "</div>";
                                    $count++;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                <?php
            } else if ($selectedTeam) {
                ?>
                    <section>
                        <label>Selecciona un partido</label>
                        <select name="teamSelection">
                            <?php foreach ($teams as $team) {
                                //Shows selected team
                                if ($team == $_POST['teamSelection']) {
                                    echo "<option value='$team' selected>$team</option>";
                                } else {
                                    echo "<option value='$team'>$team</option>";
                                }
                            }
                            ?>
                        </select>
                    </section>

                    <!--Radiobutton to select zone-->
                    <section id="sec_zone">
                        <label>Selecciona una zona</label>
                        <?php
                        //Shows all zones
                        foreach ($zones as $key => $zoneData) {
                            echo "<input type='radio' name='zoneSelection' value=" . $zoneData['zona'] . ">";
                            echo "<label for='zone'" . $zoneData['zona'] . ">Zona " . $zoneData['zona'] . "</label><br>";
                        }
                        ?>
                    </section>

                <?php
            } else {
                ?>
                    <section>
                        <label>Selecciona un partido</label>
                        <select name="teamSelection">
                            <?php foreach ($teams as $team) {
                                echo "<option value=$team>$team</option>";
                            }
                            ?>
                        </select>
                    </section>
                <?php
            } ?>
                <?php
                if (!$selectedTickets) {
                ?>
                    <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Continuar</button>
                <?php
                } ?>

        </form>
    <?php
    }
    ?>
</body>

</html>