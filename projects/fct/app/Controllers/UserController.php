<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

use App\Models\User;
use App\Models\Assignment;
use App\Models\Employee;
use App\Models\Company;

class UserController extends BaseController
{
    public function deleteAssignmentStudentAction($request)
    {

        if ($_SESSION['user']['status'] == 'login') {

            $data = array();
            $rest = explode("/", $request);
            $idAssignment = (int)end($rest);
            $assignment = Assignment::getInstancia();
            $assignment->setId($idAssignment);

            foreach ($assignment->getCompleteAssignmentById() as $value) {
                $data['ayear'] = $value['ayear'];
                $data['group_name'] = $value['group_name'];
            }

            $assignment->delete();

            header('Location: ' . DIRBASEURL . "/students/" . $data['ayear'] . "/" . $data['group_name']);
        } else {
            $this->renderHTML('../view/home.php',);
        }
    }
    public function createAssignmentAction($request)
    {
        if ($_SESSION['user']['status'] == 'login') {

            $rest = explode("/", $request);
            $id = (int)end($rest);
            $employee = Employee::getInstancia();
            $employee->setId($id);

            foreach ($employee->getCompanyIdByEmployeeId() as $value) {
                $data['company_id'] = $value['company_id_fk'];
            }

            echo "<script>alert('Asignación cancelada');</script>";
            header('Location: ' . DIRBASEURL . "/companies/employees/" . $data['company_id']);
        } else {
            $this->renderHTML('../view/home.php',);
        }
    }
    public function cancelAssignmentAction($request)
    {
        if ($_SESSION['user']['status'] == 'login') {

            $rest = explode("/", $request);
            $id = (int)end($rest);
            $assignment = Assignment::getInstancia();
            $assignment->setId($id);
            $assignment->setStatus('baja');
            $assignment->changeStatus();

            $employee = Employee::getInstancia();
            foreach ($assignment->getEmployeeId() as $value) {
                $employee->setId($value['id_employee']);
            }

            foreach ($employee->getCompanyIdByEmployeeId() as $value) {
                $data['company_id'] = $value['company_id_fk'];
            }

            echo "<script>alert('Asignación cancelada');</script>";
            header('Location: ' . DIRBASEURL . "/companies/employees/" . $data['company_id']);
        } else {
            $this->renderHTML('../view/home.php',);
        }
    }
}
