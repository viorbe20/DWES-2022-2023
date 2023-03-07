<?php
use App\Models\Company;
use App\Models\Employee;

$c = Company::getInstancia();
$e = Employee::getInstancia();


$e->setId(2);
var_dump($e->getAssigmentIdByEmployeeId());

?>