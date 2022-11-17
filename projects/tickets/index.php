<?php
require_once 'config/config.php';
require_once 'lib/myutils.php';

//Start session
session_start();

//Array with random numbers from 1 to capacity as much as members
if (!isset($_SESSION['membersSeats'])) {
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


//var_dump($_SESSION['membersSeats']);
$processForm = False;
$seatsPerZone = CAPACITY / count($zones);
$selectedTeam = false;
$selectedZone = false;
$selectedTickets = false;



if (isset($_POST['btn_login'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {

        if($_POST['username'] == "admin") {
            $_SESSION['username'] = $_POST['username']; 
        }

        if($_POST['password'] == "admin") {
            $_SESSION['password'] = $_POST['password']; 
        }

        if(isset($_POST['username']) && isset($_POST['password'])) {
            $processForm = true;
        }
    }
}

if (isset($_POST['btn_submit'])) {
    if (isset($_POST['ticketSelection']) && isset($_POST['zoneSelection']) && isset($_POST['teamSelection'])) {
        if (isset($_POST['priceSelection'])) {
            $selectedTeam = true;
            $selectedZone = true;
            $selectedTickets = true;
            $zone = $_POST['zoneSelection'];
            $team = $_POST['teamSelection'];
            $tickets = $_POST['ticketSelection'];
            $seatNumberSelection = $_POST['seatNumberSelection'];
            $priceSelection = $_POST['priceSelection'];
        }
    } else if (isset($_POST['teamSelection']) && isset($_POST['zoneSelection'])) {
        $selectedTeam = true;
        $selectedZone = true;
        $zone = $_POST['zoneSelection'];
        $team = $_POST['teamSelection'];
    } else if (isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $team = $_POST['teamSelection'];
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
    <title>Document</title>
</head>


<body>
    <?php
    if (!$processForm) {
    ?>
        <h1 id='h1_login'>Equipo Pokemons</h1>
        <form action="" method="post" id="form_login">
            <div class="form-group">
                <label for="username" class="col-sm-2 col-form-label">Usuario</label>
                <div>
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                <div>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-2 p-2" name="btn_login" >Log in</button>
        </form>
    <?php
    } else {
    ?>
        <h1>Compra de localidades</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form_2">
            <?php if ($selectedTickets && $selectedZone && $selectedTeam) {
                //Shows a table with the shopping cart
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
                                        <td><?php echo $teamSelection; ?></td>
                                        <td><?php echo $zoneSelection; ?></td>
                                        <td><?php echo $tickets; ?></td>
                                        <td><?php echo $priceSelection; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } else if ($selectedZone && $selectedTeam) {
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
                    <!--Show a table with the selected zone and the tickets status-->
                    <caption>Zona <?php echo $_POST['zoneSelection']; ?></caption>
                    <table class="table">
                        <tr>
                            <th>Localidad</th>
                            <th>Precio</th>
                            <th>Disponibles</th>
                            <th>Seleccionar</th>
                        </tr>
                        <?php
                        //Shows all tickets
                        $seatNumber = 0;
                        for ($i = 1; $i <= $seatsPerZone; $i++) { //Per zone

                            foreach ($zones as $zoneData) {
                                if ($zoneData['zona'] == $_POST['zoneSelection']) {
                                    $seatNumber = $zoneData['primera_localidad'] + $i - 1;
                                    echo "<tr>";
                                    //Shows the seat number
                                    echo "<td>" . $seatNumber . "</td>";
                                    echo "<input type='hidden' name='seatNumberSelection[]' value=" . $seatNumber . ">";

                                    //Shows price
                                    foreach ($rates as $teams) {
                                        if ($teams['equipo'] == $_POST['teamSelection']) {

                                            foreach ($teams['tarifas'] as $data) {
                                                //Only price of zoneSelection
                                                if ($data['zona'] == $_POST['zoneSelection']) {
                                                    echo "<td>" . $data['precio'] . "</td>";
                                                    echo "<input type='hidden' name='priceSelection[]' value=" . $data['precio'] . ">";
                                                }
                                            }
                                        }
                                    }

                                    //Shows available seats
                                    if (in_array($seatNumber, $_SESSION['membersSeats'])) {
                                        echo "<td>NO</td>";
                                    } else {
                                        echo "<td>SI</td>";
                                    }

                                    //Shows checkbox to select the seat
                                    if (in_array($seatNumber, $_SESSION['membersSeats'])) {
                                        echo "<td><input type='checkbox' name='ticketSelection[]' value=" . $seatNumber . " disabled></td>";
                                    } else {
                                        echo "<td><input type='checkbox' name='ticketSelection[]' value=" . $seatNumber . "></td>";
                                    }

                                    echo "</tr>";
                                }
                            }
                        }


                        ?>
                    </table>

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


                <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Continuar</button>
        </form>
    <?php
    }
    ?>
</body>

</html>