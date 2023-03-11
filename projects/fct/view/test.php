<?php
use App\Models\Company;
use App\Models\Employee;
use App\Models\Assignment;
use App\Models\Enrollment;

$c = Company::getInstancia();
$enrollment = Enrollment::getInstancia();
$employee = Employee::getInstancia();
$assignment = Assignment::getInstancia();

//upñdate assignmment
$assignment->setId(26);
// $assignment->setIdStudent(13);
// $assignment->setIdTeacher(2);
// $assignment->setIdEmployee(9);
// $assignment->setAyear('2022-2023');
// $assignment->setTerm('septiembre-diciembre');
// $assignment->setGroupName('DAW');
// $assignment->setDateStart(2023-03-01);
// $assignment->setDateEnd(2023-06-30);
// $assignment->setStatus('alta');
// $assignment->setUpdatedAt(date('Y-m-d H:i:s'));

$enrollment->setAyear('2022-2023');
$enrollment->setTerm('marzo-junio');
$enrollment->setGroupName('DAW');
$unassignedStudents = $enrollment->getIdCurrentStudentsWithoutAssignment();
echo "<pre>";
print_r($unassignedStudents);
echo "</pre>";


