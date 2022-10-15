<?php
namespace App\Controllers;
use App\Models\Company;

require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

class IndexController extends BaseController {
    
    public function indexAction() {
        $data = array();
        // $company = Company::getInstancia();
        // $data = $company->get();
        $this->renderHTML('../../view/home_view.php', $data);
        //header('location:' . DIRBASEURL);
    }
}