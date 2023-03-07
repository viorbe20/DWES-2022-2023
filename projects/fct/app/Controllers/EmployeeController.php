<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

use App\Models\User;
use App\Models\Employee;


class EmployeeController extends BaseController
{

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


            header('Location: ' . DIRBASEURL . "/companies/employees/" . $data['company_id'] . "");
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

            foreach ($employee->getCompanyIdByEmployeeId() as $value) {
                $data['company_id'] = $value['company_id_fk'];
            }


            header('Location: ' . DIRBASEURL . "/companies/employees/" . $data['company_id'] . "");
        } else {
            $this->renderHTML('../view/home.php',);
        }
    }
}
