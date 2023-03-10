<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';
require_once '../utils/validations.php';

use App\Models\Employee;
use App\Models\Assignment;
use App\Models\Enrollment;
use App\Models\Teacher;
use App\Models\Admin;
use App\Models\Company;

class EmployeeController extends BaseController
{

    public function unassignAction($request){
        if (($_SESSION['user']['status']) == 'login') {

            $data = array();
            $rest = explode("/", $request);
            $id = (int)end($rest);
            $assignment = Assignment::getInstancia();
            $assignment->setId($id);
            $assignment->delete();
            
            foreach ($assignment->getCompanyIdByEmployeeId() as $value) {
                $companyId = $value['company_id_fk'];
            }
            
            header('Location: ' . DIRBASEURL . "/companies/company_profile/" . $companyId . "");
        } else {
            $this->renderHTML('../view/home.php',);
        }
    }

    public function employeeAssignmentsAction($request)
    {
        if (($_SESSION['user']['status']) == 'login') {

            $data = array();
            $rest = explode("/", $request);
            $idEmployee = (int)end($rest);

            //Get employee's company
            $employee = Employee::getInstancia();
            $employee->setId($idEmployee);

            foreach ($employee->getAllActive() as  $value) {
                $data['employee']['name'] = $value['name'];
                $data['employee']['surnames'] = $value['surnames'];
            }
            
            
            foreach ($employee->getCompanyInfoByEmployeeId() as  $value) {
                $data['employee']['company_id'] = $value['id'];
                $data['employee']['company_name'] = $value['name'];
            }
            
            //Get teachers list
            $teacher = Teacher::getInstancia();
            $data['teachers_list'] = $teacher->getAllActive();

            //Get terms list
            $term = Admin::getInstancia();
            $data['terms_list'] = $term->getAllTerms();
            
            //Select current students with no assignment
            $enrollment = Enrollment::getInstancia();
            $enrollment->setAyear(getCurrentAcademicYear());
            $enrollment->setTerm(getCurrentTerm());
            $data['students']['not_assigned'] = $enrollment->getIdCurrentStudentsWithoutAssignment();

            //Create assignment button
            if (isset($_POST['btn_create_assignment'])) {
                //array(11) { ["student_select"]=> string(2) "26" 
                    //["teacher"]=> string(1) "4" ["company"]=> string(9) "W3Schools" 
                    //["employee"]=> string(25) "Federico González Pérez" 
                    //["academic_year"]=> string(9) "2022-2023" ["term"]=> string(11) "marzo-junio" 
                    //["start_date"]=> string(0) "" ["end_date"]=> string(0) "" 
                    //["eval_student"]=> string(0) "" ["eval_teacher"]=> string(0) "" ["btn_create_assignment"]=> string(0) "" }
                $assignment = Assignment::getInstancia();
                $enrollment->setId(clearData($_POST['enrollment_id']));

                foreach ($enrollment->getAllById() as $value) {
                    $assignment->setIdStudent($value['student_id']);
                    $assignment->setGroupName($value['group_name']);
                }

                $assignment->setIdTeacher(clearData($_POST['teacher']));
                $assignment->setIdEmployee($idEmployee);
                $assignment->setAyear(clearData($_POST['academic_year']));
                $assignment->setTerm(clearData($_POST['term']));
                $assignment->setDateStart(clearData($_POST['start_date']));
                $assignment->setDateEnd(clearData($_POST['end_date']));
                $assignment->setEvalStudent(clearData($_POST['eval_student']));
                $assignment->setEvalTeacher(clearData($_POST['eval_teacher']));
                $assignment->setStatus('alta');
                $assignment->setUpdatedAt(date("Y-m-d H:i:s"));
                $assignment->setCreatedAt(date("Y-m-d H:i:s"));
                $assignment->set();

                header('Location: ' . DIRBASEURL . "/companies/company_profile/" .  $data['employee']['company_id'] . "");

            } else { //By default, show the view
                $this->renderHTML('../view/assignments.php', $data);
            }

        } else {
            $this->renderHTML('../view/home.php',);
        }
    }

    public function deleteEmployeeAction($request)
    {

        if ($_SESSION['user']['status'] == 'login') {

            $data = array();
            $rest = explode("/", $request);
            $id = (int)end($rest);
            $employee = Employee::getInstancia();
            $employee->setId($id);
            $employee->setStatus_fk('baja');
            $employee->updateStatus();

            foreach ($employee->getCompanyIdByEmployeeId() as $value) {
                $data['company_id'] = $value['company_id_fk'];
            }

            if ($employee->checkIfEmployeeHasAssignment() != null) {
                echo "El empleado tiene asignaciones, no se puede eliminar";
            } else {
                header('Location: ' . DIRBASEURL . "/companies/employees/" . $data['company_id'] . "");
            }
        } else {
            $this->renderHTML('../view/home.php',);
        }
    }

    public function editEmployeeAction($request)
    {
        if ($_SESSION['user']['status'] == 'login') {

            $data = array();
            $rest = explode("/", $request);
            $id = (int)end($rest);
            $employee = Employee::getInstancia();
            $employee->setId($id);

            if ($employee->getById() != null) {

                foreach ($employee->getById() as $value) {
                    $data['employee']['name'] = $value['name'];
                    $data['employee']['surnames'] = $value['surnames'];
                    $data['employee']['nif'] = $value['nif'];
                    $data['employee']['job'] = $value['job'];
                }
            }

            if (isset($_POST['btn_save_employee'])) {
                //Validations
                $validateName = false;
                $validateSurnames = false;
                $validateNif = false;
                $validateJob = false;

                if (!empty(clearData($_POST['name']))) {
                    $validateName = true;
                    $data['employee']['name'] = clearData($_POST['name']);
                }

                if (!empty(clearData($_POST['surnames']))) {
                    $validateSurnames = true;
                    $data['employee']['surnames'] = clearData($_POST['surnames']);
                }

                if (!empty(clearData($_POST['nif']))) {

                    if (validateNif($_POST['nif'])) {
                        $validateNif = true;
                        $data['employee']['nif'] = clearData($_POST['nif']);
                    }
                }

                if (!empty(clearData($_POST['job']))) {
                    $validateJob = true;
                    $data['employee']['job'] = clearData($_POST['job']);
                }

                if ($validateName && $validateSurnames && $validateNif && $validateJob) {
                    $employee->setName($data['employee']['name']);
                    $employee->setSurnames($data['employee']['surnames']);
                    $employee->setNif($data['employee']['nif']);
                    $employee->setJob($data['employee']['job']);
                    $employee->update();

                    foreach ($employee->getCompanyIdByEmployeeId() as $value) {
                        $data['company_id'] = $value['company_id_fk'];
                    }

                    header('Location: ' . DIRBASEURL . "/companies/company_profile/" . $data['company_id'] . "");
                } else {
                    $this->renderHTML('../view/profile_employee.php', $data);
                }
            } else { //By default, render the view
                $this->renderHTML('../view/profile_employee.php', $data);
            }
        } else {
            $this->renderHTML('../view/home.php',);
        }
    }
}
