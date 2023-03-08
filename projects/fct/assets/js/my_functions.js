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

            console.log($dirbaseurl);
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

