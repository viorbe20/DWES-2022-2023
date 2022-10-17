<?php
//date('Y-m-d H:i:s')
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Company;

$c = Company::getInstancia();

foreach ($c->getSome() as $key => $value) {
    echo $value['c_name'] . '<br>';
}


?>




