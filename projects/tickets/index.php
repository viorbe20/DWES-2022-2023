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

$seatsPerZone = CAPACITY / count($zones);
$selectedTeam = false;
$selectedZone = false;
$selectedTickets = false;

if (isset($_POST['btn_submit'])) {
    if (isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $team = $_POST['teamSelection'];
    } else if (isset($_POST['teamSelection']) && isset($_POST['zoneSelection'])) {
        $selectedTeam = true;
        $selectedZone = true;
        $zone = $_POST['zoneSelection'];
        $team = $_POST['teamSelection'];
    } else if (isset($_POST['ticketSelection']) && isset($_POST['zoneSelection']) && isset($_POST['teamSelection'])) {
    }
}

if (isset($_POST['btn_submit'])) {
    if (isset($_POST['ticketSelection']) && isset($_POST['zoneSelection']) && isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $selectedZone = true;
        $selectedTickets = true;
        $zone = $_POST['zoneSelection'];
        $team = $_POST['teamSelection'];
        $tickets = $_POST['ticketSelection'];
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
    <h1>Compra de localidades</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <?php if ($selectedTickets && $selectedZone && $selectedTeam) {
            echo ('muestra el formulario de pago');
        } else if ($selectedZone && $selectedTeam) {
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
                <table>
                    <caption>Zona <?php echo $_POST['zoneSelection']; ?></caption>
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
                                $seatNumber = $zoneData['primera_localidad'] + $i-1;
                                echo "<tr>";
                                echo "<td>" . $seatNumber . "</td>";
                                echo "<td>" . $seatNumber . "</td>";
                                echo "<td>" . $seatNumber . "</td>";
                                echo "<td>" . $seatNumber . "</td>";
                                echo "</tr>";
                            }
                    }

                        // if ($ticketData['zona'] == $_POST['zoneSelection']) {
                        //     echo "<tr>";
                        //     echo "<td>" . $ticketData['localidad'] . "</td>";
                        //     echo "<td>" . $ticketData['precio'] . "</td>";
                        //     echo "<td>" . $ticketData['disponibles'] . "</td>";
                        //     echo "<td><input type='checkbox' name='ticketSelection[]' value=" . $ticketData['localidad'] . "></td>";
                        //     echo "</tr>";
                        // }
                    }
                    ?>


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
</body>

</html>