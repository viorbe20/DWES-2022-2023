<?php
//date('Y-m-d H:i:s')
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Company;

$company = Company::getInstancia();

// Get companies list
// $companiesList = $company->get_all();
// foreach ($companiesList as $key => $value) {
//     print_r($companiesList[$key]);
//     echo "</br></br>";
// }

// Set a company 
$company->set_company_cif("B-12345678");
$company->set_company_name("Company 1");
$company->set_company_description("Company 1 description");
$company->set_company_address("Company 1 address");
$company->set_company_email("company1@gmail.com");
$company->set_company_phone(957456789);
$company->set_company_logo("company1.png");
$company->set_created_at(date('Y-m-d H:i:s'));
$company->set_updated_at(date('Y-m-d H:i:s'));
$company->set();
?>