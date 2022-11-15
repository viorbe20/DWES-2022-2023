<?php
// require_once 'lib/myutils.php';
const TEAMS = array("Picapiedras", "Roedores", "Perezosos", "Invisibles", "Legendarios", "Magos", "Sultanes");
const TICKETS_PER_ZONE = 100;
const ZONES = array("A", "B", "C", "D");
const NUMBER_OF_MEMBERS = 25;

//Generates a random number between 0 and number of member
function generateRandomNumber() {
    return rand(0, NUMBER_OF_MEMBERS);
}


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
            $class = "class= free_cell";
            echo "<td $class>Localidad " . $i + 1 . "</td>";
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
        .free_cell {
            padding: 10px;
            text-align: center;
            justify-content: center;
            align-items: center;
            border: 1px solid black;
            background-color: #00C851;
            color: white;
            font-weight: bold;
        }
        .not_free_cell {
            padding: 10px;
            text-align: center;
            justify-content: center;
            align-items: center;
            border: 1px solid black;
            background-color: #ff4444;
            color: white;
            font-weight: bold;
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