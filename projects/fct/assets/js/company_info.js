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
     * Button to add an employee
     */
    $('#btn_add_employee').on('click', function () {
        console.log('add employee button clicked');
        $('#modal_add_employee').css('display', 'block');
    }
    );
});