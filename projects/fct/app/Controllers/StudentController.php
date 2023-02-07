<?php

namespace App\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Models\Ayear;
use App\Models\Term;

require_once '../app/Config/constantes.php';
require_once '../../fct/utils/my_utils.php';

$_SESSION['currentAcademicYear'] = getCurrentAcademicYear();
$_SESSION['currentTerm'] = getCurrentTerm();

class StudentController extends BaseController
{
    /**
     * Get a list of students by group id
     * @return void
     */
    public function getStudentsByGroupAction($request)
    {
        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
        $rest = explode("/", $request);
        $groupId = (int)end($rest);
        
        $student = new Student();
        $ayear = new Ayear();
        $term = new Term();

        $ayear->setAyearDate($_SESSION['currentAcademicYear']); //No es la actual- Es la seleccionada
        $ayearId = $ayear->getIdByDate();

        $term->setTermName($_SESSION['currentTerm']);//No es la actual- Es la seleccionada
        $termId = $term->getIdByName();

        $student->setGroup($groupId);
        $student->setAyear($ayearId);
        $student->setTerm($termId);

        //Send data to assignments.js
        echo json_encode($student->getStudentsByGroupId());
        }
    }
}
