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

    public function unassignAction($request)
    {
        if (($_SESSION['user']['status']) == 'login') {

            $data = array();
            $rest = explode("/", $request);
            $last = explode("_", end($rest));
            $employee = Employee::getInstancia();
            $assignment = Assignment::getInstancia();
            $assignment->setId((int)$last[0]);
            $assignment->delete();

            $employee->setId((int)$last[1]);
            foreach ($employee->getById() as $value) {
                $companyId = $value['company_id_fk'];
            }

            header('Location: ' . DIRBASEURL . "/companies/company_profile/" . $companyId);
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
            
            
            foreach ($employee->getById() as  $value) {
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
            $data['students']['not_assigned'] = $enrollment->getStudentsNoAssignment();

            //Create assignment button
            //Save new assignment
            if (isset($_POST['btn_save_assignment'])) {

                $validateCompany = false;
                $validateEmployee = false;

                if (!isset($_POST['company'])) {
                    echo '<script>alert("Debes seleccionar una empresa existente.")</script>';
                    $this->renderHTML('../view/assignments.php', $data);
                } else {
                    $validateCompany = true;
                    if (!isset($_POST['employee'])) {
                        echo '<script>alert("Debes seleccionar un empleado.")</script>';
                        $this->renderHTML('../view/assignments.php', $data);
                    } else {
                        $validateEmployee = true;
                    }
                }

                if ($validateCompany && $validateEmployee) {
                    $assignment = Assignment::getInstancia();
                    $assignment->setIdStudent(clearData($_POST['student_id']));
                    $assignment->setIdTeacher(clearData($_POST['teacher']));
                    $assignment->setIdEmployee($idEmployee);
                    $assignment->setAyear(getCurrentAcademicYear());
                    $assignment->setTerm(getCurrentTerm());
                    
                    //Get term
                    $enrollment = Enrollment::getInstancia();
                    $enrollment->setStudentId($assignment->getIdStudent());
                    $enrollment->setAYear($assignment->getAyear());

                    foreach ($enrollment->getGroupByStudentIdAndYear() as $value) {
                        $assignment->setGroupName($value['group_name']);
                    }
                    
                    $assignment->setDateStart($_POST['start_date']);
                    $assignment->setDateEnd($_POST['end_date']);
                    $assignment->setEvalStudent($_POST['eval_student']);
                    $assignment->setEvalTeacher($_POST['eval_teacher']);
                    $assignment->setStatus('alta');
                    $assignment->setCreatedAt(date('Y-m-d H:i:s'));
                    $assignment->setUpdatedAt(date('Y-m-d H:i:s'));
                    $assignment->set();

                    header('Location: ' . DIRBASEURL . '/companies/company_profile/' . $data['employee']['company_id']);
                }
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
