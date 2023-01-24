<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Teacher extends DBAbstractModel
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

    private $t_id;
    private $t_dni;
    private $t_name;
    private $t_surname1;
    private $t_surname2;
    private $t_email;
    private $t_phone;
    private $t_created_at;
    private $t_updated_at;

    //Métodos de acceso

    /**
     * Get name, surname1 and surname2 f
     * @return void
     */
    public function getAll()
    {
        $this->query = "SELECT t_id, t_name, t_surname1, t_surname2 FROM teachers";
        $this->get_results_from_query();
        return $this->rows;
    }
}