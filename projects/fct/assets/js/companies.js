function deleteCompany(companyId) {
    $('#delete_message').append('Se ha eliminado la empresa con id ' + companyId);
    $("#modal_delete_company").css("display", "block");
}

$(document).ready(function () {

    console.log('companies.js loaded');

    let tableBody = $('#table_body_companies');
    let inputSearch = $('#input_search_company');
    let shownCompanies = 5;

    /**
     * Get all companies from database
     * Show the first 5 companies
     * If inputsearch is empty show the first 5 companies
     * If inputsearch has value, show the companies that match with the input value
     */
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/companies_table"
    )
        .then((response) => response.json())
        .then((data) => {
            for (let i = 0; i < shownCompanies; i++) {
                $("#table_body_companies").append(
                    `<tr>
                                <td><img src="http://localhost/dwes/projects/fct/assets/img/logos/${data[i]["c_logo"]}" alt='Logo de la empresa' width='50px' height='50px'></td>
                                <td>${data[i]["c_name"]}</td>
                                <td>${data[i]["c_phone"]}</td>
                                <td>
                <a href="http://localhost/dwes/projects/fct/public/index.php/companies/company_employees/${data[i]["c_id"]}">
                <span class="material-symbols-outlined">group</span></a>
                </td>
                <td>
                <a href="#" target="_self" onclick="deleteCompany(${data[i]["c_id"]})">
                <span class="material-symbols-outlined" id="company_delete_icon_${data[i]['c_id']}">
                delete
                </span></a>
                <a href="http://localhost/dwes/projects/fct/public/index.php/home/edit_company/${data[i]["c_id"]} class="company_href"">
                <span class="material-symbols-outlined">edit</span></a>
                </td>
                </tr>`
                );
            }
            //If inputsearch is empty show the first 5 companies
            inputSearch.on('keyup', function () {
                if ((inputSearch.val() == '') || (inputSearch.val().indexOf(' ') > -1)) {
                    tableBody.empty();
                    for (let i = 0; i < shownCompanies; i++) {
                        $("#table_body_companies").append(
                            `<tr>
                            <td><img src="http://localhost/dwes/projects/fct/assets/img/logos/${data[i]["c_logo"]}" alt='Logo de la empresa' width='50px' height='50px'></td>
                            <td>${data[i]["c_name"]}</td>
                            <td>${data[i]["c_phone"]}</td>
                            <td>
                            <a href="http://localhost/dwes/projects/fct/public/index.php/companies/company_employees/${data[i]["c_id"]}">
                            <span class="material-symbols-outlined">group</span></a>
                            </td>
                            <td>
                            <a href="#" target="_self" onclick="deleteCompany(${data[i]["c_id"]})">
                            <span class="material-symbols-outlined" id="company_delete_icon_${data[i]['c_id']}">
                            delete
                            </span></a>
                            <a href="http://localhost/dwes/projects/fct/public/index.php/home/edit_company/${data[i]["c_id"]} class="company_href"">
                            <span class="material-symbols-outlined">edit</span></a>
                            </td>
                        </tr>`
                        );
                    }
                } else { //If inputsearch has value, show the companies that match with the input value
                    tableBody.empty();
                    let query = inputSearch.val().toLowerCase();
                    let filteredCompanies = data.filter(function (company) {
                        return company.c_name.toLowerCase().indexOf(query) > -1;
                    });

                    filteredCompanies.forEach(function (company) {
                        tableBody.append(
                            `<tr>
                            <td><img src="http://localhost/dwes/projects/fct/assets/img/logos/${company["c_logo"]}" alt='Logo de la empresa' width='50px' height='50px'></td>
                            <td>${company["c_name"]}</td>
                            <td>${company["c_phone"]}</td>
                            <td>
                            <a href="http://localhost/dwes/projects/fct/public/index.php/companies/company_employees/${company["c_id"]}">
                            <span class="material-symbols-outlined">group</span></a>
                            </td>
                            <td>
                            <a href="#" target="_self" onclick="deleteCompany(${company["c_id"]})">
                            <span class="material-symbols-outlined" id="company_delete_icon_${company['c_id']}">
                            delete
                            </span></a>
                            <a href="http://localhost/dwes/projects/fct/public/index.php/home/edit_company/${company["c_id"]} class="company_href"">
                            <span class="material-symbols-outlined">edit</span></a>
                        </tr>`
                        );
                    });
                }
            });
        }
    )

    /**
    * Modal delete company
    * Click on X button
    */
    $("#modal_delete_company #span_modal_exit").click(function () {
        $("#modal_delete_company").css("display", "none");
    });

    /**
     * Modal delete company
     * Click on close button, close modal.
     */
    $("#modal_delete_company #btn_modal_exit").click(function () {
        $("#modal_delete_company").css("display", "none");
        window.location.href =
            "http://localhost/dwes/projects/fct/public/index.php/companies";
    });

    /**
     * Modal delete company
     * Click on create another company
     */
    $("#modal_delete_company #btn_modal_reload").click(function () {
        $("#modal_delete_company").css("display", "none");
        window.location.reload();
    });
});
