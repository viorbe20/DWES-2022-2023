console.log('my_functions.js loaded');

function getEmployees(companyId) {
    fetch(
        "http://localhost/fct/public/index.php/employees_db/" + companyId
    )
        .then((response) => response.json())
        .then((data) => {
            let html = "<label class='form-label mb-3' for='employee'>Empleado</label><select id='employee' class='form-control'>";
            data.forEach(function (employee) {
                html += `<option value="${employee.id}">${employee.name}</option>`;
            });
            html += "</select>";
            $("#employee-section").html(html);
        });
}

function selectCompany() {
    $tableCompanies.empty();
    
    fetch("http://localhost/fct/public/index.php/companies_db")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let query = $companyBar.val().toLowerCase();
            let filteredCompanies = data.filter(function (company) {
                return company.name.toLowerCase().indexOf(query) > -1;
            });

            filteredCompanies.forEach(function (company) {
                $tableCompanies.css('display', 'block');
                let li = $(`<li class="list-group-item">${company['name']}</li>`);
                li.click(function () {
                    $companyBar.val(company['name']);
                    $tableCompanies.css('display', 'none'); // Oculta la lista desplegable
                    let companyId = company['id'];

                    fetch(`http://localhost/fct/public/index.php/employees_db`)
                        .then((response) => response.json())
                        .then((data) => {
                            let filteredEmployees = data.filter(function (employee) {
                                return employee.company_id_fk == companyId;
                            });

                            let select = $('<select class="form-select" name="employee"></select>');
                            
                            filteredEmployees.forEach(function (employee) {
                                let option = $(`<option value="${employee.id}">${employee.name} ${employee.surnames}</option>`);
                                select.append(option);
                            });

                            $employeeDiv.empty();
                            $employeeDiv.append(select);
                        })
                        .catch((error) => console.log(error));
                });
                $tableCompanies.append(li);
            });
        })
        .catch((error) => console.log(error));
}



function showMatchingStudents() {

    $tableStudents.empty();

    fetch(
        "http://localhost/fct/public/index.php/students_db"
    )
        .then((response) => response.json())
        .then((data) => {
            let query = $studentBar.val().toLowerCase();
            let filteredStudents = data.filter(function (student) {
                return student.name.toLowerCase().indexOf(query) > -1 || student.surnames.toLowerCase().indexOf(query) > -1;
            });

            filteredStudents.forEach(function (student) {
                $tableStudents.css('display', 'block');
                $tableStudents.append(
                    `<a href="url_del_destino" style="text-decoration:none; color:black;"><li class="list-group-item">${student['name']} ${student['surnames']}</li></a>`
                );

            });
        }
        )
}

function showMatchingCompanies() {
    $tableBody.empty();

    fetch(
        "http://localhost/fct/public/index.php/companies_db"
    )
        .then((response) => response.json())
        .then((data) => {
            let query = $inputSearch.val().toLowerCase();
            let filteredCompanies = data.filter(function (company) {
                return company.name.toLowerCase().indexOf(query) > -1;
            });


            filteredCompanies.forEach(function (company) {
                $tableBody.append(
                    `<tr>
                    <td><img src="${$dirbase}assets/img/logos/${company["logo"]}" style="width: 2rem"></td>
                    <td>${company["name"]}</td>
                    <td>${company["phone"]}</td>
                    <td>
                    <a href="${$dirbaseurl}/companies/delete_company/${company['id']}">
                    <span class="material-symbols-outlined">delete</span></a>
                    <a href="${$dirbaseurl}/companies/company_profile/${company['id']}">
                    <span class="material-symbols-outlined">visibility</span></a>
                    </td>
                    </tr>`
                );
            });
        }
        )
}

