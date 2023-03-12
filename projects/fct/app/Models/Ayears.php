<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Ayears extends DBAbstractModel
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
    private $ayear;


    public function set()
    {
        $this->query = "INSERT INTO ayears (ayear) VALUES (:ayear)";
        $this->parametros['ayear'] = $this->ayear;
        $this->get_results_from_query();
        
    }

    //Getters & setters
    public function getAyear()
    {
        return $this->ayear;
    }

    public function setAyear($ayear)
    {
        $this->ayear = $ayear;
    }

}
