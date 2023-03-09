<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';
require_once '../utils/validations.php';


use App\Models\Admin;
use App\Models\Assignment;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Company;
use App\Models\Employee;


class StudentController extends BaseController
{

    public function studentAssignmentsAction($request)
    {
        if ($_SESSION['user']['status'] == 'login') {

            $data = array();
            $assignment = Assignment::getInstancia();
            $student = Student::getInstancia();
            $teacher = Teacher::getInstancia();
            $employee = Employee::getInstancia();
            $company = Company::getInstancia();

            $data['teachers_list'] = $teacher->getAllActive();

            $rest = explode("/", $request);


            // $rest = explode("/", $_SERVER['REQUEST_URI']);
            $assignment->setIdStudent(end($rest));
            $assignment->setAyear(prev($rest));
            $assignment->setGroupName(prev($rest));

            $student->setId($assignment->getIdStudent());
            $student->getCompleteNameById();
            $data['student'] = $student->getCompleteNameById();
            $data['student'] = $data['student'][0];

            $data['assignments'] = $assignment->getAllByIdStudentAndAYearAndGroup();
            $data['assignments'] = $data['assignments'][0];

            $teacher->setId($data['assignments']['id_teacher']);
            $data['teacher'] = $teacher->getCompleteNameById();
            $data['teacher'] = $data['teacher'][0];
            $data['teacher'] = array('id' => $teacher->getId(), 'name' => $data['teacher']['name']);


            $employee->setId($data['assignments']['id_employee']);;
            foreach ($employee->getIdCompanyByIdEmployee() as $value) {
                $companyId = $value['company_id_fk'];
            }

            $employee->setCompany_id_fk($companyId);
            $data['employees'] = $employee->getAllActiveByCompanyId();



            if (isset($_POST['btn_create_assignment'])) {

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
                    $assignment->setId($data['assignments']['id']);
                    $assignment->setIdStudent($data['assignments']['id_student']);
                    $assignment->setIdTeacher(clearData($_POST['teacher']));
                    $assignment->setIdEmployee(clearData($_POST['employee']));
                    $assignment->setAyear($data['assignments']['ayear']);
                    $assignment->setTerm($data['assignments']['term']);
                    $assignment->setGroupName($data['assignments']['group_name']);
                    $assignment->setDateStart($_POST['start_date']);
                    $assignment->setDateEnd($_POST['end_date']);
                    $assignment->setStatus('alta');
                    $assignment->setUpdatedAt(date('Y-m-d H:i:s'));
                    $assignment->update();

                    header('Location: ' . DIRBASEURL . '/' .'students/' . $data['assignments']['ayear'] . '/' . $data['assignments']['group_name']);
                } else {
                    $this->renderHTML('../view/assignments.php', $data);
                }
            } else { //By default, render the form
                $this->renderHTML('../view/assignments.php', $data);
            }
        } else {
            $this->renderHTML('../view/home.php');
        }
    }
    public function studentsGroupAction($request)
    {
        if ($_SESSION['user']['status'] == 'login') {

            $data = array();
            $rest = explode("/", $request);
            $data['ayear'] = $rest[2];
            $data['group'] = $rest[3];

            $enrollment = Enrollment::getInstancia();
            $assignment = Assignment::getInstancia();
            $student = Student::getInstancia();

            $assignment->setAyear($data['ayear']);
            $assignment->setGroupName($data['group']);
            $enrollment->setAyear($data['ayear']);
            $enrollment->setGroupName($data['group']);

            $assigned = array();
            $notAssigned = array();

            foreach ($enrollment->getAllByAYearAndGroup() as $value) {
                $assignment->setIdStudent($value['student_id']);
                $assignments = $assignment->getAllByIdStudentAndAYearAndGroup();

                if (empty($assignments)) {
                    $student->setId($value['student_id']);
                    $name = $student->getCompleteNameById();
                    $notAssigned[] = array('id' => $value['student_id'], 'name' => $name[0]['name']);
                } else {
                    $term = ($assignments[0]['term']);
                    $student->setId($value['student_id']);
                    $name = $student->getCompleteNameById();
                    $assigned[] = array('id' => $value['student_id'], 'name' => $name[0]['name'], 'term' => $term);
                }
            }

            $data['assigned'] = $assigned;
            $data['not_assigned'] = $notAssigned;

            $this->renderHTML('../view/groups.php', $data);
        } else {
            $this->renderHTML('../view/home.php');
        }
    }

    public function studentsAction()
    {

        if ($_SESSION['user']['status'] == 'login') {

            $data = array();

            $admin = Admin::getInstancia();

            $currentAYear = getCurrentAcademicYear();

            foreach ($admin->getAllAYears() as $value) {
                if ($value['ayear'] == $currentAYear) {
                    //get the index of the current academic year
                    $index = array_search($value, $admin->getAllAYears());
                    //extract the rest of the array
                    $data['ayears'] = array_slice($admin->getAllAYears(), $index);
                }
            }

            foreach ($admin->getAllGroupsNames() as $value) {
                $data['groups'][] = $value;
            }

            $this->renderHTML('../view/students.php', $data);
        } else {
            $this->renderHTML('../view/home.php');
        }
    }
}
