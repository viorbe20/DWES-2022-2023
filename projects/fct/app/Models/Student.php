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

    private $s_id;
    private $s_dni;
    private $s_name;
    private $s_surname1;
    private $s_surname2;
    private $s_email;
    private $s_phone;
    private $s_created_at;
    private $s_updated_at;

    //Métodos de acceso

    /**
     * Get name, surname1 and surname2 from student ordered by surname1
     * @return void
     */
    public function getAll()
    {
        $this->query = "SELECT s_id, s_name, s_surname1, s_surname2 FROM students ORDER BY s_surname1";
        $this->get_results_from_query();
        return $this->rows;
    }
    public function get()
    {
        $this->query = "SELECT * FROM students";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getById()
    {
        $this->query = "SELECT * FROM students WHERE s_id=:s_id";
        $this->parametros['s_id'] = $this->s_id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    //Get last students
    public function getSome()
    {
        $this->query = "SELECT * FROM students";
        $this->get_results_from_query();
        //Show last 5 users
        $last = array_slice(array_reverse($this->rows), 0, 5);
        return $last;
    }

    //Creation methods
    public function uploadFile()
    {
        $this->query = "INSERT INTO students (s_dni, s_name, s_surname1, s_surname2, s_email, s_phone, s_created_at, s_updated_at) VALUES (:s_dni, :s_name, :s_surname1, :s_surname2, :s_email, :s_phone,  CURRENT_TIMESTAMP,  CURRENT_TIMESTAMP)";
        $this->parametros['s_dni'] = $this->s_dni;
        $this->parametros['s_name'] = $this->s_name;
        $this->parametros['s_surname1'] = $this->s_surname1;
        $this->parametros['s_surname2'] = $this->s_surname2;
        $this->parametros['s_email'] = $this->s_email;
        $this->parametros['s_phone'] = $this->s_phone;
        $this->parametros['s_created_at'] = $this->s_created_at;
        $this->parametros['s_updated_at'] = $this->s_updated_at;
        //$this->get_results_from_query();

        //If error in query
        if ($this->rows != 1) {
            $this->mensaje = "Error al insertar";
        } else {
            $this->get_results_from_query();
        }
    }

    //Getters & setters
    public function getId()
    {
        return $this->s_id;
    }

    public function setId($s_id)
    {
        $this->s_id = $s_id;
    }

    public function getDni()
    {
        return $this->s_dni;
    }

    public function setDni($s_dni)
    {
        $this->s_dni = $s_dni;
    }

    public function getName()
    {
        return $this->s_name;
    }

    public function setName($s_name)
    {
        $this->s_name = $s_name;
    }

    public function getSurname1()
    {
        return $this->s_surname1;
    }

    public function setSurname1($s_surname1)
    {
        $this->s_surname1 = $s_surname1;
    }

    public function getSurname2()
    {
        return $this->s_surname2;
    }

    public function setSurname2($s_surname2)
    {
        $this->s_surname2 = $s_surname2;
    }

    public function getEmail()
    {
        return $this->s_email;
    }

    public function setEmail($s_email)
    {
        $this->s_email = $s_email;
    }

    public function getPhone()
    {
        return $this->s_phone;
    }

    public function setPhone($s_phone)
    {
        $this->s_phone = $s_phone;
    }

    public function getCreatedAt()
    {
        return $this->s_created_at;
    }

    public function setCreatedAt($s_created_at)
    {
        $this->s_created_at = $s_created_at;
    }

    public function getUpdatedAt()
    {
        return $this->s_updated_at;
    }

    public function setUpdatedAt($s_updated_at)
    {
        $this->s_updated_at = $s_updated_at;
    }
}
