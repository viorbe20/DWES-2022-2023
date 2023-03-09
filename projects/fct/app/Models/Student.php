<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Student extends DBAbstractModel
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
    private $status;
    private $created_at;
    private $updated_at;

    public function getCompleteNameById(){
        $this->query = "SELECT CONCAT(name, ' ', surnames) AS name FROM students WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set(){
        $this->query = "INSERT INTO students (name, surnames, nif, status, created_at, updated_at) 
        VALUES (:name, :surnames, :nif, :status, :created_at, :updated_at)";
        $this->parametros['name'] = $this->name;
        $this->parametros['surnames'] = $this->surnames;
        $this->parametros['nif'] = $this->nif;
        $this->parametros['status'] = $this->status;
        $this->parametros['created_at'] = $this->created_at;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->get_results_from_query();
    }

    public function getAllActive()
    {
        $this->query = "SELECT * FROM students WHERE status = 'alta' ORDER BY id DESC";
        $this->get_results_from_query();
        return $this->rows;
    }


    public function getById()
    {
        $this->query = "SELECT * FROM students WHERE id = :id";
        $this->parametros['id'] = $this->id;
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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
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
