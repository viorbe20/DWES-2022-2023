<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Company;

$company = Company::getInstancia();

// Get companies list
$companiesList = $company->get_all();
print_r($companiesList);

// Set a company 
$company->set(array(
    'company_cif' => 'B-12345678',
    'company_name' => 'Empresa de prueba',
    'company_description' => 'Empresa de prueba',
    'company_address' => 'Calle de prueba',
    'company_email' => 'email@gmail.com',
    'company_phone'=> '957456789', 
    'company_logo' => 'logo.png', 
    'created_at'=> date('Y-m-d H:i:s'), 
    'updated_at' => date('Y-m-d H:i:s')
)
);

print_r($company);

?>