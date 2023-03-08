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
                    <td><img src="${$dirbase}/assets/img/logos/unknown.png"></td>
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

