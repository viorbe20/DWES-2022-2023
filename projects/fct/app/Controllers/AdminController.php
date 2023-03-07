<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

use App\Models\Company;


class AdminController extends BaseController
{

    public function jqCompaniesAction()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $company = new Company();
            echo json_encode($company->getAll());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }


}
?>