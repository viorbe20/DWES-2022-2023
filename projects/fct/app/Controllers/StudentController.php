<?php

namespace App\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Models\Ayear;
use App\Models\Term;
use App\Models\Enrollment;
use Exception;
use \PDOException;

require_once '../app/Config/constantes.php';
require_once '../../fct/utils/my_utils.php';

$_SESSION['currentAcademicYear'] = getCurrentAcademicYear();
$_SESSION['currentTerm'] = getCurrentTerm();

class StudentController extends BaseController
{

    public function addStudentsAction()
    {
        $data = array();

        //Get groups list and keep them into a session for select options in view
        $group = Group::getInstancia();

        $_SESSION['group_list'] = array();
        foreach ($group->getAll() as $value) {
            $_SESSION['group_list'][] = $value;
        }

        //Get academic years list and keep them into a session
        $ayear = Ayear::getInstancia();
        $_SESSION['ayear_list'] = array();
        foreach ($ayear->getAll() as $value) {
            $_SESSION['ayear_list'][] = $value;
        }

        //Get termslist and keep them into a session
        $term = Term::getInstancia();

        $_SESSION['term_list'] = array();
        foreach ($term->getAll() as $value) {
            $_SESSION['term_list'][] = $value;
        }

        //Submit for students file upload
        if (isset($_POST['save_file'])) {

            if ($_FILES['file']['name'] == '') { //Check if there is a file
                echo '<script type="text/javascript">
                alert("Ningún archivo seleccionado");
                </script>';
                $this->renderHTML('../view/students.php', $data);
            } elseif ($_FILES['file']['type'] != 'text/csv') { //Check if file is a csv file
                echo '<script type="text/javascript">
                    alert("El formato del archivo debe ser csv");
                    </script>';
                $this->renderHTML('../view/students.php', $data);
            } else {

                //Open file
                $file = fopen($_FILES['file']['tmp_name'], "r");

                //Ignore first line (headers)
                fgets($file);

                while (($line = fgets($file)) != false) {
                    $line = iconv('ISO-8859-1', 'UTF-8', $line); //Codifica en UTF-8

                    //Get data from line
                    $data = explode(";", $line);

                    if (count($data) != 6) { //Check if there are 6 fields
                        echo '<script type="text/javascript">
                        alert("El archivo no tiene el formato correcto");
                        </script>';
                        $this->renderHTML('../view/students.php', $data);
                        die();
                    } elseif (!mb_check_encoding($line, 'UTF-8')) { //Check if there are invalid characters
                        echo '<script type="text/javascript">
                        alert("Existen caracteres no válidos en el archivo");
                        </script>';
                        $this->renderHTML('../view/students.php', $data);
                        die();
                    } else {

                        $studentsArray[] = array(
                            'dni' => str_replace('"', '', $data[0]),
                            'name' => str_replace('"', '', $data[1]),
                            'surname1' => str_replace('"', '', $data[2]),
                            'surname2' => str_replace('"', '', $data[3]),
                            'email' => str_replace('"', '', $data[4]),
                            'phone' => str_replace('"', '', $data[5])

                        );
                    }
                }
                // If exists $studentsArrayt
                if (isset($studentsArray)) {
                    // Loop the array and check if each dni exists in database
                    foreach ($studentsArray as $student) {

                        $studentModel = Student::getInstancia();
                        $studentModel->setDni($student['dni']);

                        if ($studentModel->getByDni() != null) {
                            echo '<script type="text/javascript">
                                alert("El alumno con DNI ' . $student['dni'] . ' ya existe en la base de datos");
                                </script>';
                        } else {
                            //Fill student model with data from array and insert into database
                            $studentModel->setName($student['name']);
                            $studentModel->setSurname1($student['surname1']);
                            $studentModel->setSurname2($student['surname2']);
                            $studentModel->setEmail($student['email']);
                            $studentModel->setPhone($student['phone']);
                            $studentModel->set();

                            //Get last inserted student id
                            $lastId = $studentModel->lastInsert();

                            //Create enrollment
                            $enrollment = Enrollment::getInstancia();
                            $enrollment->setEnrollIdStudent($lastId);
                            $enrollment->setEnrollIdAyear($_POST['ayear_id_select']);
                            $enrollment->setEnrollIdTerm($_POST['term_id_select']);
                            $enrollment->setEnrollIdGroup($_POST['group_id_select']);
                            $enrollment->set();
                        }
                    }
                }
                $this->renderHTML('../view/students.php', $data);
            }
        } else { //By default, show students table
            $this->renderHTML('../view/students.php', $data);
        }
    }

    /**
     * Get all students from database and show them in a table
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
            echo json_encode($student->get());
        }
    }

    public function testAction()
    {
        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $request ="http://localhost/dwes/projects/fct/public/index.php/test/12_1_1";
            $rest = explode("/", $request);
            $studentData = end($rest);
            $dividedData = explode("_", $studentData);

            $enrollment = Enrollment::getInstancia();
            $enrollment->setEnrollIdAyear((int)$dividedData[0]);
            $enrollment->setEnrollIdTerm((int)$dividedData[1]);
            $enrollment->setEnrollIdGroup((int)$dividedData[2]);

            //Send to assignments.js
            if (!empty($enrollment->getStudentsByGroupId())) {
                //echo json_encode($enrollment->getStudentsByGroupId());
                $data['status'] = 'ok';
                $data['students'] = $enrollment->getStudentsByGroupId();
            } else {
                error_log("Non existing data");
                $data['status'] = 'error';
            }
        }
        echo json_encode($data);
        exit();
    }

    /**
     * Given a group id, get all students from that group and show them in a table
     * @return void
     */
    public function getStudentsByGroupAction($request)
    {
        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $rest = explode("/", $request);
            $studentData = end($rest);
            $dividedData = explode("_", $studentData);

            $enrollment = Enrollment::getInstancia();
            $enrollment->setEnrollIdAyear((int)$dividedData[0]);
            $enrollment->setEnrollIdTerm((int)$dividedData[1]);
            $enrollment->setEnrollIdGroup((int)$dividedData[2]);

            //Send to assignments.js
            if ($enrollment->getStudentsByGroupId()) {
                echo json_encode($enrollment->getStudentsByGroupId());
            } else {
                $error = array('error' => 'No hay datos');
                http_response_code(404); // Establece el código de respuesta a 404
                echo json_encode($error);
            }
        }
    }
}
