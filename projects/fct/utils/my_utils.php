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

function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getCurrentDate () {
    return date('d-m-Y', time());

}

function getCurrentHour () {
    return date('h:i a', time());
}

