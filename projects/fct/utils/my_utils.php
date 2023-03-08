<?php

function getCurrentTerm()
{
    $currentDate = date("m-d");
    $term = "";

    if ($currentDate >= "01-01" && $currentDate <= "06-30") {
        $term = "marzo-junio";
    } else { //From january to august
        $term = "septiembre-diciembre";
    }

    return $term;
}
function getCurrentAcademicYear() {
    $currentDate = date("m-d");
    
    if ($currentDate >= "09-01" && $currentDate <= "12-31") {
        $ayear = date("Y") . "-" . date("Y", strtotime("+1 year"));
    } else { //From january to august
        $ayear = date("Y", strtotime("-1 year")) . "-" . date("Y");
    }

    return $ayear;

}
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