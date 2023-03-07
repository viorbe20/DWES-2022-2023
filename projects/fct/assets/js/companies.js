$(document).ready(function () {

    console.log('companies.js loaded');

    $inputSearch = $('#input_search_company');
    $tableBody = $('#table_body_companies');
    $dirbaseurl = "http://localhost/fct/public/index.php";
    $dirbase = "http://localhost/fct/";

    $inputSearch.keyup(function () {
        if (($inputSearch.val() == '') || ($inputSearch.val().indexOf(' ') > -1)) {
            location.reload();
        } else { 
            showMatchingCompanies();
        }
    });
});