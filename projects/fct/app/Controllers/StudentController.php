<?php
namespace App\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Models\Ayear;
use App\Models\Term;
use App\Models\Enrollment;
use Exception;

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

            //Check if there is a file
            if ($_FILES['file']['name'] != '') {

                //Check if file is a csv file
                if ($_FILES['file']['type'] != 'text/csv') {
                    echo '<script type="text/javascript">
                    alert("El formato del archivo debe ser csv");
                    </script>';
                    $this->renderHTML('../view/students.php', $data);
                } else {

                    //Error control for file opening
                    try {
                        //Open the file 
                        $file = fopen($_FILES['file']['tmp_name'], "r");

                        //Ignore first line (headers)
                        fgets($file);

                            while (($line = fgets($file)) !== false) {
                                $line = iconv('ISO-8859-1', 'UTF-8', $line); //Codifica en UTF-8
                                $elements = explode(';', $line);
                                // Acceder a cada elemento por su índice en el array
                                echo "Nombre: " . $elements[0] . "<br>";
                                echo "Apellido: " . $elements[1] . "<br>";
                                echo "Edad: " . $elements[2] . "<br>";
                                //echo $line . "<br>"; // Imprime cada línea del archivo y añade un salto de línea HTML
                            }

                    } catch (Exception $e) {
                        echo '<script type="text/javascript">
                        alert("Se ha producido un error al abrir el archivo");
                        </script>';
                    } finally {
                        fclose($file);
                        $this->renderHTML('../view/students.php', $data);
                    }
                }
            } else { // User pushed submit button without saving file show a warning
                echo '<script type="text/javascript">
                alert("Ningún archivo seleccionado");
                </script>';
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

    /**
     * Get a list of students by group id
     * @return void
     */
    // public function getStudentsByGroupAction($request)
    // {
    //     if ($_SESSION['user']['profile'] == 'guest') {
    //         $data = array();
    //         $this->renderHTML('../view/home.php', $data);
    //     } else {
    //         $rest = explode("/", $request);
    //         $studentData = end($rest);
    //         $dividedData = explode("_", $studentData);

    //         $student = new Student();
    //         $student->setAyear((int)$dividedData[0]);
    //         $student->setTerm((int)$dividedData[1]);
    //         $student->setGroup((int)$dividedData[2]);

    //         //If get somenthing, send data to assignments.js
    //         if ($student->getStudentsByGroupData()) {
    //             echo json_encode($student->getStudentsByGroupData());
    //         } else {
    //             echo json_encode(array('error' => 'No hay datos'));
    //         }
    //     }
    // }
}
