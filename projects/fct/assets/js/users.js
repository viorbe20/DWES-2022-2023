$(document).ready(function () {

    console.log('users.js loaded');

    $userBar = $('#user_bar');
    $tableUsers = $('#dropdown_users');
    $dirbaseurl = "http://localhost/fct/public/index.php";


    //students assignmets
    $userBar.keyup(function () {
        if (($userBar.val() == '') || ($userBar.val().indexOf(' ') > -1)) {
            location.reload();
        } else {
            showMatchingUsers();
        }
    });
});