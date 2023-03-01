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
/**
* Iterates over the inputs of the company card and checks if they are empty.
*/
function validateInputs(input) {

    input.prev().hide(); // Hides the span with the error message   

    $fieldValue = $.trim(input.val());

    if (isEmptyField($fieldValue)) {
        input.prev().html("Este campo es obligatorio");
        input.prev().show();
    } else {
        input.prev().hide();

        // Phone number validation
        if (input.attr('id') == "c_phone") {
            if (!isValidPhoneNumber($fieldValue)) {
                input.prev().html("El teléfono no es válido");
                input.prev().show();
            } else {
                input.prev().hide();
                input.css("background-color", "#d4edda");
                $c_phoneValidation = true;
            }
        }

        // Email validation
        if (input.attr('id') == "c_email") {
            if (!isValidEmail($fieldValue)) {
                input.prev().html("El email no es válido");
                input.prev().show();
            } else {
                input.prev().hide();
                input.css("background-color", "#d4edda");
                $c_emailValidation = true;
            }
        }

        //Cif validation
        if (input.attr('id') == "c_cif") {
            if (!isValidaCif($fieldValue)) {
                input.prev().html("El CIF no es válido");
                input.prev().show();
            } else {
                input.prev().hide();
                input.css("background-color", "#d4edda");
                $c_cifValidation = true;
            }
        }
    }


};


$(document).ready(function () {

    console.log('company_info.js loaded');

    $c_phoneValidation = false;
    $c_cifValidation = false;
    $c_emailValidation = false;
    $companyInputs = $("#card_company").find($.trim("input:not(#c_logo)"));
    $companySpans = $("#card_company").find('span');

    /**
     * Iterates over the inputs of the company card and checks if they are empty.
     */

    $companyInputs.each(function () {

        $(this).prev().hide(); // Hides the span with the error message by default

        $(this).blur(function () { // When the input loses focus, it validates the input
            validateInputs($(this));
        });
    });

    /**
     * Click on add company button
     */
    let addCompanyForm = $("#form_company_info");

    addCompanyForm.submit(function (e) {
        e.preventDefault();
        validateInputs($companyInputs);

        //If validated, takes info from php file
        if ($c_emailValidation && $c_cifValidation && $c_phoneValidation) {
            console.log('validated');
            let formData = new FormData(this);

            fetch("http://localhost/dwes/projects/fct/public/index.php/home/create_company", {
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

    /**
     * Click on add company button on modal
     */
    $("#span_modal_exit").click(function () {
        $("#modal_create_company").css("display", "none");
    });

    /**
     * Modal created company
     * Click on close button 
     */
    $("#btn_modal_exit").click(function () {
        $("#modal_create_company").css("display", "none");
        window.location.href =
            "http://localhost/dwes/projects/fct/public/index.php/companies";
    });

    /**
     * Modal created company
     * Click on create another company button
     */
    $("#btn_modal_reload").click(function () {
        $("#modal_create_company").css("display", "none");
        window.location.reload();
    });
});