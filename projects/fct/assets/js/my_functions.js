console.log('my_functions.js loaded');

function showMatchingUsers() {

    $tableUsers.empty();

    fetch(
        "http://localhost/fct/public/index.php/users_db"
    )
        .then((response) => response.json())
        .then((data) => {
            let query = $userBar.val().toLowerCase();
            let filteredUsers = data.filter(function (user) {
                return user.name.toLowerCase().indexOf(query) > -1 || user.username.toLowerCase().indexOf(query) > -1;
            });

            filteredUsers.forEach(function (user) {
                $tableUsers.css('display', 'block');
                $tableUsers.append(
                    `<a href="${$dirbaseurl}/users/edit_user/${user['id']}" style="text-decoration:none; color:black;"><li class="list-group-item">${user['name']} - ${user['username']}</li></a>`
                );

            });
        }
        )
}

function showMatchingEmployeesAssignments() {
    $tableEmployees.empty();

    fetch("http://localhost/fct/public/index.php/employees_db")
        .then((response) => response.json())
        .then((data) => {
            let query = $employeeBar.val().toLowerCase();
            let filteredEmployees = data.filter(function (emp) {
                return (
                    emp.name.toLowerCase().indexOf(query) > -1 ||
                    emp.surnames.toLowerCase().indexOf(query) > -1
                );
            });

            filteredEmployees.forEach(function (emp) {
                $tableEmployees.css("display", "block");
                $tableEmployees.append(
                    `<a href="${$dirbaseurl}/assignment/employee/${emp.id}" style="text-decoration:none; color:black;">
                    <li class="list-group-item">${emp.name} ${emp.surnames} </li></a>`
                );
            });
        });
}


function showMatchingAssignments() {


    $tableStudents.empty();

    fetch(
        "http://localhost/fct/public/index.php/complete_assignments_db"
    )
        .then((response) => response.json())
        .then((data) => {
            let query = $studentBar.val().toLowerCase();
            let filteredAssignments = data.filter(function (assignment) {
                return assignment.student_name.toLowerCase().indexOf(query) > -1 || assignment.student_surnames.toLowerCase().indexOf(query) > -1;
            });

            filteredAssignments.forEach(function (assignment) {
                $tableStudents.css('display', 'block');
                $tableStudents.append(
                    `<a href="${$dirbaseurl}/students/${assignment.ayear}/${assignment.group_name}" style="text-decoration:none; color:black;">
                    <li class="list-group-item">${assignment.student_name} ${assignment.student_surnames} (${assignment.ayear}/${assignment.group_name}) </li></a>`
                );

            });
        }
        )
}

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
                    `<a href="${$dirbaseurl}/assignment/student/" style="text-decoration:none; color:black;"><li class="list-group-item">${student['name']} ${student['surnames']}</li></a>`
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
            console.log(query);
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

function showMatchingEmployees() {

    $tableBodyEmployees.empty();

    fetch(
        "http://localhost/fct/public/index.php/employees_db"
    )
        .then((response) => response.json())
        .then((data) => {
            let query = $searchEmployee.val().toLowerCase();
            let filteredEmployees = data.filter(function (employee) {
                return employee.name.toLowerCase().indexOf(query) > -1 || employee.surnames.toLowerCase().indexOf(query) > -1;
            });
            console.log(filteredEmployees);

            filteredEmployees.forEach(function (employee) {
                $tableBodyEmployees.append(
                    `<tr>
                <td>${employee["name"]} ${employee["surnames"]}</td>
                <td>${employee["job"]}</td>
                <td>
                <?php echo ${employee['name_student']} == '' ? '<a href="" class=""></a>' : $employee['name_student'] ?>
                <td>
                <td>
                <a href="${$dirbaseurl}/employees/edit_employee/${employee['id']}" class='btn btn-primary rounded-pill px-4 my-1'>Editar</a>
                ${employee["name_student"] == '' ?
                        `<a href="${$dirbaseurl}/assignment/employee/${employee['id']}" class="btn btn-success rounded-pill px-4 my-1">Asignar</a>` :
                        `<a href="${$dirbaseurl}/unassign/employee/${employee['assignment_id']}" class="btn btn-warning rounded-pill px-4 my-1">Desasignar</a>`
                    }
                </td>
                </tr>`
                );
            });
        }
        )
}