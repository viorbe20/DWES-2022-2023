<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Ayear extends DBAbstractModel
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

    private $ayear_id;
    private $ayear_date;

    public function getAll()
    {
        $this->query = "SELECT * from ayears order by ayears.ayear_date desc";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getIdByDate()
    {
        $this->query = "SELECT ayear_id from ayears where ayear_date = :ayear_date";
        $this->parametros['ayear_date'] = $this->ayear_date;
        $this->get_results_from_query();
        return $this->rows;
    }

    //Setters and getters
    public function getAyearId()
    {
        return $this->ayear_id;
    }

    public function setAyearId($ayear_id)
    {
        $this->ayear_id = $ayear_id;
    }

    public function getAyearDate()
    {
        return $this->ayear_date;
    }

    public function setAyearDate($ayear_date)
    {
        $this->ayear_date = $ayear_date;
    }

    

}