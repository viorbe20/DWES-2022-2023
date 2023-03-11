<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Enrollment extends DBAbstractModel
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
    private $student_id;
    private $ayear;
    private $term;
    private $group_name;
    private $status;
    private $updated_at;
    private $created_at;

    public function getTermByStudentIdAnYear()
    {
        $this->query = "SELECT term FROM enrollments WHERE student_id = :student_id AND ayear = :ayear";
        $this->parametros['student_id'] = $this->student_id;
        $this->parametros['ayear'] = $this->ayear;
        $this->get_results_from_query();
        return $this->rows;
    }
    

    public function getAllFromAGroup(){
        $this->query = "SELECT s.*, e.*
        FROM students AS s
        INNER JOIN enrollments AS e ON s.id = e.student_id
        WHERE e.status = 'alta'
        AND e.group_name = :group_name
        AND e.ayear = :ayear
        AND e.term = :term
        ORDER BY e.student_id DESC;
        ";
        $this->parametros['group_name'] = $this->group_name;
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['term'] = $this->term;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllById(){
        $this->query = "SELECT * FROM enrollments WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllByIdStudent(){
        $this->query = "SELECT * FROM enrollments WHERE student_id = :student_id";
        $this->parametros['student_id'] = $this->student_id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getIdCurrentStudentsWithoutAssignment(){
        $this->query = "SELECT s.*, e.*
        FROM students AS s
        INNER JOIN enrollments AS e ON s.id = e.student_id
        WHERE e.status = 'alta'
        AND e.student_id NOT IN (SELECT id_student FROM assignments WHERE status = 'alta')
        AND e.ayear = :ayear
        AND e.term = :term
        AND e.group_name = :group_name
        ORDER BY e.student_id DESC;
        ";
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['term'] = $this->term;
        $this->parametros['group_name'] = $this->group_name;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getIdCurrentStudentsWithtAssignment(){
        $this->query = "SELECT s.*, e.*, a.id AS assignment_id
        FROM students AS s
        INNER JOIN enrollments AS e ON s.id = e.student_id
        INNER JOIN assignments AS a ON s.id = a.id_student
        WHERE e.status = 'alta'
        AND a.status = 'alta'
        AND e.ayear = :ayear
        AND e.term = :term
        AND e.group_name = :group_name
        ORDER BY e.student_id DESC;
        ";
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['term'] = $this->term;
        $this->parametros['group_name'] = $this->group_name;
        $this->get_results_from_query();
        return $this->rows;
    }
    

    public function set(){
        $this->query = "INSERT INTO enrollments (student_id, ayear, term, group_name, status, updated_at, created_at) VALUES (:student_id, :ayear, :term, :group_name, :status, :updated_at, :created_at)";
        $this->parametros['student_id'] = $this->student_id;
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['term'] = $this->term;
        $this->parametros['group_name'] = $this->group_name;
        $this->parametros['status'] = $this->status;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->parametros['created_at'] = $this->created_at;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function getStudentIdByAYearAndGroup(){
        $this->query = "SELECT student_id FROM enrollments WHERE ayear = :ayear AND group_name = :group_name AND status = 'alta'";
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['group_name'] = $this->group_name;
        $this->get_results_from_query();
        return $this->rows;
    }


    public function getAllByAYearAndGroup(){
        $this->query = "SELECT * FROM enrollments WHERE ayear = :ayear AND group_name = :group_name";
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['group_name'] = $this->group_name;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function changeStatus()
    {
        $this->query = "UPDATE enrollments SET status = :status WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['status'] = $this->status;
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


    public function getStudentId(){
        return $this->student_id;
    }

    public function setStudentId($student_id){
        $this->student_id = $student_id;
    }

    public function getAyear(){
        return $this->ayear;
    }

    public function setAyear($ayear){
        $this->ayear = $ayear;
    }

    public function getTerm(){
        return $this->term;
    }

    public function setTerm($term){
        $this->term = $term;
    }

    public function getGroupName(){
        return $this->group_name;
    }

    public function setGroupName($group_name){
        $this->group_name = $group_name;
    }


    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getUpdatedAt(){
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at){
        $this->updated_at = $updated_at;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function setCreatedAt($created_at){
        $this->created_at = $created_at;
    }
}
