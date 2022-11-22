<?php

namespace App\Controllers;

use App\Models\Company;
use App\Models\Validation;
use App\Models\Employee;

require_once('..\app\Config\constantes.php');

class DefaultController extends BaseController
{
    public function indexAction()
    {
        $data = array();
        $this->renderHTML('../view/home.php', $data);
    } 
}
