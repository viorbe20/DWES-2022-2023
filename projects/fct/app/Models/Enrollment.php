<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Enrollment extends DBAbstractModel
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

    private $enroll_id;
    private $enroll_id_student;
    private $enroll_id_ayear;
    private $enroll_id_term;
    private $enroll_id_assignment;
    private $enroll_created_at;
    private $enroll_updated_at;

    // Get methods
    public function getAll()
    {
        $this->query = "SELECT * from enrollments order by enrollments.enroll_id desc";
        $this->get_results_from_query();
        return $this->rows;
    }

    //Set methods
    public function set()
    {
        $this -> query = "INSERT INTO enrollments (enroll_id_student, enroll_id_ayear, enroll_id_term, enroll_id_assignment) VALUES (:enroll_id_student, :enroll_id_ayear, :enroll_id_term, :enroll_id_assignment, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $this -> parametros['enroll_id_student'] = $this -> enroll_id_student;
        $this -> parametros['enroll_id_ayear'] = $this -> enroll_id_ayear;
        $this -> parametros['enroll_id_term'] = $this -> enroll_id_term;
        $this -> parametros['enroll_id_assignment'] = $this -> enroll_id_assignment;
        $this -> parametros['enroll_created_at'] = $this -> enroll_created_at;
        $this -> parametros['enroll_updated_at'] = $this -> enroll_updated_at;
        $this -> get_results_from_query();
    }

    public function set2()
    {
        $this -> query = "INSERT INTO enrollments (enroll_id_student) VALUES (:enroll_id_student)";
        $this -> parametros['enroll_id_student'] = $this -> enroll_id_student;
        $this -> get_results_from_query();
    }

    //Getters and setters
    public function getEnrollId()
    {
        return $this->enroll_id;
    }

    public function setEnrollId($enroll_id)
    {
        $this->enroll_id = $enroll_id;
    }

    public function getEnrollIdStudent()
    {
        return $this->enroll_id_student;
    }

    public function setEnrollIdStudent($enroll_id_student)
    {
        $this->enroll_id_student = $enroll_id_student;
    }

    public function getEnrollIdAyear()
    {
        return $this->enroll_id_ayear;
    }

    public function setEnrollIdAyear($enroll_id_ayear)
    {
        $this->enroll_id_ayear = $enroll_id_ayear;
    }

    public function getEnrollIdTerm()
    {
        return $this->enroll_id_term;
    }

    public function setEnrollIdTerm($enroll_id_term)
    {
        $this->enroll_id_term = $enroll_id_term;
    }

    public function getEnrollIdAssignment()
    {
        return $this->enroll_id_assignment;
    }

    public function setEnrollIdAssignment($enroll_id_assignment)
    {
        $this->enroll_id_assignment = $enroll_id_assignment;
    }

    public function getEnrollCreatedAt()
    {
        return $this->enroll_created_at;
    }

    public function setEnrollCreatedAt($enroll_created_at)
    {
        $this->enroll_created_at = $enroll_created_at;
    }

    public function getEnrollUpdatedAt()
    {
        return $this->enroll_updated_at;
    }

    public function setEnrollUpdatedAt($enroll_updated_at)
    {
        $this->enroll_updated_at = $enroll_updated_at;
    }
}
