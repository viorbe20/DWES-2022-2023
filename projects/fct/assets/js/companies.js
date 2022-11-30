function isValidaCif(cif) {
    let regex = /^[ABCDEFGHJNPQRSUVW][\d]{7}[\dA-J]$/i;
    return regex.test(cif);
}

function isValidaNif(nif) {
    let regex = /^([KLMXYZ][\d]{7}|[\d]{8})[TRWAGMYFPDXBNJZSQVHLCKE]$/i;
    return regex.test(dni);
}

function isValidEmail(email) {
    let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    //^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$
    return regex.test(email);
}

function isValidPhoneNumber(phoneNumber) {
    let regex = /^(\+34|0034|34)?[6789]\d{8}$/;
    return regex.test(phoneNumber);
}

function isEmptyField(field) {
    if (field == "") {
        return true;
    } else {
        return false;
    }
}

function deleteCompany(companyId) {
    $('#delete_message').append('Se ha eliminado la empresa con id ' + companyId);
    $("#modal_delete_company").css("display", "block");
}

$(document).ready(function () {

    $companyInputs = $("#card_company").find($.trim("input:not(#c_logo)"));
    $companySpans = $("#card_company").find('span');
    $c_phoneValidation = false;
    $c_cifValidation = false;
    $c_emailValidation = false;

    //When blur, check if it is empty and validaes it
    $companyInputs.each(function () {
        $(this).prev().hide();

        $(this).blur(function () {

            $fieldValue = $.trim($(this).val());

            if (isEmptyField($fieldValue)) {
                $(this).prev().html("Este campo es obligatorio");
                $(this).prev().show();
            } else {
                $(this).prev().hide();

                // Phone number validation
                if ($(this).attr('id') == "c_phone") {
                    if (!isValidPhoneNumber($fieldValue)) {
                        $(this).prev().html("El teléfono no es válido");
                        $(this).prev().show();
                    } else {
                        $(this).prev().hide();
                        $(this).css("background-color", "#d4edda");
                    }
                }

                // Email validation
                if ($(this).attr('id') == "c_email") {
                    if (!isValidEmail($fieldValue)) {
                        $(this).prev().html("El email no es válido");
                        $(this).prev().show();
                    } else {
                        $(this).prev().hide();
                        $(this).css("background-color", "#d4edda");

                    }
                }

                //Cif validation
                if ($(this).attr('id') == "c_cif") {
                    if (!isValidaCif($fieldValue)) {
                        $(this).prev().html("El CIF no es válido");
                        $(this).prev().show();
                    } else {
                        $(this).prev().hide();
                        $(this).css("background-color", "#d4edda");

                    }
                }
            }
        });
    });

    let addCompanyForm = $("#form_company_profile");

    //When submit, check if all fields are valid
    addCompanyForm.submit(function (e) {
        e.preventDefault();

        //When submit form, check all the inputs
        $companyInputs.each(function () {
            $fieldValue = $.trim($(this).val());

            if (isEmptyField($fieldValue)) {
                $(this).prev().html("Este campo es obligatorio");
                $(this).prev().show();
            } else {
                $(this).prev().hide();

                // Phone number validation
                if ($(this).attr('id') == "c_phone") {
                    if (!isValidPhoneNumber($fieldValue)) {
                        $(this).prev().html("El teléfono no es válido");
                        $(this).prev().show();
                    } else {
                        $(this).prev().hide();
                        $(this).css("background-color", "#d4edda");
                        $c_phoneValidation = true;
                    }
                }

                // Email validation
                if ($(this).attr('id') == "c_email") {
                    if (!isValidEmail($fieldValue)) {
                        $(this).prev().html("El email no es válido");
                        $(this).prev().show();
                    } else {
                        $(this).prev().hide();
                        $(this).css("background-color", "#d4edda");
                        $c_emailValidation = true;
                    }
                }

                //Cif validation
                if ($(this).attr('id') == "c_cif") {
                    if (!isValidaCif($fieldValue)) {
                        $(this).prev().html("El CIF no es válido");
                        $(this).prev().show();
                    } else {
                        $(this).prev().hide();
                        $(this).css("background-color", "#d4edda");
                        $c_cifValidation = true;
                    }
                }
            }
        });

        //If validated, takes info from php file
        if ($c_emailValidation && $c_cifValidation && $c_phoneValidation) {

            let formData = new FormData(this);

            fetch("http://localhost/dwes/projects/fct_management/public/index.php/home/create_company", {
                method: "POST",
                body: formData
            })

                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data == "createdCompany") {
                        $("#modal_create_company").css("display", "block");
                    }
                })
        }
    });

    /**
     * Click on add employee button
     * It validates if the company has been created
     * If it has, it shows the modals to add an employee
     * If not, it shows warning messages to create the company first
     */
    $("#btn_add_employee").click(function () {

        //All empty spans and full inputs validation
        $companySpans = $("#card_company").find("span").val() != "";
        $companyInputs = $("#card_company").find("input").val() == "";

        // After validation, if there are no errors, modal is shown
        if (!$companySpans && !$companyInputs) {
            $class = $("#section_employees").attr("class");

            // If company data is valid, employees section is shown after clicking on add employees button
            if ($class.indexOf("d-none") > -1) {
                $("#section_employees").removeClass("d-none");
            }

            // Clone new card
            $clone = $("#card_header").next().clone();

            //Get id for new card
            $lastId = $("#card_header").next().attr("id");
            $number = $lastId.split("_")[2];
            $idParsed = parseInt($number);
            $idParsed = $idParsed + 1;
            $newId = "card_employee_" + $idParsed.toString();
            $newCard = $clone.removeClass("d-none");
            $newCard.attr("id", $newId);
            $newCard.find("input").val(""); // Clear input values

            // Add new card
            $newCard.insertAfter("#card_header");

            //Delete an employee
            $deleteButtons = $(".delete_btn");

            $deleteButtons.each(function () {
                $(this).click(function () {
                    $(this).parent().parent().remove();
                });
            });
        } else {
            $("#card_company").find("span").each(function () {
                $(this).html("Este campo es obligatorio");
                $(this).show();
            });
        }
    });

    // Search companies box
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
        "http://localhost/dwes/projects/fct_management/public/index.php/home/companies/getCompaniesTable"
    )
        .then((response) => response.json())
        .then((data) => {
            if ($("#input_search_company").length == 1) {
                data.forEach((element) => {
                    $("#table_body_companies").append(
                        `<tr>
                <td><img src="http://localhost/dwes/projects/fct_management/assets/img/logos/${element["c_logo"]}" alt='Logo de la empresa' width='50px' height='50px'></td>
                <td>${element["c_name"]}</td>
                <td>${element["c_phone"]}</td>
                <td>
                <a href="http://localhost/dwes/projects/fct_management/public/index.php/home/companies/company_profile/${element["c_id"]}">
                <span class="material-symbols-outlined">group</span></a>
                </td>
                <td>
                <a href="#" target="_self" onclick="deleteCompany(${element["c_id"]})">
                <span class="material-symbols-outlined" id="company_delete_icon_${element['c_id']}">
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
