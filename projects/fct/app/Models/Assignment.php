<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Assignment extends DBAbstractModel
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

    private $asg_id;
    private $asg_id_call;
    private $asg_id_company;
    private $asg_id_student;
    private $asg_id_teacher;
    private $asg_evaluation_student;
    private $asg_evaluation_teacher;
    private $asg_date_start;
    private $asg_date_end;
    private $asg_created_at;
    private $asg_updated_at;
    //Setters and getters
    public function getId()
    {
        return $this->asg_id;
    }

    public function setId($asg_id)
    {
        $this->asg_id = $asg_id;
    }

    public function getIdCall()
    {
        return $this->asg_id_call;
    }

    public function setIdCall($asg_id_call)
    {
        $this->asg_id_call = $asg_id_call;
    }

    public function getIdCompany()
    {
        return $this->asg_id_company;
    }

    public function setIdCompany($asg_id_company)
    {
        $this->asg_id_company = $asg_id_company;
    }

    public function getIdStudent()
    {
        return $this->asg_id_student;
    }

    public function setIdStudent($asg_id_student)
    {
        $this->asg_id_student = $asg_id_student;
    }

    public function getIdTeacher()
    {
        return $this->asg_id_teacher;
    }

    public function setIdTeacher($asg_id_teacher)
    {
        $this->asg_id_teacher = $asg_id_teacher;
    }

    public function getEvaluationStudent()
    {
        return $this->asg_evaluation_student;
    }

    public function setEvaluationStudent($asg_evaluation_student)
    {
        $this->asg_evaluation_student = $asg_evaluation_student;
    }

    public function getEvaluationTeacher()
    {
        return $this->asg_evaluation_teacher;
    }

    public function setEvaluationTeacher($asg_evaluation_teacher)
    {
        $this->asg_evaluation_teacher = $asg_evaluation_teacher;
    }

    public function getDateStart()
    {
        return $this->asg_date_start;
    }

    public function setDateStart($asg_date_start)
    {
        $this->asg_date_start = $asg_date_start;
    }

    public function getDateEnd()
    {
        return $this->asg_date_end;
    }

    public function setDateEnd($asg_date_end)
    {
        $this->asg_date_end = $asg_date_end;
    }

    public function getCreatedAt()
    {
        return $this->asg_created_at;
    }

    public function setCreatedAt($asg_created_at)
    {
        $this->asg_created_at = $asg_created_at;
    }

    public function getUpdatedAt()
    {
        return $this->asg_updated_at;
    }

    public function setUpdatedAt($asg_updated_at)
    {
        $this->asg_updated_at = $asg_updated_at;
    }

    


}