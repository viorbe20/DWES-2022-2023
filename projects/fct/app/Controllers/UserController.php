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
            $assignment->setStatus_fk('baja');
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
