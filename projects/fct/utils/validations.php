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

function validateNif($nif)
{
    // Eliminar espacios en blanco y guiones
    $nif = str_replace(array(' ', '-'), '', $nif);
    
    // Comprobar longitud y formato
    if (preg_match('/^[0-9]{8}[A-Za-z]$/', $nif)) {
        // Comprobar letra de control
        $numero = substr($nif, 0, 8);
        $letra = substr($nif, -1);
        $letra_correcta = substr('TRWAGMYFPDXBNJZSQVHLCKE', $numero % 23, 1);
        if (strtoupper($letra) == $letra_correcta) {
            // Si la última letra es minúscula, convertirla a mayúscula
            if (ctype_lower($letra)) {
                $letra = strtoupper($letra);
                $nif = substr($nif, 0, -1) . $letra;
            }
            return true;
        }
    }

    // Si el NIF no es válido, mostrar mensaje de error
    echo "<script>alert('El campo NIF no es válido.');</script>";
    return false;
}


