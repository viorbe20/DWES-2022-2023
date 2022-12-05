function deleteCompany(companyId) {
    $('#delete_message').append('Se ha eliminado la empresa con id ' + companyId);
    $("#modal_delete_company").css("display", "block");
}

$(document).ready(function () {


    /**
     * Search company box
     */
    $("#input_search_company").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_body_companies tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    /**
     * Fetch to get all the companies
     */
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/companies_table"
    )
        .then((response) => response.json())
        .then((data) => {
            if ($("#input_search_company").length == 1) {
                data.forEach((element) => {
                    $("#table_body_companies").append(
                        `<tr>
                <td><img src="http://localhost/dwes/projects/fct/assets/img/logos/${element["c_logo"]}" alt='Logo de la empresa' width='50px' height='50px'></td>
                <td>${element["c_name"]}</td>
                <td>${element["c_phone"]}</td>
                <td>
                <a href="http://localhost/dwes/projects/fct/public/index.php/companies/company_employees/${element["c_id"]}">
                <span class="material-symbols-outlined">group</span></a>
                </td>
                <td>
                <a href="#" target="_self" onclick="deleteCompany(${element["c_id"]})">
                <span class="material-symbols-outlined" id="company_delete_icon_${element['c_id']}">
                delete
                </span></a>
                <a href="http://localhost/dwes/projects/fct/public/index.php/home/edit_company/${element["c_id"]} class="company_href"">
                <span class="material-symbols-outlined">edit</span></a>
                </td>
            </tr>`
                    );
                });
            }
        });

    /**
    * Modal created company
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
