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
function validateData(input) {

    input.prev().hide(); // Hides the span with the error message   

    $fieldValue = $.trim(input.val());

    if (isEmptyField($fieldValue)) {
        input.prev().html("Este campo es obligatorio");
        input.prev().show();
    } else {
        input.prev().hide();

        if (input.attr('id') == "c_phone") {  // Phone validation
            if (!isValidPhoneNumber($fieldValue)) {
                input.prev().html("El teléfono no es válido");
                input.prev().show();
            } else {
                input.prev().hide();
                input.css("background-color", "#d4edda");
                $c_phoneValidation = true;
            }
        } else if (input.attr('id') == "c_email") { // Email validation
            if (!isValidEmail($fieldValue)) {
                input.prev().html("El email no es válido");
                input.prev().show();
            } else {
                input.prev().hide();
                input.css("background-color", "#d4edda");
                $c_emailValidation = true;
            }
        } else if (input.attr('id') == "c_cif") { // CIF validation
            if (!isValidaCif($fieldValue)) {
                input.prev().html("El CIF no es válido");
                input.prev().show();
            } else {
                input.prev().hide();
                input.css("background-color", "#d4edda");
                $c_cifValidation = true;
            }
        } else { // Name validation
            input.prev().hide();
            input.css("background-color", "#d4edda");
            $c_nameValidation = true;
        }
    }
};


$(document).ready(function () {

    console.log('company_info.js loaded');

    $addCompanyForm = $("#form_company_info");
    $c_phoneValidation = false;
    $c_cifValidation = false;
    $c_emailValidation = false;
    $c_nameValidation = false;
    $companyInputs = $("#card_company").find($.trim("input:not(#c_logo)"));
    $companySpans = $("#card_company").find('span');
    $btnAddEmployee = $('#btn_add_employee');
    //$btnAddEmployee.prop('disabled', true);


    /**
     * Iterates over the inputs of the company card and checks if they are empty.
     */

    $companyInputs.each(function () {
        // Hides the span with the error message by default
        $(this).prev().hide();

        //Check if the input is empty when the user clicks out of it
        $(this).blur(function () {

            console.log($(this).val());
            validateData($(this));

            //Check empty spans
            $emptySpans = $companySpans.filter(function () {
                return $(this).is(':visible');
            });

            //If spans are hidden and data is validated, enables the button to add an employee and can create a company
            if (($emptySpans.length == 0) && $c_nameValidation && $c_phoneValidation && $c_cifValidation && $c_emailValidation) {
                $btnAddEmployee.prop('disabled', false);
            } else {
                $btnAddEmployee.prop('disabled', true);
            }
        });
    });


    //Click on add company button
    $addCompanyForm.submit(function (e) {
        e.preventDefault();

        //Check empty spans
        $emptySpans = $companySpans.filter(function () {
            return $(this).is(':visible');
        });

        //If empty spands and validated data show modal created copany
        if (($emptySpans.length == 0) && $c_nameValidation && $c_phoneValidation && $c_cifValidation && $c_emailValidation) {

            let formData = new FormData(this);

            fetch("http://localhost/dwes/projects/fct/public/index.php/home/create_company", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data == "createdCompany") {
                        $("#modal_create_company").css("display", "block");
                    }
                }
                )

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

    /**
     * Button to show modal to add an employee  
     */
    $('#btn_add_employee').on('click', function () {
        //Empty the inputs 
        $inputs = $('#modal_add_employee').find('input:not(#btn_modal_confirm_employee)');
        $inputs.each(function () {
            $(this).val("");
        });

        $('#modal_add_employee').css('display', 'block');
    }
    );
});