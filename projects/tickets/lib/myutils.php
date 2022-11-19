<?php

function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

function getMembersSeats ($membersNumber, $capacity) {
    $result = array();
    $cont = 0;
    while ($cont < $membersNumber) {
        $random = rand(1, $capacity);
        print_r($random);
        if (!in_array($random, $result)) {
            array_push($result, $random);
            $cont++;
        }
    }

    return $result;
}

function getCurrentDate () {
    //return date('d-m-Y, h:i a', time());
    return date('d-m-Y', time());

}

function getCurrentHour () {
    return date('h:i a', time());
}
