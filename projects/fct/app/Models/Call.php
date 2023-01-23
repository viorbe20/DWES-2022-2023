<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Call extends DBAbstractModel
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
    private $call_id;
    private $call_ayear;
    private $call_term;
    private $call_created_at;
    private $call_updated_at;

    /**
     * Métodos de acceso
     */

    //Get last calls
    public function getSome()
    {
        $this->query = "SELECT * from calls, terms, ayears
        where calls.call_term = terms.term_id
        and calls.call_ayear = ayears.ayear_id
        order by ayears.ayear_date, terms.term_name";
        $this->get_results_from_query();
        $last = array_slice(array_reverse($this->rows), 0, 5);
        return $last;
    }

    /**
     * Getters y Setters
     */
    public function getCallId()
    {
        return $this->call_id;
    }

    public function setCallId($call_id)
    {
        $this->call_id = $call_id;
    }

    public function getCallAyear()
    {
        return $this->call_ayear;
    }

    public function setCallAyear($call_ayear)
    {
        $this->call_ayear = $call_ayear;
    }

    public function getCallTerm()
    {
        return $this->call_term;
    }

    public function setCallTerm($call_term)
    {
        $this->call_term = $call_term;
    }

    public function getCallCreatedAt()
    {
        return $this->call_created_at;
    }

    public function setCallCreatedAt($call_created_at)
    {
        $this->call_created_at = $call_created_at;
    }

    public function getCallUpdatedAt()
    {
        return $this->call_updated_at;
    }

    public function setCallUpdatedAt($call_updated_at)
    {
        $this->call_updated_at = $call_updated_at;
    }
}
