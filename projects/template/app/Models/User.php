<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class User extends DBAbstractModel
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
    private $u_id;
    private $u_user;
    private $u_password;
    private $u_email;
    private $u_name;
    private $u_profile;
    private $u_created_at;
    private $u_updated_at;


    //Métodos de acceso
    public function get()
    {
        $this->query = "SELECT * FROM users";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getById()
    {
        $this->query = "SELECT * FROM users WHERE u_id=:u_id";
        $this->parametros['u_id'] = $this->u_id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    //Get user and password and validate it
    public function getByLogin()
    {
        $this->query = "SELECT * FROM users WHERE u_user=:u_user AND u_password=:u_password";
        $this->parametros['u_user'] = $this->u_user;
        $this->parametros['u_password'] = $this->u_password;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    //Creation methods
    public function set()
    {
        $this->query = "INSERT INTO users (u_user, u_password, u_email, u_name, u_profile, u_created_at, u_updated_at) VALUES (:u_user, :u_password, :u_email, :u_name, :u_profile, :u_created_at, :u_updated_at)";
        $this->parametros['u_user'] = $this->u_user;
        $this->parametros['u_password'] = $this->u_password;
        $this->parametros['u_email'] = $this->u_email;
        $this->parametros['u_name'] = $this->u_name;
        $this->parametros['u_profile'] = $this->u_profile;
        $this->parametros['u_created_at'] = $this->u_created_at;
        $this->parametros['u_updated_at'] = $this->u_updated_at;
        $this->get_results_from_query();
    }

    //Métodos de modificación
    public function edit()
    {
        $this->query = "UPDATE users SET u_user=:u_user, u_password=:u_password, u_email=:u_email, u_name=:u_name, u_profile=:u_profile, u_updated_at=CURRENT_TIMESTAMP WHERE u_id=:u_id";
        $this->parametros['u_id'] = $this->u_id;
        $this->parametros['u_user'] = $this->u_user;
        $this->parametros['u_password'] = $this->u_password;
        $this->parametros['u_email'] = $this->u_email;
        $this->parametros['u_name'] = $this->u_name;
        $this->parametros['u_profile'] = $this->u_profile;
        $this->parametros['u_updated_at'] = $this->u_updated_at;
        $this->get_results_from_query();
    }

    //Métodos de eliminación
    public function delete()
    {
        $this->query = "DELETE FROM users WHERE u_id=:u_id";
        $this->parametros['u_id'] = $this->u_id;
        $this->get_results_from_query();
    }



    //Getters & setters
    public function getId()
    {
        return $this->u_id;
    }

    public function setId($u_id)
    {
        $this->u_id = $u_id;
    }

    public function getUser()
    {
        return $this->u_user;
    }

    public function setUser($u_user)
    {
        $this->u_user = $u_user;
    }

    public function getPassword()
    {
        return $this->u_password;
    }

    public function setPassword($u_password)
    {
        $this->u_password = $u_password;
    }

    public function getEmail()
    {
        return $this->u_email;
    }

    public function setEmail($u_email)
    {
        $this->u_email = $u_email;
    }

    public function getName()
    {
        return $this->u_name;
    }

    public function setName($u_name)
    {
        $this->u_name = $u_name;
    }

    public function getProfile()
    {
        return $this->u_profile;
    }

    public function setProfile($u_profile)
    {
        $this->u_profile = $u_profile;
    }

    public function getCreatedAt()
    {
        return $this->u_created_at;
    }

    public function setCreatedAt($u_created_at)
    {
        $this->u_created_at = $u_created_at;
    }

    public function getUpdatedAt()
    {
        return $this->u_updated_at;
    }

    public function setUpdatedAt($u_updated_at)
    {
        $this->u_updated_at = $u_updated_at;
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
