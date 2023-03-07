<?php

function emptyInput($value, $name)
{
    if (empty($value)) {
        echo "<script>alert('El campo " . $name .  " no puede estar vacío.');</script>";
        return true;
    } else {
        return false;
    }
}


function validatePhone($value)
{
    // Eliminar cualquier carácter no numérico
    $value = preg_replace('/\D/', '', $value);

    if (preg_match("/^[0-9]{9}$/", $value)) {
        return true;
    } else {
        echo "<script>alert('El campo teléfono no es válido.');</script>";
        return false;
    }
}

function validateEmail($email)
{
    $emailFiltrado = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        echo "<script>alert('El campo email no es válido.');</script>";
        return false;
    } else {
        return true;
    }
}

function validateCif($cif)
{
    if (preg_match("/([a-z]|[A-Z]|[0-9])[0-9]{7}([a-z]|[A-Z]|[0-9])$/", $cif)) {
        return true;
    } else {
        echo "<script>alert('El campo CIF no es válido.');</script>";
        return false;
    }
}
