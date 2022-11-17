<?php
require_once 'config/config.php';
require_once 'lib/myutils.php';

$selectedTeam = false;
$selectedZone = false;
$selectedTickets = false;
echo ($selectedTeam);

if (isset($_POST['btn_submit'])) {
    if (isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $team = $_POST['teamSelection'];
        echo ('holaaaaaaaaaaa');
    } else if (isset($_POST['teamSelection']) && isset($_POST['zoneSelection'])) {
        echo ('holaaaaaaaaaaa'); 
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
        echo ('Ticket selected: ' . $tickets);
    } else if (isset($_POST['teamSelection']) && isset($_POST['zoneSelection'])) {
        $selectedTeam = true;
        $selectedZone = true;
        $zone = $_POST['zoneSelection'];
        $team = $_POST['teamSelection'];
        echo ('Zone selected: ' . $zone); 
    } else if (isset($_POST['teamSelection'])) {
        $selectedTeam = true;
        $team = $_POST['teamSelection'];
        echo ('Equipo seleccionado: ' . $team);
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
            echo "muestra resumen de compra";
        } else if ($selectedZone && $selectedTeam) {
            echo "muestra tickets";
        } else if ($selectedTeam) {
            ?>

            <section>
                <label>Selecciona un partido</label>
                <select name="teamSelection">
                    <?php foreach ($rates as $team => $rate) {
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
                <input type="radio" name="zoneSelection" value="A">
                <label for="zoneA">Zona A</label><br>
                <input type="radio" name="zoneSelection" value="B">
                <label for="zoneB">Zona B</label><br>
                <input type="radio" name="zoneSelection" value="C">
                <label for="zoneC">Zona C</label>
                <input type="radio" name="zoneSelection" value="D">
                <label for="zoneC">Zona D</label>
            </section>

        <?php
        } else {
        ?>
            <section>
                <label>Selecciona un partido</label>
                <select name="teamSelection">
                    <?php foreach ($rates as $team => $rate) {
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