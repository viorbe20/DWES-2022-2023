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
    private $enroll_id_group;
    private $enroll_created_at;
    private $enroll_updated_at;

    // Get methods
    public function getAll()
    {
        $this->query = "SELECT * from enrollments order by enrollments.enroll_id desc";
        $this->get_results_from_query();
        return $this->rows;
    }

    /**
     * Get a list of students by group id, academic year and term
     * @return mixed
     */
    public function getStudentsByGroupId()
    {
        $this->query = "SELECT enroll_id, enroll_id_student, s_name, s_surname1, s_surname2, s_id FROM enrollments INNER JOIN students ON enrollments.enroll_id_student = students.s_id WHERE enroll_id_group=:enroll_id_group AND enroll_id_ayear=:enroll_id_ayear AND enroll_id_term=:enroll_id_term";
        $this->parametros['enroll_id_group'] = $this->enroll_id_group;
        $this->parametros['enroll_id_ayear'] = $this->enroll_id_ayear;
        $this->parametros['enroll_id_term'] = $this->enroll_id_term;
        $this->get_results_from_query();
        return $this->rows;
    }

    //Set methods
    public function set()
    {
        $this->query = "INSERT INTO enrollments (enroll_id_student, enroll_id_ayear, enroll_id_term, enroll_id_group, enroll_created_at, enroll_updated_at) VALUES (:enroll_id_student, :enroll_id_ayear, :enroll_id_term, :enroll_id_group, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $this->parametros['enroll_id_student'] = $this->enroll_id_student;
        $this->parametros['enroll_id_ayear'] = $this->enroll_id_ayear;
        $this->parametros['enroll_id_term'] = $this->enroll_id_term;
        $this->parametros['enroll_id_group'] = $this->enroll_id_group;
        $this->parametros['enroll_created_at'] = $this->enroll_created_at;
        $this->parametros['enroll_updated_at'] = $this->enroll_updated_at;
        $this->get_results_from_query();
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

    public function getEnrollIdGroup()
    {
        return $this->enroll_id_group;
    }

    public function setEnrollIdGroup($enroll_id_group)
    {
        $this->enroll_id_group = $enroll_id_group;
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
