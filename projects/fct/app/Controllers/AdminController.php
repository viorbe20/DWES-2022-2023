<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

use App\Models\Company;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Assignment;


class AdminController extends BaseController
{

    public function jqCompleteAssignments(){
        if ($_SESSION['user']['profile'] == 'admin') {
            $assignment = new Assignment();
            echo json_encode($assignment->getCompleteAssignments());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function jqStudentsAction()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $student = new Student();
            echo json_encode($student->getAllActive());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }
    
    public function jqEmployeesAction()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $employee = new Employee();
            echo json_encode($employee->getAllActive());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function jqCompaniesAction()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $company = new Company();
            echo json_encode($company->getAllActive());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }


}
