<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Assignment extends DBAbstractModel
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
    private $id_student;
    private $id_teacher;
    private $id_employee;
    private $ayear;
    private $term;
    private $group_name;
    private $date_start;
    private $date_end;
    private $eval_student;
    private $eval_teacher;
    private $status;
    private $updated_at;
    private $created_at;

    public function getTermNameByTermId(){
        $this->query = "SELECT terms.term FROM assigment INNER JOIN terms 
        ON assigment.term = terms.id WHERE assigment.id = :id";
        $this->parametros['id'] = $this->id;
        return $this->rows;
    }
    public function getAll(){
        $this->query = "SELECT * FROM assignments";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllActive(){
        $this->query = "SELECT * FROM assignments WHERE status = alta";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getEmployeeId()
    {
        $this->query = "SELECT id_employee FROM assignments WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function changeStatus()
    {
        $this->query = "UPDATE assignments SET status = :status WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['status_fk'] = $this->status;
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

    public function getIdStudent(){
        return $this->id_student;
    }

    public function setIdStudent($id_student){
        $this->id_student = $id_student;
    }

    public function getIdTeacher(){
        return $this->id_teacher;
    }

    public function setIdTeacher($id_teacher){
        $this->id_teacher = $id_teacher;
    }

    public function getIdEmployee(){
        return $this->id_employee;
    }

    public function setIdEmployee($id_employee){
        $this->id_employee = $id_employee;
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

    public function getDateStart(){
        return $this->date_start;
    }

    public function setDateStart($date_start){
        $this->date_start = $date_start;
    }

    public function getDateEnd(){
        return $this->date_end;
    }

    public function setDateEnd($date_end){
        $this->date_end = $date_end;
    }


    public function getEvalStudent(){
        return $this->eval_student;
    }

    public function setEvalStudent($eval_student){
        $this->eval_student = $eval_student;
    }

    public function getEvalTeacher(){
        return $this->eval_teacher;
    }

    public function setEvalTeacher($eval_teacher){
        $this->eval_teacher = $eval_teacher;
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
