<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';
require_once '../utils/validations.php';


use App\Models\Company;
use App\Models\Employee;
use App\Models\Student;


class StudentController extends BaseController
{

    public function studentsAction()
    {

        if ($_SESSION['user']['status'] == 'login') {

            $data = array();

            $student = new Student();

            // foreach ($student->getAllActive() as $value) {
            //     $data['students']['id'] = $value['id'];
            //     $data['students']['name'] = $value['name'];
            //     $data['students']['surnames'] = $value['surnames'];
            //     $data['students']['nif'] = $value['nif'];
            // }

            $data = array(
                'students' => array(
                    array(
                        'id' => 1,
                        'name' => 'Juan',
                        'surnames' => 'García Pérez',
                        'nif' => '12345678A',
                    ),
                    array(
                        'id' => 2,
                        'name' => 'María',
                        'surnames' => 'Martínez López',
                        'nif' => '23456789B',
                    ),
                    array(
                        'id' => 3,
                        'name' => 'Josemi',
                        'surnames' => 'Pérez Sánchez',
                        'nif' => '72113860M',
                    ),
                    array(
                        'id' => 4,
                        'name' => 'Pablo',
                        'surnames' => 'González Ruiz',
                        'nif' => '34567890C',
                    ))
            );



            $this->renderHTML('../view/students.php', $data);
            
        } else {
            $this->renderHTML('../view/home.php');
        }
    }
    
}
