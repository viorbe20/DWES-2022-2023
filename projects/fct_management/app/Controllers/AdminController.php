<?php
namespace App\Controllers;
use App\Models\Company;

require_once('..\app\Config\constantes.php');

class AdminController extends BaseController {
    
    public function adminAction() {
        $data = array();
        
        //Shows last 5 companies
        $company = Company::getInstancia();
        $data['lastCompanies'] = $company->getSome();

        $this->renderHTML('../view/companies_view.php', $data);
    }

    public function logoutAction()
    {
        //Close session and redirect to home
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/home');
    }
}