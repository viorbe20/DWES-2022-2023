<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Employee extends DBAbstractModel
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
    private $name;
    private $surnames;
    private $nif;
    private $job;
    private $company_id_fk;
    private $status_fk;
    private $created_at;
    private $updated_at;

    //check if there is an assignment with status alta and with the employee id
    public function checkIfEmployeeHasAssignment()
    {
        $this->query = "SELECT a.* FROM assignments a INNER JOIN employees e ON a.id_employee = e.id WHERE e.id = :id AND a.status_fk = 'alta'";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function getAssigmentIdByEmployeeId()
    {
        $this->query = "SELECT a.*
            FROM assignments a
            INNER JOIN employees e ON a.id_employee = e.id
            WHERE e.id = :id AND a.status_fk = 'alta'";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }
    

    public function updateStatus()
    {
        $this->query = "UPDATE employees SET status_fk = :status_fk, updated_at = :updated_at WHERE id = :id";
        $this->parametros['status_fk'] = $this->status_fk;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }
    public function getCompanyIdByEmployeeId()
    {
        $this->query = "SELECT company_id_fk FROM employees WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function getAllActiveByCompanyId()
    {
        $this->query = "SELECT * FROM employees WHERE status_fk = 'alta' AND company_id_fk = :company_id_fk ORDER BY id DESC";
        $this->parametros['company_id_fk'] = $this->company_id_fk;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function existingNif()
    {
        $this->query = "SELECT * FROM employees WHERE nif = :nif";
        $this->parametros['nif'] = $this->nif;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllActive()
    {
        $this->query = "SELECT * FROM employees WHERE status_fk = 'alta' ORDER BY id DESC";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function lastInsert()
    {
        $this->query = "SELECT * FROM employees ORDER BY id DESC LIMIT 1";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO employees (name, surnames, nif, job, company_id_fk, status_fk, created_at, updated_at)) 
        VALUES (:name, :surnames, :nif, :job, :company_id_fk, :status_fk, :created_at, :updated_at)";
        $this->parametros['name'] = $this->name;
        $this->parametros['surnames'] = $this->surnames;
        $this->parametros['nif'] = $this->nif;
        $this->parametros['job'] = $this->job;
        $this->parametros['company_id_fk'] = $this->company_id_fk;
        $this->parametros['status_fk'] = $this->status_fk;
        $this->parametros['created_at'] = $this->created_at;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->get_results_from_query();
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurnames()
    {
        return $this->surnames;
    }

    public function setSurnames($surnames)
    {
        $this->surnames = $surnames;
    }

    public function getNif()
    {
        return $this->nif;
    }

    public function setNif($nif)
    {
        $this->nif = $nif;
    }

    public function getJob()
    {
        return $this->job;
    }

    public function setJob($job)
    {
        $this->job = $job;
    }

    public function getCompany_id_fk()
    {
        return $this->company_id_fk;
    }

    public function setCompany_id_fk($company_id_fk)
    {
        $this->company_id_fk = $company_id_fk;
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
