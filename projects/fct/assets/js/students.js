$(document).ready(function () {

    console.log('students.js loaded');

    $studentBar = $('#student_bar');
    $tableStudents = $('#dropdown_students');

    console.log($tableStudents);
    // $dirbaseurl = "http://localhost/fct/public/index.php";
    // $dirbase = "http://localhost/fct/";

    $studentBar.keyup(function () {
        if (($studentBar.val() == '') || ($studentBar.val().indexOf(' ') > -1)) {
            console.log('ddddddd');
            location.reload();
        } else { 
            console.log('aaaa');
            showMatchingStudents();
        }
    });
});