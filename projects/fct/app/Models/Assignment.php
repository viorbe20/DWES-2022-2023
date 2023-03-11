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

    public function updataDateAndEvaluation(){
        $this->query = "UPDATE assignments SET 
        eval_student = :eval_student,
        eval_teacher = :eval_teacher,
        date_start = :date_start,
        date_end = :date_end,
        updated_at = :updated_at
        WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['eval_student'] = $this->eval_student;
        $this->parametros['eval_teacher'] = $this->eval_teacher;
        $this->parametros['date_start'] = $this->date_start;
        $this->parametros['date_end'] = $this->date_end;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->get_results_from_query();
    }

    public function getCompleteAssignments()
    {
        $this->query = "SELECT 
        assignments.id as assignments_id,
        assignments.ayear,
        assignments.group_name, 
        assignments.term,
        assignments.eval_student,
        assignments.eval_teacher,
        students.id as students_id,
        students.name as student_name,
        students.surnames as student_surnames,
        teachers.id as teachers_id,
        teachers.name as teacher_name,
        teachers.surnames as teacher_surnames,
        employees.id as employees_id,
        employees.name as employee_name,
        employees.surnames as employee_surnames,
        companies.id as companies_id,
        companies.name as company_name,
        assignments.date_start,
        assignments.date_end,
        assignments.status
    FROM assignments 
    INNER JOIN students ON assignments.id_student = students.id 
    INNER JOIN teachers ON assignments.id_teacher = teachers.id 
    INNER JOIN employees ON assignments.id_employee = employees.id
    INNER JOIN companies ON employees.company_id_fk = companies.id";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getCompleteAssignmentById()
{
    $this->query = "SELECT 
        assignments.id as assignments_id,
        assignments.ayear,
        assignments.group_name,
        assignments.term,
        assignments.eval_student,
        assignments.eval_teacher,
        students.id as students_id,
        students.name as student_name,
        students.surnames as student_surnames,
        teachers.id as teachers_id,
        teachers.name as teacher_name,
        teachers.surnames as teacher_surnames,
        employees.id as employees_id,
        employees.name as employee_name,
        employees.surnames as employee_surnames,
        companies.id as companies_id,
        companies.name as company_name,
        assignments.date_start,
        assignments.date_end,
        assignments.status
    FROM assignments 
    INNER JOIN students ON assignments.id_student = students.id 
    INNER JOIN teachers ON assignments.id_teacher = teachers.id 
    INNER JOIN employees ON assignments.id_employee = employees.id
    INNER JOIN companies ON employees.company_id_fk = companies.id
    WHERE assignments.id = :id";
    $this->parametros['id'] = $this->id;
    $this->get_results_from_query();
    return $this->rows;
}


    public function set()
    {
        $this->query = "INSERT INTO assignments (id_student, id_teacher, id_employee, ayear, term, group_name, date_start, date_end, eval_student, eval_teacher, status, updated_at, created_at) VALUES (:id_student, :id_teacher, :id_employee, :ayear, :term, :group_name, :date_start, :date_end, :eval_student, :eval_teacher, :status, :updated_at, :created_at)";
        $this->parametros['id_student'] = $this->id_student;
        $this->parametros['id_teacher'] = $this->id_teacher;
        $this->parametros['id_employee'] = $this->id_employee;
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['term'] = $this->term;
        $this->parametros['group_name'] = $this->group_name;
        $this->parametros['date_start'] = $this->date_start;
        $this->parametros['date_end'] = $this->date_end;
        $this->parametros['eval_student'] = $this->eval_student;
        $this->parametros['eval_teacher'] = $this->eval_teacher;
        $this->parametros['status'] = $this->status;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->parametros['created_at'] = $this->created_at;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getCompanyIdByEmployeeId()
    {
        $this->query = "SELECT company_id_fk FROM employees WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }


    public function delete()
    {
        $this->query = "DELETE FROM assignments WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function update()
    {
        $this->query = "UPDATE assignments 
        SET id_student = :id_student, id_teacher = :id_teacher, 
        id_employee = :id_employee, ayear = :ayear, term = :term,
        group_name = :group_name, date_start = :date_start, date_end = :date_end,
        eval_student = :eval_student, eval_teacher = :eval_teacher, status = :status, updated_at = :updated_at
        WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['id_student'] = $this->id_student;
        $this->parametros['id_teacher'] = $this->id_teacher;
        $this->parametros['id_employee'] = $this->id_employee;
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['term'] = $this->term;
        $this->parametros['group_name'] = $this->group_name;
        $this->parametros['date_start'] = $this->date_start;
        $this->parametros['date_end'] = $this->date_end;
        $this->parametros['eval_student'] = $this->eval_student;
        $this->parametros['eval_teacher'] = $this->eval_teacher;
        $this->parametros['status'] = $this->status;
        $this->parametros['updated_at'] = $this->updated_at;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getStudentNameByIdStudent()
    {
        $this->query = "SELECT students.* 
        FROM assignments INNER JOIN students 
        ON assignments.id_student = students.id 
        WHERE assignments.id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllByIdStudentAndAYearAndGroup()
    {
        $this->query = "SELECT * FROM assignments WHERE id_student = :id_student ";
        $this->parametros['id_student'] = $this->id_student;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByIdStudentYearGroup()
    {
        $this->query = "SELECT * FROM assignments WHERE id_student = :id_student AND ayear = :ayear AND group_name = :group_name";
        $this->parametros['id_student'] = $this->id_student;
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['group_name'] = $this->group_name;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllByAyearAndGroup()
    {
        $this->query = "SELECT * FROM assignments WHERE ayear = :ayear AND group_name = :group_name";
        $this->parametros['ayear'] = $this->ayear;
        $this->parametros['group_name'] = $this->group_name;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM assignments";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllActive()
    {
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

    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function setIdStudent($id_student)
    {
        $this->id_student = $id_student;
    }

    public function getIdTeacher()
    {
        return $this->id_teacher;
    }

    public function setIdTeacher($id_teacher)
    {
        $this->id_teacher = $id_teacher;
    }

    public function getIdEmployee()
    {
        return $this->id_employee;
    }

    public function setIdEmployee($id_employee)
    {
        $this->id_employee = $id_employee;
    }

    public function getAyear()
    {
        return $this->ayear;
    }

    public function setAyear($ayear)
    {
        $this->ayear = $ayear;
    }

    public function getTerm()
    {
        return $this->term;
    }

    public function setTerm($term)
    {
        $this->term = $term;
    }

    public function getGroupName()
    {
        return $this->group_name;
    }

    public function setGroupName($group_name)
    {
        $this->group_name = $group_name;
    }

    public function getDateStart()
    {
        return $this->date_start;
    }

    public function setDateStart($date_start)
    {
        $this->date_start = $date_start;
    }

    public function getDateEnd()
    {
        return $this->date_end;
    }

    public function setDateEnd($date_end)
    {
        $this->date_end = $date_end;
    }


    public function getEvalStudent()
    {
        return $this->eval_student;
    }

    public function setEvalStudent($eval_student)
    {
        $this->eval_student = $eval_student;
    }

    public function getEvalTeacher()
    {
        return $this->eval_teacher;
    }

    public function setEvalTeacher($eval_teacher)
    {
        $this->eval_teacher = $eval_teacher;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
