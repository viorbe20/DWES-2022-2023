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

    // Check if a call already exists by call_ayear and call_term
    public function getByAyearAndTerm()
    {
        $this->query = "SELECT * from calls where call_ayear = :call_ayear and call_term = :call_term";
        $this->parametros['call_ayear'] = $this->call_ayear;
        $this->parametros['call_term'] = $this->call_term;
        $this->get_results_from_query();
        return $this->rows;
    }

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

    //Get call by id
    public function getById()
    {
        $this->query = "SELECT * from calls, terms, ayears
        where calls.call_term = terms.term_id
        and calls.call_ayear = ayears.ayear_id
        and calls.call_id = :call_id";
        $this->parametros['call_id'] = $this->call_id;
        $this->get_results_from_query();
        return $this->rows;
    }

    //Gel all the assignments of a call
    //Get company name, student name and teacher name
    /**
     * Get the following information tha assignments from a call student´s name, company´s name, teacher´s name
     */
    public function getAssignmentsByCallId()
    {
        $this->query = "SELECT s_name, s_surname1, s_surname2, t_name, t_surname1, t_surname2, c_name from assignments, students, companies, teachers
        where asg_id_student = students.s_id
        and asg_id_company = companies.c_id
        and asg_id_teacher = teachers.t_id
        and asg_id_call = :call_id";
        $this->parametros['call_id'] = $this->call_id;
        $this->get_results_from_query();
        return $this->rows;
    }

    /**
     * Métodos de inserción
     */

    //Create a new call on the database
    public function set()
    {
        $this->query = "INSERT INTO calls (call_ayear, call_term, call_created_at, call_updated_at) VALUES (:call_ayear, :call_term, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $this->parametros['call_ayear'] = $this->call_ayear;
        $this->parametros['call_term'] = $this->call_term;
        $this->parametros['call_created_at'] = $this->call_created_at;
        $this->parametros['call_updated_at'] = $this->call_updated_at;
        $this->get_results_from_query();
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
