<?php
require_once 'config/config.php';
require_once 'lib/myutils.php';


$seatsPerZone = CAPACITY / count($zones);
$selectedTeam = false;
$selectedZone = false;
$selectedTickets = false;

//Recuperate sessions variables
session_start();

//Form processing
if (isset($_POST['btn_submit'])) {
    $processForm = true;
    if (!empty($_POST['ticketSelection']) && isset($_POST['zoneSelection']) && isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $selectedZone = true;
        $selectedTickets = true;
        $_SESSION['user']['team'] = $_POST['teamSelection'];
        $_SESSION['user']['zone'] = $_POST['zoneSelection'];
        $_SESSION['user']['tickets'] = $_POST['ticketSelection'];
    } else if (isset($_POST['teamSelection']) && isset($_POST['zoneSelection'])) {
        $selectedTeam = true;
        $selectedZone = true;
        $_SESSION['user']['team'] = $_POST['teamSelection'];
        $_SESSION['user']['zone'] = $_POST['zoneSelection'];
    } else if (isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $_SESSION['user']['team'] = $_POST['teamSelection'];
    }
}


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

                <!--Show selected zone-->
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

                <!--Checkbox to select number of tickets-->
                <section id="sec_tickets">
                    <label>Selecciona las entradas</label>
                    <?php

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

                                    echo "<p>Localidad " . $seatNumber . "</p>";
                                    
                                    //Get price through the zone
                                    $price = 0;
                                    foreach ($rates as $key => $team) {
                                            if($team['equipo'] == $_SESSION['user']['team']) {
                                                foreach ($team['tarifas'] as $key => $values) {
                                                    if($values['zona'] == $_SESSION['user']['zone']) {
                                                        $price = $values['precio'];
                                                    };
                                                }
                                            }
                                        
                                    }
                                    
                                    echo "<p>Precio: ". $price ."€</p>";
                                
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


    </body>

    </html>
<?php
}
?>