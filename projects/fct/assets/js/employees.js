function deleteCompany(companyId) {
    $('#delete_message').append('Se ha eliminado la empresa con id ' + companyId);
    $("#modal_delete_company").css("display", "block");
}

$(document).ready(function () {

    /**
     * Searh employee box
     */
    $("#input_search_employees").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_body_employees tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    /**
     * Fetch to get all the employees
     */
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/employees_table"
    )
        .then((response) => response.json())
        .then((data) => {
            if ($("#input_search_employee").length == 1) {
                data.forEach((element) => {
                    $("#table_body_employees").append(
                        `<tr>
                <td>${element["emp_name"]}</td>
                <td>${element["emp_id"]}</td>
                <td>
                <a href="http://localhost/dwes/projects/fct/public/index.php/home/companies/company_profile/${element["emp_id"]}">
                <span class="material-symbols-outlined">group</span></a>
                </td>
                <td>
                <a href="#" target="_self" onclick="deleteCompany(${element["emp_id"]})">
                <span class="material-symbols-outlined" id="company_delete_icon_${element['emp_id']}">
                delete
                </span></a>
                <a href="http://localhost/dwes/projects/fct_management/public/index.php/home/edit_company/${element["c_id"]} class="company_href"">
                <span class="material-symbols-outlined">edit</span></a>
                </td>
            </tr>`
                    );
                });
            }
        });

    //Modal create company
    // When click on X, close the modal
    $("#span_modal_exit").click(function () {
        $("#modal_create_company").css("display", "none");
    });

    //When click on modal close button
    $("#btn_modal_exit").click(function () {
        $("#modal_create_company").css("display", "none");
        window.location.href =
            "http://localhost/dwes/projects/fct_management/public/index.php/home/companies";
    });

    //When click on create another company
    $("#btn_modal_reload").click(function () {
        $("#modal_create_company").css("display", "none");
        window.location.reload();
    });

    //Modal delete company
    // When click on X, close the modal
    $("#modal_delete_company #span_modal_exit").click(function () {
        $("#modal_delete_company").css("display", "none");
    });

    //When click on modal close button
    $("#modal_delete_company #btn_modal_exit").click(function () {
        $("#modal_delete_company").css("display", "none");
        window.location.href =
            "http://localhost/dwes/projects/fct_management/public/index.php/home/companies";
    });

    //When click on create another company
    $("#modal_delete_company #btn_modal_reload").click(function () {
        $("#modal_delete_company").css("display", "none");
        window.location.reload();
    });
});
