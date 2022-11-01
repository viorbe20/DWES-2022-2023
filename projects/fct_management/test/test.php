<?php
//date('Y-m-d H:i:s')
// $c = Company::getInstancia();
// $id = $c->lastInsert();
// print_r($id[0]['c_id']);
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Company;
use App\Models\Employee;
$c = Company::getInstancia();
$company = Company::getInstancia();
$e = Employee::getInstancia();

$e->setId(1);
$e->getCompanyByEmployee();

?>
<form method="post" action="" enctype="multipart/form-data" id="form_add_company">

<input type="submit" value="Crear" name="add_new_company" id="btn_add_company">
</form>
<?php

if (isset($_POST['add_new_company'])) {
    $c->setC_name("Prueba");
    $c->setC_cif($_POST['c_cif']);
    $c->setC_address($_POST['c_address']);
    $c->setC_phone($_POST['c_phone']);
    $c->setC_email($_POST['c_email']);
    $c->setC_logo($_FILES['c_logo']['name']);
    $c->setC_date(date('Y-m-d H:i:s'));
    $c->setC_active(1);
    $c->setC_id($e->getCompanyByEmployee());
    $c->addCompany();
    $c->uploadLogo();
}




?>

