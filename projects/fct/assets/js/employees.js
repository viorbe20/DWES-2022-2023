// function deleteEmployee(employeeName) {
//     $('#delete_message').append('Se ha eliminado el empleado ' + employeeName);
//     $("#modal_delete_employee").css("display", "block");
// }

//Nif validation
function isValidaNif(nif) {
    let regex = /^([KLMXYZ][\d]{7}|[\d]{8})[TRWAGMYFPDXBNJZSQVHLCKE]$/i;
    return regex.test(nif);
}


function validateEmployeeData(input) {

    input.prev().hide(); // Hides the span with the error message   

    $fieldValue = $.trim(input.val());

    if (isEmptyField($fieldValue)) {
        input.prev().html("Este campo es obligatorio");
        input.prev().show();
    } else {
        input.prev().hide();

        if (input.attr('id') == "e_nif") { //NIF validation
            if (!isValidaNif($fieldValue)) {
                input.prev().html("El NIF no es válido");
                input.prev().show();
            } else {
                input.prev().hide();
                input.css("background-color", "#d4edda");
                $e_nifValidation = true;
            }
        } else if (input.attr('id') == "e_job") { //Job validation
            input.prev().hide();
            input.css("background-color", "#d4edda");
            $e_jobValidation = true;
        } else {
            input.prev().hide(); // Name validation
            input.css("background-color", "#d4edda");
            $e_nameValidation = true;
        }
    }


};

$(document).ready(function () {


    console.log('employees.js loaded');

    $employeeInputs = $("#card_employee").find($.trim("input"));
    $employeeSpans = $("#card_employee").find('span');
    $employeesList = [];
    $addEmployeeForm = $("#form_add_employee");


    //Iterates over the inputs of the employee card and checks if they are empty.
    $employeeInputs.each(function () {

        $(this).prev().hide(); // Hides the span with the error message by default

        $(this).blur(function () { // When the input loses focus, it validates the input
            validateEmployeeData($(this));
        });
    });

    //Click on add employee button
    $addEmployeeForm.submit(function (e) {
        e.preventDefault();
        $e_nameValidation = $e_nifValidation = $e_jobValidation = false;
        $employeeInputs = $("#card_employee").find($.trim("input"));

        //iterates employee inputs and validates them
        $employeeInputs.each(function () {
            validateEmployeeData($(this));
        });
        
        //If inputs are not empty and valid, it shows the modal
        if ($e_nameValidation && $e_nifValidation && $e_jobValidation) {
            //Save employee data in array
            $employeesList.push({
                e_name: $employeeInputs[0].value,
                e_nif: $employeeInputs[1].value,
                e_job: $employeeInputs[2].value
            });

            $('#modal_add_employee').css('display', 'none');
            $('#modal_employee_created').css('display', 'block');
        }
    });

    //Close modal add employee when click on cancel button
    $('#btn_modal_exit_employee').click(function () {
        $('#modal_add_employee').css('display', 'none');
    });

    //Close modal add employee when click on cancel button
    $('#btn_modal_cancel_employee').click(function () {
        $('#modal_add_employee').css('display', 'none');
    });

    //Close employee created confirmation modal
    $('#btn_modal_created_employee').click(function () {
        $('#modal_employee_created').css('display', 'none');
    });

    //Close modal add employee when click on X
    // $("#modal_employee_created  button").click(function () {
    //     $('#modal_delete_employee').css('display', 'none');
    // });

    //Close created employee modal
    // $('#close_created_employee').click(function () {
    //     $('#modal_employee_created').hide();
    // });

    /**
     * Searh employee box
     */
    // $("#input_search_employee").on("keyup", function () {
    //     var value = $(this).val().toLowerCase();
    //     $("#table_body_employees tr").filter(function () {
    //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    //     });
    // });
});