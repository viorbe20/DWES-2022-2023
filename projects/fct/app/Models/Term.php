<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Term extends DBAbstractModel
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

    private $term_id;
    private $term_name;

    public function getAll()
    {
        $this->query = "SELECT * from terms order by terms.term_name";
        $this->get_results_from_query();
        return $this->rows;
    }

}