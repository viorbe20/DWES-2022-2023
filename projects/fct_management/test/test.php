<?php
//date('Y-m-d H:i:s')
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Company;

$c = Company::getInstancia();

$c->setName('Edi');
print_r($c->getByName());


?>




