<?php
// require_once 'lib/myutils.php';
const TEAMS = array("Picapiedras", "Roedores", "Perezosos", "Invisibles", "Legendarios", "Magos", "Sultanes");
const TICKETS_PER_ZONE = 100;
const ZONES = array("A", "B", "C", "D");


function getRatesPerTeam($teamName, $zoneName)
{
    $rates = array();
    echo "<table border='1'>
    <caption>$teamName</caption>
    <tr><th colspan=10>$zoneName</th></tr>";
    echo "<tr>";
    for ($i = 0; $i < 100; $i++) {
        if (substr($i, -1) == 0) { //If the last digit is 0
            echo "</tr><tr>";
        } else {
            echo "<td class='cell'>Localidad " . $i + 1 . "</td>";
        }
    }
    echo "</tr>";
    echo "</table>";



    return $rates;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .cell {
            padding: 10px;
        }
    </style>
    <title>Document</title>
</head>

<body>
<?php
    getRatesPerTeam("Roedores", "Zona A");
?>
    </body>

</html>