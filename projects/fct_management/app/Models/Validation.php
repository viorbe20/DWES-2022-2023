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
