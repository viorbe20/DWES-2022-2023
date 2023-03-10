<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';
require_once '../utils/validations.php';

use App\Models\Employee;
use App\Models\Assignment;


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

    public function employeeAssignmentsAction()
    {
        if (($_SESSION['user']['status']) == 'login') {

            $data = array();


            $this->renderHTML('../view/assignments.php', $data);
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
