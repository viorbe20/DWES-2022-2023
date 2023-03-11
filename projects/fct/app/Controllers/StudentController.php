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

    public function uploadStudentsAction()
    {

        if ($_SESSION['user']['status'] == 'login') {

            $data = array();
            $group = Admin::getInstancia();
            $ayear = Admin::getInstancia();
            $term = Admin::getInstancia();

            $data['groups_list'] = $group->getAllGroupsNames();
            $data['ayears_list'] = $ayear->getAllAYears();
            $data['terms_list'] = $term->getAllTerms();

            //Push upload file button
            if (isset($_POST['btn_upload_file'])) {

                if ($_FILES['file']['name'] == '') { //Check if there is a file
                    echo '<script type="text/javascript">
                    alert("Ningún archivo seleccionado");</script>';
                    $this->renderHTML('../view/upload_students.php', $data);
                } else {
                    $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                    if ($file_ext != 'csv') { //Check if file is a csv file based on extension
                        echo '<script type="text/javascript">
                        alert("El formato del archivo debe ser csv");</script>';
                        $this->renderHTML('../view/upload_students.php', $data);
                    } else {
                        //Open file
                        $file = fopen($_FILES['file']['tmp_name'], "r");

                        //Ignore first line (headers)
                        fgets($file);

                        while (($line = fgets($file)) != false) {

                            //Get data from line
                            $data = explode(";", $line);

                            echo 'Longitud: ' . count($data) . '<br>';

                            if (count($data) != 5) { //Check if there are 5 fields
                                echo '<script type="text/javascript">
                                        alert("El archivo no tiene el formato correcto. Debe tener 5 campos");</script>';
                                $this->renderHTML('../view/upload_students.php', $data);
                                die();
                            } elseif (!mb_check_encoding($line, 'UTF-8')) { //Check if there are invalid characters
                                echo '<script type="text/javascript">
                                        alert("Existen caracteres no válidos en el archivo");</script>';
                                $this->renderHTML('../view/upload_students.php', $data);
                                die();
                            } else {

                                $studentsArray[] = array(
                                    'nif' => str_replace('"', '', $data[0]),
                                    'name' => str_replace('"', '', $data[1]),
                                    'surnames' => str_replace('"', '', $data[2]),
                                    'email' => str_replace('"', '', $data[3]),
                                    'phone' => str_replace('"', '', $data[4])
                                );
                            }
                        }

                        //Close file
                        fclose($file);

                        if (isset($studentsArray)) {
                            // Loop the array and check if each dni exists in database
                            foreach ($studentsArray as $student) {

                                $studentModel = Student::getInstancia();
                                $studentModel->setNif($student['nif']);

                                if ($studentModel->getByNif() != null) {
                                    echo '<script type="text/javascript">
                                            alert("El alumno con NIF ' . $student['nif'] . ' ya existe en la base de datos");</script>';
                                }
                                //Fill student model with data from array and insert into database
                                $studentModel->setName($student['name']);
                                $studentModel->setSurnames($student['surnames']);
                                $studentModel->setEmail($student['email']);
                                $studentModel->setPhone($student['phone']);
                                $studentModel->setStatus('alta');
                                $studentModel->setCreated_at(date('Y-m-d H:i:s'));
                                $studentModel->setUpdated_at(date('Y-m-d H:i:s'));
                                $studentModel->set();

                                //Get last inserted student id
                                $lastId = $studentModel->lastInsert();

                                //Create enrollment
                                $enrollment = Enrollment::getInstancia();
                                $enrollment->setStudentId($lastId);
                                $enrollment->setAyear($_POST['ayear']);
                                $enrollment->setTerm($_POST['term']);
                                $enrollment->setGroupName($_POST['group']);
                                $enrollment->setStatus('alta');
                                $enrollment->setCreatedAt(date('Y-m-d H:i:s'));
                                $enrollment->setUpdatedAt(date('Y-m-d H:i:s'));
                                $enrollment->set();
                            }
                        }
                    }
                }
                header('Location: ' . DIRBASEURL . '/students/' . $_POST['ayear'] . '/' . $_POST['group']);
            } else {
                //By default
                $this->renderHTML('../view/upload_students.php', $data);
            }
        } else {
            $this->renderHTML('../view/home.php');
        }
    }

    public function studentAssignmentsAction($request)
    {
        if ($_SESSION['user']['status'] == 'login') {

            $data = array();
            $assignment = Assignment::getInstancia();
            $student = Student::getInstancia();
            $teacher = Teacher::getInstancia();
            $enrollment = Enrollment::getInstancia();


            //Check is the request is a new assignment
            $rest = explode("/", $request);
            $last = explode("_", end($rest));

            if ($last[1] == 0) { //student with no assignment
                $student->setId($last[0]);
                $data['student'] = $student->getById();
                $data['student'] = $data['student'][0];
                $data['student']['group'] = prev($rest);
                $data['student']['ayear'] = prev($rest);

                $enrollment->setStudentId($student->getId());
                $enrollment->setAyear($data['student']['ayear']);
                foreach ($enrollment->getTermByStudentIdAnYear() as  $value) {
                    $data['student']['term'] = $value['term'];
                }
            } else {
                $assignment->setId($last[1]);
                foreach ($assignment->getCompleteAssignmentById() as $value) {
                    $data['assignment'] = $value;
                }
            }


            $data['teachers_list'] = $teacher->getAllActive();

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

                    $assignment->setIdStudent($data['student']['id']);
                    $assignment->setIdTeacher(clearData($_POST['teacher']));
                    $assignment->setIdEmployee(clearData($_POST['employee']));
                    $assignment->setAyear($data['student']['ayear']);
                    $assignment->setTerm($data['student']['term']);
                    $assignment->setGroupName($data['student']['group']);
                    $assignment->setDateStart($_POST['start_date']);
                    $assignment->setDateEnd($_POST['end_date']);
                    $assignment->setEvalStudent($_POST['eval_student']);
                    $assignment->setEvalTeacher($_POST['eval_teacher']);
                    $assignment->setStatus('alta');
                    $assignment->setCreatedAt(date('Y-m-d H:i:s'));
                    $assignment->setUpdatedAt(date('Y-m-d H:i:s'));
                    $assignment->set();
                    
                    header('Location: ' . DIRBASEURL . '/students/' . $data['student']['ayear'] . '/' . $data['student']['group']);
                } 
            } else if (isset($_POST['btn_update_assignment'])) {
                $assignment->setDateStart($_POST['start_date']);
                $assignment->setDateEnd($_POST['end_date']);
                $assignment->setEvalStudent($_POST['eval_student']);
                $assignment->setEvalTeacher($_POST['eval_teacher']);
                $assignment->setUpdatedAt(date('Y-m-d H:i:s'));
                $assignment->updataDateAndEvaluation();
                header('Location: ' . DIRBASEURL . '/students/' . $data['assignment']['ayear'] . '/' . 
                $data['assignment']['group_name']);
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
            $term = Admin::getInstancia();

            $enrollment->setAyear($data['ayear']);
            $enrollment->setGroupName($data['group']);

            foreach ($term->getAllTerms() as $value) {
                $enrollment->setTerm($value['term']);

                $unassignedStudents = $enrollment->getIdCurrentStudentsWithoutAssignment();
                $assignedStudents = $enrollment->getIdCurrentStudentsWithtAssignment();

                $termData = array(
                    'unassignedStudents' => $unassignedStudents,
                    'assignedStudents' => $assignedStudents
                );
                $data['terms'][$value['term']] = $termData;
            }

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
