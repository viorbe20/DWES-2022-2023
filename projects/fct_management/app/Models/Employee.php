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

    //Propiedades del objeto
    private $emp_id;
    private $emp_name;
    private $emp_nif;
    private $emp_job;
    private $emp_company_id;
    private $emp_created_at;
    private $emp_updated_at;


    //Métodos de acceso
    public function get()
    {
        $this->query = "SELECT * FROM employees";
        $this->get_results_from_query();
        return $this->rows;
    }

    //Get last employees
    public function getSome()
    {
        $this->query = "SELECT * FROM employees";
        $this->get_results_from_query();
        //Show last 5 users
        $last = array_slice(array_reverse($this->rows), 0, 5);
        return $last;
    }

    public function getById()
    {
        $this->query = "SELECT * FROM employees WHERE c_id=:c_id";
        $this->parametros['c_id'] = $this->c_id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByName()
    {
        $this->query = "SELECT * FROM employees WHERE c_name LIKE CONCAT('%',:c_name,'%')";
        $this->parametros['c_name'] = $this->c_name;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function lastInsert()
    {
        $this->query = "SELECT * FROM employees ORDER BY c_id DESC LIMIT 1";
        $this->get_results_from_query();
        return $this->rows;
    }

    //Get a company by employee id
    public function getCompanyByEmployee()
    {
        $this->query = "SELECT * FROM employees INNER JOIN companies ON employees.emp_company_id = companies.c_id WHERE emp_id=:emp_id";
        $this->parametros['emp_id'] = $this->emp_id;
        $this->get_results_from_query();
        return $this->rows;
    }

    //Métodos de creación
    public function set()
    {
        $this->query = "INSERT INTO employees (emp_name, emp_nif, emp_job, emp_company_id, emp_created_at, emp_updated_at) VALUES (:emp_name, :emp_nif, :emp_job, :emp_company_id, :emp_created_at, :emp_updated_at)";
        $this->parametros['emp_name'] = $this->emp_name;
        $this->parametros['emp_nif'] = $this->emp_nif;
        $this->parametros['emp_job'] = $this->emp_job;
        $this->parametros['emp_company_id'] = $this->emp_company_id;
        $this->parametros['emp_created_at'] = $this->emp_created_at;
        $this->parametros['emp_updated_at'] = $this->emp_updated_at;
        $this->get_results_from_query();        
    }

    //Métodos de modificación
    public function edit()
    {
        $this->query = "UPDATE employees SET emp_name=:emp_name, emp_nif=:emp_nif, emp_job=:emp_job, emp_company_id=:emp_company_id, emp_updated_at=:emp_updated_at WHERE emp_id=:emp_id";
        $this->parametros['emp_id'] = $this->emp_id;
        $this->parametros['emp_name'] = $this->emp_name;
        $this->parametros['emp_nif'] = $this->emp_nif;
        $this->parametros['emp_job'] = $this->emp_job;
        $this->parametros['emp_company_id'] = $this->emp_company_id;
        $this->parametros['emp_updated_at'] = $this->emp_updated_at;
        $this->get_results_from_query();
    }

    //Métodos de eliminación
    public function delete()
    {
        $this->query = "DELETE FROM employees WHERE c_id=:c_id";
        $this->parametros['c_id'] = $this->c_id;
        $this->get_results_from_query();
    }

    //Getters & setters
    public function getId ()
    {
        return $this->emp_id;
    }

    public function setId ($emp_id)
    {
        $this->emp_id = $emp_id;
    }

    public function getName ()
    {
        return $this->emp_name;
    }

    public function setName ($emp_name)
    {
        $this->emp_name = $emp_name;
    }

    public function getNif ()
    {
        return $this->emp_nif;
    }

    public function setNif ($emp_nif)
    {
        $this->emp_nif = $emp_nif;
    }

    public function getJob ()
    {
        return $this->emp_job;
    }

    public function setJob ($emp_job)
    {
        $this->emp_job = $emp_job;
    }

    public function getCompanyId ()
    {
        return $this->emp_company_id;
    }

    public function setCompanyId ($emp_company_id)
    {
        $this->emp_company_id = $emp_company_id;
    }

    public function getCreatedAt ()
    {
        return $this->emp_created_at;
    }

    public function setCreatedAt ($emp_created_at)
    {
        $this->emp_created_at = $emp_created_at;
    }

    public function getUpdatedAt ()
    {
        return $this->emp_updated_at;
    }

    public function setUpdatedAt ($emp_updated_at)
    {
        $this->emp_updated_at = $emp_updated_at;
    }

    //Métodos que pide la clase para no dar error
    public function getEntity($id)
    {
    }
    public function setEntity()
    {
    }

    public function deleteEntity($id)
    {
    }
    public function editEntity()
    {
    }
}
