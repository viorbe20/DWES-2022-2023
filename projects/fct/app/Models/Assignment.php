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
    private $id;
    private $id_student;
    private $id_employee;
    private $status_fk;
    private $created_at;
    private $updated_at;

    public function getEmployeeId()
    {
        $this->query = "SELECT id_employee FROM assignments WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function changeStatus()
    {
        $this->query = "UPDATE assignments SET status_fk = :status_fk WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['status_fk'] = $this->status_fk;
        $this->get_results_from_query();
        return $this->rows;
    }
    
    //Getters & setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId_student()
    {
        return $this->id_student;
    }

    public function setId_student($id_student)
    {
        $this->id_student = $id_student;
    }

    public function getId_employee()
    {
        return $this->id_employee;
    }

    public function setId_employee($id_employee)
    {
        $this->id_employee = $id_employee;
    }

    public function getStatus_fk()
    {
        return $this->status_fk;
    }

    public function setStatus_fk($status_fk)
    {
        $this->status_fk = $status_fk;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
