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

    //Propiedades del objeto
    private $c_id;
    private $c_cif;
    private $c_name;
    private $c_description;
    private $c_address;
    private $c_email;
    private $c_phone;
    private $c_logo;
    private $c_created_at;
    private $c_updated_at;


    //Métodos de acceso
    public function get(){
        $this->query = "SELECT * FROM companies";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getById()
    {
        $this->query = "SELECT * FROM companies WHERE c_id=:c_id";
        $this->parametros['c_id'] = $this->c_id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    //Métodos de creación
    public function set()
    {
        $this->query = "INSERT INTO companies (c_cif, c_name, c_description, c_address, c_email, c_phone, c_logo, c_created_at, c_updated_at) VALUES (:c_cif, :c_name, :c_description, :c_address, :c_email, :c_phone, :c_logo, :c_created_at, :c_updated_at)";
        $this->parametros['c_cif'] = $this->c_cif;
        $this->parametros['c_name'] = $this->c_name;
        $this->parametros['c_description'] = $this->c_description;
        $this->parametros['c_address'] = $this->c_address;
        $this->parametros['c_email'] = $this->c_email;
        $this->parametros['c_phone'] = $this->c_phone;
        $this->parametros['c_logo'] = $this->c_logo;
        $this->parametros['c_created_at'] = $this->c_created_at;
        $this->parametros['c_updated_at'] = $this->c_updated_at;
        $this->get_results_from_query();
        echo $this->mensaje = 'Empresa añadida.';
    }

    //Métodos de modificación
    public function edit()
    {
        $this->query = "UPDATE companies SET company_cif=:company_cif, company_name=:company_name, company_description=:company_description, company_address=:company_address, company_email=:company_email, company_phone=:company_phone, company_logo=:company_logo, updated_at=:updated_at WHERE company_id=:company_id";
        $this->parametros['company_cif'] = $this->company_cif;
        $this->parametros['company_name'] = $this->company_name;
        $this->parametros['company_description'] = $this->company_description;
        $this->parametros['company_address'] = $this->company_address;
        $this->parametros['company_email'] = $this->company_email;
        $this->parametros['company_phone'] = $this->company_phone;
        $this->parametros['company_logo'] = $this->company_logo;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->parametros['company_id'] = $this->company_id;
        $this->get_results_from_query();
        echo $this->mensaje = 'Empresa modificada.';
    }


    //Getters & setters
    public function getId()
    {
        return $this->c_id;
    }

    public function setId($c_id)
    {
        $this->c_id = $c_id;
    }

    public function getCif()
    {
        return $this->c_cif;
    }

    public function setCif($c_cif)
    {
        $this->c_cif = $c_cif;
    }

    public function getName()
    {
        return $this->c_name;
    }

    public function setName($c_name)
    {
        $this->c_name = $c_name;
    }

    public function getDescription()
    {
        return $this->c_description;
    }

    public function setDescription($c_description)
    {
        $this->c_description = $c_description;
    }

    public function getAddress()
    {
        return $this->c_address;
    }

    public function setAddress($c_address)
    {
        $this->c_address = $c_address;
    }

    public function getEmail()
    {
        return $this->c_email;
    }

    public function setEmail($c_email)
    {
        $this->c_email = $c_email;
    }

    public function getPhone()
    {
        return $this->c_phone;
    }

    public function setPhone($c_phone)
    {
        $this->c_phone = $c_phone;
    }

    public function getLogo()
    {
        return $this->c_logo;
    }

    public function setLogo($c_logo)
    {
        $this->c_logo = $c_logo;
    }

    public function getCreatedAt()
    {
        return $this->c_created_at;
    }

    public function setCreatedAt($c_created_at)
    {
        $this->c_created_at = $c_created_at;
    }

    public function getUpdatedAt()
    {
        return $this->c_updated_at;
    }

    public function setUpdatedAt($c_updated_at)
    {
        $this->c_updated_at = $c_updated_at;
    }

    //Métodos que pide la clase para no dar error
    public function getEntity($id)
    {
    }
    public function setEntity()
    {
    }

    public function deleteById()
    {
    }

    public function deleteEntity($id)
    {
    }
    public function editEntity()
    {
    }
    public function delete($user_data = array())
    {
    }
}
