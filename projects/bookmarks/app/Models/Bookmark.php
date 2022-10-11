<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Bookmark extends DBAbstractModel
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
    private $id;
    private $bm_url;
    private $descripcion;
    private $id_usuario;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUrl($bm_url)
    {
        $this->bm_url = $bm_url;
    }

    public function getUrl()
    {
        return $this->bm_url;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getIdusuario()
    {
        return $this->id_usuario;
    }


    public function getAll()
    {
        $this->query = "SELECT * FROM bookmarks";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByUserId()
    {
        $this->query = "SELECT * FROM bookmarks WHERE id_usuario=:id_usuario";
        $this->parametros['id_usuario'] = $this->id_usuario;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getById()
    {
        $this->query = "SELECT * FROM bookmarks WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getUrlByName()
    {
        $this->query = "SELECT * FROM bookmarks WHERE bm_url LIKE :bm_url";
        $this->parametros['bm_url'] = $this->bm_url;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getUserIdByBookmarkId()
    {
        $this->query = "SELECT id_usuario FROM bookmarks WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
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
