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

            if (isset($_POST['btn_create_company'])) {
                header('Location: ' . DIRBASEURL . "/companies/create_company");
            } else { //By default
                $company = Company::getInstancia();
                $data['table_companies'] = $company->getAllActive();

                if ($company->getAllActive() != null) { //Show companies

                    if ($company->getAllActive() <= 5) { //Control the number of companies to show
                        $data['table_companies'] = $company->getAllActive();
                    } else {
                        $data['table_companies'] = array_slice($company->getAllActive(), 0, 5);
                    }
                } else {
                    echo "<script>alert('No hay empresas registradas.');</script>";
                }

                $this->renderHTML('../view/students.php', $data);
            }
        } else {
            $this->renderHTML('../view/home.php');
        }
    }
}
