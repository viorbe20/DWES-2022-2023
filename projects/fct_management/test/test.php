<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Company;

$company = Company::getInstancia();
$company->set(array(
    'company_cif' => 'B-12345678',
    'company_name' => 'Empresa de prueba',
    'company_description' => 'Empresa de prueba',
    'company_address' => 'Calle de prueba',
    'company_email' => 'email@gmail.com'));

// Get companies list
$companiesList = $company->get_all();
print_r($companiesList);



?>