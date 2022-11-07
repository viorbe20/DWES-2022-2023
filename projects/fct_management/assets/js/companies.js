$(document).ready(function () {

    console.log('carga companies.js');

    // Add employees option
    $('#btn_add_employee').click(function () {
        //First show section
        //<div class="col-md-10 mb-4 d-none" id="section_employees" >
        $('#section_employees').removeClass('d-none');

    });

    // Search copanies box
    $("#input_search_company").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_body_companies tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    fetch(
        "http://localhost/dwes/projects/fct_management/public/index.php/home/companies/getCompaniesTable"
    )
        .then((response) => response.json())
        .then((data) => {

            if ($("#input_search_company").length == 1) {
                data.forEach((element) => {
                    console.log(element["c_name"]);
                    $("#table_body_companies").append(
                        `<tr>
                <td><img src="http://localhost/dwes/projects/fct_management/assets/img/logos/${element["c_logo"]}" alt='Logo de la empresa' width='50px' height='50px'></td>
                <td>${element["c_name"]}</td>
                <td>${element["c_phone"]}</td>
                <td><a href="http://localhost/dwes/projects/fct_management/public/index.php//home/companies/company_profile/${element['c_id']}"><span class="material-symbols-outlined">
                                group
                                </span></a></td>
                                <td><a href="http://localhost/dwes/projects/fct_management/public/index.php//home/companies/company_profile/${element['c_id']}"><span class="material-symbols-outlined">
                            delete
                            </span></a><a href="http://localhost/dwes/projects/fct_management/public/index.php//home/companies/company_profile/${element['c_id']}"><span class="material-symbols-outlined">
                        edit
                    </span></a></td>
            </tr>`);
                });
            }
        });



});
