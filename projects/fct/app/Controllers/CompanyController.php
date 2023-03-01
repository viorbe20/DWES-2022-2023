<?php

namespace App\Controllers;

use App\Models\Company;

require_once '../app/Config/constantes.php';
require_once '../../fct/utils/my_utils.php';

$_SESSION['currentAcademicYear'] = getCurrentAcademicYear();
$_SESSION['currentTerm'] = getCurrentTerm();

class CompanyController extends BaseController
{

    /**
     * Get id from url and delete the company
     */
    public function deleteCompanyAction($request)
    {
        $company = Company::getInstancia();
        $rest = explode("/", $request);
        $companyId = (int)end($rest);
        $company->setId($companyId);
        //$company->delete();
    }

    /**
     * Add a new company
     * data added with jquery on assets/js/companies.js
     */
    public function addCompanyAction()
    {
        $data = array();
        $this->renderHTML('../view/company_info.php', $data);
    }

    /**
     * Get all companies from dtabase
     */
    public function getCompaniesTableAction()
    {

        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();
            $company = Company::getInstancia();
            echo json_encode($company->get());
        }
    }

    /**
     * Show companies view
     */
    public function companiesAction()
    {
        $data = array();
        $this->renderHTML('../view/companies.php', $data);
    }
}
