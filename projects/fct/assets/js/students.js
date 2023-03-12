$(document).ready(function () {

    console.log('students.js loaded');

    $studentBar = $('#student_bar');
    $tableStudents = $('#dropdown_students');
    $dirbaseurl = "http://localhost/fct/public/index.php";

    //students assignmets
    $studentBar.keyup(function () {
        if (($studentBar.val() == '') || ($studentBar.val().indexOf(' ') > -1)) {
            location.reload();
        } else {
            showMatchingAssignments();
        }
    });
});