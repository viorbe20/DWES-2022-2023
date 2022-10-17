<?php
//date('Y-m-d H:i:s')
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
//require cif_validation.php
require('../../require/cif_validation.php');


use App\Models\Company;

$c = Company::getInstancia();

?>




