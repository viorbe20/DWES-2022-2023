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
    private $id;
    private $name;
    private $username;
    private $psw;
    private $profile_fk;
    private $status_fk;
    private $created_at;
    private $updated_at;

    public function changeStatus(){
        $this->query = "UPDATE users SET status_fk = :status_fk, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['status_fk'] = $this->status_fk;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->get_results_from_query();
    }

    public function getById(){
        $this->query = "SELECT * FROM users WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function update(){
        $this->query = "UPDATE users SET name = :name, username = :username, psw = :psw, profile_fk = :profile_fk, status_fk = :status_fk, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['name'] = $this->name;
        $this->parametros['username'] = $this->username;
        $this->parametros['psw'] = $this->psw;
        $this->parametros['profile_fk'] = $this->profile_fk;
        $this->parametros['status_fk'] = $this->status_fk;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->get_results_from_query();
    }
    public function delete(){
        $this->query = "DELETE FROM users WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function existingUsername(){
        $this->query = "SELECT username FROM users WHERE username = :username";
        $this->parametros['username'] = $this->username;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByLogin()
    {
        $this->query = "SELECT * FROM users WHERE username = :username AND psw = :psw";
        $this->parametros['username'] = $this->username;
        $this->parametros['psw'] = $this->psw;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO users (name, username, psw, profile_fk, status_fk, created_at, updated_at)
        VALUES (:name, :username, :psw, :profile_fk, :status_fk, CURRENT_TIMESTAMP, :updated_at)";
        $this->parametros['name'] = $this->name;
        $this->parametros['username'] = $this->username;
        $this->parametros['psw'] = $this->psw;
        $this->parametros['profile_fk'] = $this->profile_fk;
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

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPsw()
    {
        return $this->psw;
    }

    public function setPsw($psw)
    {
        $this->psw = $psw;
    }

    public function getProfile()
    {
        return $this->profile_fk;
    }

    public function setProfile($profile_fk)
    {
        $this->profile_fk = $profile_fk;
    }

    public function getStatus()
    {
        return $this->status_fk;
    }

    public function setStatus($status_fk)
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
