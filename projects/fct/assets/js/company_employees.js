function getCompanyId() {
    $url = window.location.href;
    $segments = $url.split('/');
    $id_company = $segments[$segments.length - 1];
    $id_company = $id_company.toString();
    return $id_company;
}

function showAllEmployees() {
    $id_company = getCompanyId();
    console.log($id_company);
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/employees_table/" + $id_company
    )
        .then((response) => response.json())
        .then((data) => {
            $tableBody.empty();
            for (let i = 0; i < $shownEmployees; i++) {
                $tableBody.append(
                    `<tr>
                    <td>${data[i]["emp_name"]}</td>
                    <td>${data[i]["emp_job"]}</td>
                    <td>
                    <a href="#" target="_self" onclick="deleteEmployee(${data[i]["emp_id"]})">
                    <span class="material-symbols-outlined" id="employee_delete_icon_${data[i]['emp_id']}">
                    delete
                    </span></a>
                    <a href="http://localhost/dwes/projects/fct/public/index.php/edit_employee/${data[i]["emp_id"]} class="employee_href"">
                    <span class="material-symbols-outlined">edit</span></a>
                    </td>
                    </tr>`
                );
            }
        });
}

function showAutocompleteEmployees() {
    $id_company = getCompanyId();

    $tableBody.empty();
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/employees_table/" + $id_company
    )
        .then((response) => response.json())
        .then((data) => {
            $tableBody.empty();
            $query = $inputSearchEmployee.val().toLowerCase();
            $filteredEmployees = data.filter(function (employee) {
                return employee.emp_name.toLowerCase().indexOf($query) > -1;
            });

            $filteredEmployees.forEach(function (employee) {
                $tableBody.append(
                    `<tr>
                            <td>${employee.emp_name}</td>
                            <td>${employee.emp_job}</td>
                            <td>
                            <a href="#" target="_self" onclick="deleteEmployee(${employee.emp_id})">
                            <span class="material-symbols-outlined" id="employee_delete_icon_${employee['emp_id']}">
                            delete
                            </span></a>
                            <a href="http://localhost/dwes/projects/fct/public/index.php/edit_employee/${employee["emp_id"]} class="employee_href"">
                            <span class="material-symbols-outlined">edit</span></a>
                            </td>
                            </tr>`
                );
            });
        }
        );
}

$(document).ready(function () {

    console.log('company_employees.js loaded');
    getCompanyId();
    $tableBody = $('#table_body_employees');
    $shownEmployees = 5;
    $inputSearchEmployee = $('#input_search_employee');

    showAllEmployees();

    //Search employees box
    $inputSearchEmployee.on('keyup', function () {
        if (($inputSearchEmployee.val() == '') || ($inputSearchEmployee.val().indexOf(' ') > -1)) {
            showAllEmployees();
        } else {
            showAutocompleteEmployees();
        }
    });
});


