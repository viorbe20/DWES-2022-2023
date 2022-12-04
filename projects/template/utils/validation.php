<?php

function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function nameValidation($name)
{
    if (empty($name)) {
        return "Los campos no pueden estar vacíos";
    }  else {
        return true;
    }
}

function passwordValidation($password)
{
    if (empty($password)) {
        return "Los campos no pueden estar vacíos";
    }  else {
        return true;
    }
}
