<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Validation extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    /*FIN DE LA CONSTRUCCIÓN DEL MODELO SINGLETON*/

    //Propiedades del objeto
    private $id;

    //Validate phone-number
    public function validatePhone($phone)
    {
        if (empty($phone)) {
            $data['phoneError'] = "El teléfono es obligatorio";
        } elseif (!preg_match("/^[0-9]{9}$/", $phone)) {
            $data['phoneError'] = "El teléfono no es válido";
        } else {
            $data['phoneError'] = "";
        }

        return $data['phoneError'];
    }

    //Validate company name
    public function validateName($name)
    {
        if (empty($name)) {
            $data['nameError'] = "El nombre es obligatorio";
        } elseif (!preg_match("/^[a-zA-Z-'üñÜÑ ]*$/", $name)) {
            $data['nameError'] = "Solo letras y espacios en blanco.";
        } else {
            $data['nameError'] = "";
        }
        return $data['nameError'];
    }

    function cifValidation($cif)
    {
        $cif = strtoupper($cif);

        if (preg_match('~(^[XYZ\d]\d{7})([TRWAGMYFPDXBNJZSQVHLCKE]$)~', $cif, $parts)) {
            $control = 'TRWAGMYFPDXBNJZSQVHLCKE';
            $nie = array('X', 'Y', 'Z');
            $parts[1] = str_replace(array_values($nie), array_keys($nie), $parts[1]);
            $cheksum = substr($control, $parts[1] % 23, 1);
            return ($parts[2] == $cheksum);
        } elseif (preg_match('~(^[ABCDEFGHIJKLMUV])(\d{7})(\d$)~', $cif, $parts)) {
            $checksum = 0;
            foreach (str_split($parts[2]) as $pos => $val) {
                $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
            }
            $checksum = ((10 - ($checksum % 10)) % 10);
            return ($parts[3] == $checksum);
        } elseif (preg_match('~(^[KLMNPQRSW])(\d{7})([JABCDEFGHI]$)~', $cif, $parts)) {
            $control = 'JABCDEFGHI';
            $checksum = 0;
            foreach (str_split($parts[2]) as $pos => $val) {
                $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
            }
            $checksum = substr($control, ((10 - ($checksum % 10)) % 10), 1);
            return ($parts[3] == $checksum);
        }
        return false;
    }

    //Validate company cif
    public function validateCif($cif)
    {
        $cifResult = $this->cifValidation($cif);

        if (empty($cif)) {
            $data['cifError'] = "El CIF es obligatorio";
        } elseif ($cifResult != 1) {
            $data['cifError'] = "El CIF no es válido";
        } else {
            $data['cifError'] = "";
        }
        return $data['cifError'];
    }

    //Métodos que pide la clase para no dar error
    public function get()
    {
    }
    public function set()
    {
    }
    public function edit()
    {
    }
    public function delete()
    {
    }
    public function getEntity($id)
    {
    }
    public function setEntity()
    {
    }
    public function deleteEntity($id)
    {
    }
    public function editEntity()
    {
    }
}
