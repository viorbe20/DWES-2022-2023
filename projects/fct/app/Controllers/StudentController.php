<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';
require_once '../utils/validations.php';


use App\Models\Admin;
use App\Models\Assignment;
use App\Models\Student;


class StudentController extends BaseController
{

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
                $data['groups_names'][] = $value;

            }


            $this->renderHTML('../view/students.php', $data);
            
        } else {
            $this->renderHTML('../view/home.php');
        }
    }
    
}
