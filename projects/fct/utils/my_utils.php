<?php
function getCurrentDate() {
    return date('d/m/Y', time());
}
function getCurrentHour24() {
    return date('H:i', time());
}
function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getGreeting() {
    $hour = date('H');

    if ($hour >= 6 && $hour < 12) {
        return "Buenos días";
    } elseif ($hour >= 12 && $hour < 20) {
        return "Buenas tardes";
    } else {
        return "Buenas noches";
    }
}

?>