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
use App\Models\Group;
use App\Models\Assignment;
use Exception;

require_once '../app/Config/constantes.php';
require_once '../../fct/utils/my_utils.php';

$_SESSION['currentAcademicYear'] = getCurrentAcademicYear();
$_SESSION['currentTerm'] = getCurrentTerm();

class DefaultController extends BaseController
{
    public function addAssignmentAction()
    {
        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();

            if (isset($_POST['btn_add_assignment'])) {

                //If all values are completed
                if (isset($_POST['student_select']) && (isset($_POST['start_date'])) && (isset($_POST['end_date']))) {
                    //Create assignment
                    $assignment = Assignment::getInstancia();
                    $assignment->setIdCall($_SESSION['call_id']);
                    $assignment->setIdCompany($_POST['company_select']);
                    $assignment->setIdStudent($_POST['student_select']);
                    $assignment->setIdTeacher($_POST['teacher_select']);
                    $assignment->setDateStart($_POST['start_date']);
                    $assignment->setDateEnd($_POST['end_date']);
                    $assignment->setAssignment();

                    $this->renderHTML('../view/add_assignment.php', $data);
                } else {
                    print("<script>alert('Debes rellenar todos los campos.');</script>");
                    $this->renderHTML('../view/add_assignment.php', $data);
                }

            } else { //First time the page is loaded

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
                //foreach ($student->getAll() as $value) {
                foreach ($student->get() as $value) {
                    $data['student_list'][] = $value['s_surname1'] . " " . $value['s_surname2'] . ", " . $value['s_name'];
                }

                //Get teachers list
                $teacher = Teacher::getInstancia();
                foreach ($teacher->getAll() as $value) {
                    $data['teacher_list'][] = $value;
                }

                //Get companies list
                $company = Company::getInstancia();
                foreach ($company->getAll() as $value) {
                    $data['company_list'][] = $value;
                }

                //Get group list
                $group = Group::getInstancia();
                foreach ($group->getAll() as $value) {
                    $data['group_list'][] = $value;
                }
                $this->renderHTML('../view/add_assignment.php', $data);
            }
        }
    }

    /**
     * Show assignments from a selected call
     * @param mixed $request
     * @return void
     */
    public function showAssignmentsAction($request)
    {

        $data = array();
        $call = Call::getInstancia();

        //Show header with call information
        $rest = explode("/", $request);
        $_SESSION['call_id'] = (int)end($rest);

        $call->setCallId($_SESSION['call_id']);

        //Save on session selected ayear and selected term
        foreach ($call->getById() as $value) {
            $_SESSION['selected_ayear_id'] =  $value["ayear_id"];
            $_SESSION['selected_ayear_date'] =  $value["ayear_date"];
            $_SESSION['selected_term_id'] =  $value["term_id"];
            $_SESSION['selected_term_name'] =  $value["term_name"];
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

    public function callsAction()
    {
        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            //Add a new call
            if (isset($_POST['btn_modal_confirm_call'])) {
                $ayearSelected = $_POST['ayear_select'];
                $termSelected = $_POST['term_select'];

                //Get id of academic year and term selected
                $call = Call::getInstancia();
                $ayear = Ayear::getInstancia();
                $term = Term::getInstancia();

                //Set academic year id
                $ayear->setAyearDate($ayearSelected);
                $ayearId = $ayear->getIdByDate()[0]['ayear_id'];
                $call->setCallAyear($ayearId);

                //Set term id
                $term->setTermName($termSelected);
                $termId = $term->getIdByName()[0]['term_id'];
                $call->setCallTerm($termId);


                //Check if call already exists
                if (count($call->getByAyearAndTerm()) == 0) {
                    $call->set();
                    //Show success message
                    echo '<script type="text/javascript">
                    alert("Se ha creado la convocatoria correctamente");
                    </script>';
                } else {
                    //Show error message
                    echo '<script type="text/javascript">
                    alert("Ese curso académico y ese trimestre ya existen");
                    </script>';
                }
            }
            //Show current academic year and term in a modal window
            //for its selection 
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
            $this->renderHTML('../view/calls.php', $data);
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
