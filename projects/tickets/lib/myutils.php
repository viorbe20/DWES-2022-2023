<?php
require_once('..\config\config.php');

function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

function getMembersSeats () {
    $result = array();
    $cont = 0;
    while ($cont < MEMBERS) {
        $random = rand(1, CAPACITY);
        print_r($random);
        if (!in_array($random, $result)) {
            array_push($result, $random);
            $cont++;
        }
    }

    return $result;
}
