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
    private $company_id;
    private $company_cif;
    private $descripcion;
    private $id_usuario;
    private $company_name;
    private $company_description;
    private $company_address;
    private $company_email;
    private $company_phone;
    private $company_logo;
    private $created_at;
    private $updated_at;


    //Métodos de acceso
    public function get_all(){
        $this->query = "SELECT * FROM companies";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function get_by_id()
    {
        $this->query = "SELECT * FROM companies WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }


    //Getters & setters
    public function get_company_id()
    {
        return $this->company_id;
    }

    public function set_company_id($company_id)
    {
        $this->company_id = $company_id;
    }

    public function get_company_cif()
    {
        return $this->company_cif;
    }

    public function set_company_cif($company_cif)
    {
        $this->company_cif = $company_cif;
    }

    public function get_descripcion()
    {
        return $this->descripcion;
    }

    public function set_descripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function get_id_usuario()
    {
        return $this->id_usuario;
    }

    public function set_id_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function get_company_name()
    {
        return $this->company_name;
    }

    public function set_company_name($company_name)
    {
        $this->company_name = $company_name;
    }

    public function get_company_description()
    {
        return $this->company_description;
    }

    public function set_company_description($company_description)
    {
        $this->company_description = $company_description;
    }

    public function get_company_address()
    {
        return $this->company_address;
    }

    public function set_company_address($company_address)
    {
        $this->company_address = $company_address;
    }

    public function get_company_email()
    {
        return $this->company_email;
    }

    public function set_company_email($company_email)
    {
        $this->company_email = $company_email;
    }

    public function get_company_phone()
    {
        return $this->company_phone;
    }

    public function set_company_phone($company_phone)
    {
        $this->company_phone = $company_phone;
    }

    public function get_company_logo()
    {
        return $this->company_logo;
    }

    public function set_company_logo($company_logo)
    {
        $this->company_logo = $company_logo;
    }

    public function get_created_at()
    {
        return $this->created_at;
    }

    public function set_created_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function get_updated_at()
    {
        return $this->updated_at;
    }

    public function set_updated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }





    //Métodos que pide la clase para no dar error
    public function getEntity($id)
    {
    }
    public function setEntity()
    {
        $this->query = "INSERT INTO bookmarks(bm_url, descripcion, id_usuario)
        VALUES(:bm_url, :descripcion, :id_usuario)";
        $this->parametros['bm_url'] = $this->bm_url;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['id_usuario'] = $this->id_usuario;
        $this->get_results_from_query();
    }

    public function deleteById()
    {
        $this->query = "DELETE FROM bookmarks WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function deleteEntity($id)
    {
    }
    public function editEntity()
    {
        $this->query = "UPDATE bookmarks SET bm_url=:bm_url, descripcion=:descripcion WHERE id=:id";
        $this->parametros['bm_url'] = $this->bm_url;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }
    public function set()
    {
    }
    public function get()
    {
    }
    public function delete($user_data = array())
    {
    }
    public function edit()
    {
    }
}
