<?php
namespace App\Controllers;
use App\Models\Company;

require_once('..\app\Config\constantes.php');

class AdminController extends BaseController {
    
    public function adminAction() {
        $data = array();
        // $company = Company::getInstancia();
        // $data = $company->get();
        $this->renderHTML('../view/companies_view.php', $data);
    }
}