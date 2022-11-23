<?php

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

