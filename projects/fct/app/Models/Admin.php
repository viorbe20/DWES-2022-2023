<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Admin extends DBAbstractModel
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
    

    public function getAllAYears()
    {
        $this->query = "SELECT * FROM ayears order by ayear desc";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllGroupsNames(){
        $this->query = "SELECT * FROM groups";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllTerms(){
        $this->query = "SELECT * FROM terms";
        $this->get_results_from_query();
        return $this->rows;
    }

}
