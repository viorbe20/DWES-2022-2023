<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Company extends DBAbstractModel
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
    private $cif;
    private $description;
    private $address;
    private $email;
    private $phone;
    private $logo;
    private $status_fk;
    private $created_at;
    private $updated_at;

    public function getNameById(){
        $this->query = "SELECT name FROM companies WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function existingCif(){
        $this->query = "SELECT * FROM companies WHERE cif = :cif";
        $this->parametros['cif'] = $this->cif;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function getAllActive(){
        $this->query = "SELECT * FROM companies WHERE status_fk = 'alta' ORDER BY id DESC";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function lastInsert()
    {
        $this->query = "SELECT * FROM companies ORDER BY id DESC LIMIT 1";
        $this->get_results_from_query();
        return $this->rows;
    }
    
    public function insertLogo()
    {
        $this->query = "UPDATE companies SET logo=:logo, updated_at=CURRENT_TIMESTAMP WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->parametros['logo'] = $this->logo;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->get_results_from_query();
    }

    public function set(){
        $this->query = "INSERT INTO companies (name, cif, description, address, email, phone, status_fk, created_at, updated_at) 
        VALUES (:name, :cif, :description, :address, :email, :phone, :status_fk, :created_at, :updated_at)";
        $this->parametros['name'] = $this->name;
        $this->parametros['cif'] = $this->cif;
        $this->parametros['description'] = $this->description;
        $this->parametros['address'] = $this->address;
        $this->parametros['email'] = $this->email;
        $this->parametros['phone'] = $this->phone;
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

    public function getCif()
    {
        return $this->cif;
    }

    public function setCif($cif)
    {
        $this->cif = $cif;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
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
