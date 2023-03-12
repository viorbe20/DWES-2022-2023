$(document).ready(function () {

    console.log('companies.js loaded');

    $inputSearch = $('#input_search_company');
    $tableBody = $('#table_body_companies');
    $dirbaseurl = "http://localhost/fct/public/index.php";
    $dirbase = "http://localhost/fct/";

    console.log($dirbaseurl);

    $inputSearch.keyup(function () {
        if (($inputSearch.val() == '') || ($inputSearch.val().indexOf(' ') > -1)) {
            location.reload();
        } else {
            showMatchingCompanies();
        }
    });

    //Search box 2
    $companyBar = $('#company_bar');
    $tableCompanies = $('#dropdown_companies');
    $employeeDiv = $('#employee_select_div');
    $employeeSelect = $('#employee_select');

    $companyBar.keyup(function () {
        if (($companyBar.val() == '') || ($companyBar.val().indexOf(' ') > -1)) {
            console.log('ddddddd');
            location.reload();
        } else {
            console.log('aaaa');
            selectCompany();
        }
    });

    $companyBar.click(function () {
        $companyBar.val('');
        $('#employee_select option:first').val('');
        
    });
    

    let clickedOnLi = false;
    $tableCompanies.on('mousedown', function () {
        clickedOnLi = true;
    }).on('mouseup', function () {
        clickedOnLi = false;
    });

    $companyBar.on('input', function () {
        if (!clickedOnLi) {
            selectCompany();
        }
    });

    //Search box employees
    $employeeBar = $('#employee_bar');
    $tableEmployees = $('#dropdown_employees');
    $dirbaseurl = "http://localhost/fct/public/index.php";

    //students assignmets
    $employeeBar.keyup(function () {
        if (($employeeBar.val() == '') || ($employeeBar.val().indexOf(' ') > -1)) {
            location.reload();
        } else {
            showMatchingEmployeesAssignments();
        }
    });

});