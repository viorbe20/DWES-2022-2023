<?php

namespace App\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use App\Models\Student;
use App\Models\Call;
use App\Models\Ayear;
use App\Models\Term;
use App\Models\Teacher;

require_once '../app/Config/constantes.php';
require_once '../../fct/utils/my_utils.php';


class DefaultController extends BaseController
{

    public function addAssignmentAction()
    {
        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();            
            $data['current_ayear'] = getCurrentAcademicYear();
            $data['current_term'] = getCurrentTerm();
            
            //Get academic years list
            $ayear = Ayear::getInstancia();
            $ayear->getAll();
            foreach ($ayear->getAll() as $value) {
                $data['ayear_list'][] = $value['ayear_date'];
            }

            //Get terms list
            $term = Term::getInstancia();
            $term->getAll();
            foreach ($term->getAll() as $value) {
                $data['term_list'][] = $value['term_name'];
            }

            //Get students list
            $student = Student::getInstancia();
            foreach ($student->getAll() as $value) {
                $data['student_list'][] =  $value['s_surname1'] . " " . $value['s_surname2'] . ", " . $value['s_name'];
            }

            //Get teachers list
            $teacher = Teacher::getInstancia();
            foreach ($teacher->getAll() as $value) {
                $data['teacher_list'][] =   $value['t_name'] . " " . $value['t_surname1'] . " " . $value['t_surname2'];
            }

            //Get companies list
            $company = Company::getInstancia();
            foreach ($company->getAll() as $value) {
                $data['company_list'][] = $value['c_name'];
            }


            

            $this->renderHTML('../view/add_assignment.php', $data);
        }
    }

    /**
     * Show assignments from a selected call
     * @param mixed $request
     * @return void
     */
    public function showAssignmentsAction($request){
        
        $data = array();
        $call = Call::getInstancia();
        
        //Show header with call information
        $rest = explode("/", $request);
        $callId = (int)end($rest);        
        $call->setCallId($callId);
        foreach ($call->getById() as $value) {
            $data = array(
                "ayear_date" => $value["ayear_date"],
                "term_name" => $value["term_name"]
            );
        }

        //Is there any assignment?
        $data['assignment'] = array();

        if (count($call->getAssignmentsByCallId()) == 0) {
            $data['assignment']['student'] = "No hay asignaciones";
            $data['assignment']['company'] = "No hay asignaciones";
            $data['assignment']['teacher'] = "No hay asignaciones";
        } else {
            //Show table with assignments information
            foreach ($call->getAssignmentsByCallId() as $value) {
                $data['assignment']['student'] = $value['s_name'] . " " . $value['s_surname1'] . " " . $value['s_surname2'];
                $data['assignment']['company'] = $value['c_name'];
                $data['assignment']['teacher'] = $value['t_name'] . " " . $value['t_surname1'] . " " . $value['t_surname2'];
            }
        }

        $this->renderHTML('../view/assignments.php', $data);
    }

    /**
     * Show table with calls information
     * @return void
     */
    public function getCallsTableAction()
    {

        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();
            $call = Call::getInstancia();
            echo json_encode($call->getSome());
        }
    }
    
    public function callsAction(){
        $data = array();
        $this->renderHTML('../view/calls.php', $data);
    }

    /**
     * Get students from database and show them in a table
     * @return void
     */
    public function getStudentsTableAction()
    {

        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();
            $student = Student::getInstancia();
            echo json_encode($student->getSome());
        }
    }

    public function studentsAction()
    {
        $data = array();

        //Uploading csv file with students data
        if (isset($_POST['save_file'])) {

            //$filename = explode(".", $_FILES['file']['name']);

            //Open the file.
            $file = fopen($_FILES['file']['tmp_name'], "r");

            // Create a new file to write the data to
            $newFile = fopen('new.csv', 'w');

            // Read the first line of the file (the headline) and discard it
            fgetcsv($file);

            // Read the rest of the lines and write them to the new file
            while (($line = fgetcsv($file)) !== FALSE) {
                fputcsv($newFile, $line);
            }

            // Close the original file
            fclose($file);

            //Import newfilñe data to database
            $handle = fopen('new.csv', "r");
            while ($data = fgetcsv($handle)) {
                $student = Student::getInstancia();
                $student->setDni($data[0]);
                $student->setName($data[1]);
                $student->setSurname1($data[2]);
                $student->setSurname2($data[3]);
                $student->setEmail($data[4]);
                $student->setPhone($data[5]);
                $student->uploadFile();
            }
            fclose($handle);
            $this->renderHTML('../view/students.php', $data);

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
