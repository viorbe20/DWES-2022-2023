<?php

namespace App\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use App\Models\Student;

require_once '../app/Config/constantes.php';
require_once '../../fct/utils/my_utils.php';


class DefaultController extends BaseController
{

    public function studentsAction()
    {
        $data = array();
        
        //Uploading csv file with students data
        if (isset($_POST['save_file'])) {
            $this->renderHTML('../view/students.php', $data);
            echo 'File uploaded successfully';
            //echo $_FILES['file']['name'];
            $filename = explode(".", $_FILES['file']['name']);

            //Check if the file is a csv file
            if (end($filename) == 'csv') {
                $handle = fopen($_FILES['file']['tmp_name'], "r");
                while ($data = fgetcsv($handle)) {
                $student = Student::getInstancia();
                $student->setDni($data[0]);
                $student->setName($data[1]);
                $student->setSurname($data[2]);
                $student->setEmail($data[3]);
                $student->setPhone($data[4]);
                }
            }
        } else {
            $this->renderHTML('../view/students.php', $data);
        }
    }

    /**
     * Show employees from a selected company
     */
    public function companyEmployeesAction($request)
    {

        if ($_SESSION['user']['profile'] == 'guest') { //If the user is not logged in
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();
            $company = Company::getInstancia();
            $rest = explode("/", $request);
            $companyId = (int)end($rest);
            $company->setId($companyId);
            $employee = Employee::getInstancia();
            $employee->setCompanyId($companyId);
            $companyName = $company->getById();
            
            foreach ($company->getById() as $key => $value) {
                $companyName = $value['c_name'];
            }
            $data['companyName'] = $companyName;
            
            foreach ($employee->getEmployeesByCompanyId() as $key => $value) {
                $data['employees'][] = $value;
            }
            
            $this->renderHTML('../view/company_employees.php', $data);
        }
    }


    /**
     * Return the list of the last 5 employees
     */
    // public function getEmployeesTableAction()
    // {

    //     if ($_SESSION['user']['profile'] == 'guest') { //If the user is not logged in
    //         $data = array();
    //         $this->renderHTML('../view/home.php', $data);
    //     } else {
    //         $data = array();
    //         $employee = Employee::getInstancia();
    //         echo json_encode($employee->getSome());
    //     }
    // }

    /**
     * Get id from url and delete the company
     */
    public function deleteCompanyAction($request)
    {
        $company = Company::getInstancia();
        $rest = explode("/", $request);
        $companyId = (int)end($rest);
        $company->setId($companyId);
        //$company->delete();
    }

    public function addCompanyAction()
    {
        $data = array();
        $this->renderHTML('../view/company_info.php', $data);
    }

    public function companiesAction()
    {
        $data = array();
        $this->renderHTML('../view/companies.php', $data);
    }

    /**
     * Return the list of the last 5 companies
     */
    public function getCompaniesTableAction()
    {

        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();
            $company = Company::getInstancia();
            echo json_encode($company->getSome());
        }
    }

    public function indexAction()
    {

        $data = array();

        //Validate fields
        if ((isset($_POST['username'])) && (isset($_POST['password']))) {
            $username = clearData($_POST['username']);
            $password = clearData($_POST['password']);

            //If not empty, validate data
            if ($username != "" && $password != "") {
                //Check database
                $user = User::getInstancia();
                $user->setUser($username);
                $user->setPassword($password);
                $result = $user->getByLogin(); //If user exists, $result is an array with user data

                //Session creation with user data
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $_SESSION['user']['profile'] = $value['u_profile'];
                        $_SESSION['user']['id'] = $value['u_id'];
                        $_SESSION['user']['name'] = $value['u_name'];
                        $_SESSION['user']['status'] = 'login';
                        $data['status'] = 'success';
                    }
                } else {
                    error_log("Non existing data");
                    $data['status'] = 'error';
                    $data['message'] = 'Usuario incorrecto';
                }
            }
            echo json_encode($data);
            exit();
        } else {
            $this->renderHTML('../view/home.php', $data);
        }
    }

    public function logoutAction()
    {
        session_start();
        //Empty all session variables
        unset($_SESSION);
        //Close session
        session_destroy();
        //Redirect to home
        header('Location: ' . DIRBASEURL . "/home");
        //header('location: index.php');
    }
}
