<?php
use App\Models\Company;
use App\Models\Employee;
use App\Models\Assignment;
use App\Models\Enrollment;

$c = Company::getInstancia();
$enrollment = Enrollment::getInstancia();
$employee = Employee::getInstancia();
$assignment = Assignment::getInstancia();

$enrollment->setStudentId(36);
$enrollment->setAYear('2022-2023');
var_dump($enrollment->getTermByStudentIdAndYear());
