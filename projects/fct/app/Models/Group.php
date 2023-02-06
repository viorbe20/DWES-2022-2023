<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Group extends DBAbstractModel
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

    private $g_id;
    private $g_name;

    public function getAll()
    {
        $this->query = "SELECT g_name, g_id from groups order by groups.g_name";
        $this->get_results_from_query();
        return $this->rows;
    }

    //Setters and getters
    public function getGroupId()
    {
        return $this->g_id;
    }

    public function setGroupId($g_id)
    {
        $this->g_id = $g_id;
    }

    public function getGroupName()
    {
        return $this->g_name;
    }

    public function setGroupName($g_name)
    {
        $this->g_name = $g_name;
    }
}