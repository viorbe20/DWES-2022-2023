<?php
use App\Models\Company;
use App\Models\Employee;

$c = Company::getInstancia();
$employee = Employee::getInstancia();
$employee->setName('test');
$employee->setSurnames('test');
$employee->setNif('tegst');
$employee->setJob('test');
$employee->setCompany_id_fk(1);
$employee->setStatus_fk('alta');
$employee->setCreated_at(date('Y-m-d H:i:s'));
$employee->setUpdated_at(date('Y-m-d H:i:s'));
$employee->set();




?>