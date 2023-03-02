// function deleteEmployee(employeeName) {
//     $('#delete_message').append('Se ha eliminado el empleado ' + employeeName);
//     $("#modal_delete_employee").css("display", "block");
// }

//Cif validation
function isValidaCif(cif) {
    let regex = /^[ABCDEFGHJNPQRSUVW][\d]{7}[\dA-J]$/i;
    return regex.test(cif);
}


function validateEmployeeData(input) {

    input.prev().hide(); // Hides the span with the error message   

    $fieldValue = $.trim(input.val());

    if (isEmptyField($fieldValue)) {
        input.prev().html("Este campo es obligatorio");
        input.prev().show();
    } else {
        input.prev().hide();

        //Cif validation
        if (input.attr('id') == "e_nif") {
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

    console.log('employees.js loaded');

    $employeeInputs = $("#card_employee").find($.trim("input:not(#c_logo)"));
    $employeeSpans = $("#form_add_employee").find('span');

    //Iterates over the inputs of the employee card and checks if they are empty.
    $employeeInputs.each(function () {

        $(this).prev().hide(); // Hides the span with the error message by default

        $(this).blur(function () { // When the input loses focus, it validates the input
            validateEmployeeData($(this));
        });
    });

    let addEmployeeForm = $("#form_add_employee");
    
    //Click on add employee button
    addEmployeeForm.submit(function (e) {
        e.preventDefault();
        validateEmployeeData($employeeInputs);

        //If inputs are not empty and valid, it shows the modal
        if (validateEmployeeData($employeeInputs) && $c_cifValidation ) {
        
            //If validates, keeps the data into an array
            let employeeData = [];
            $employeeInputs.each(function () {
                employeeData.push($(this).val());
            });
    
            employeeData.array.forEach(element => {
                console.log( element );
            });
        } 
        

    });


    //Close modal add employee when click on cancel button
    $('#btn_modal_cancel_employee').click(function () {
        $('#modal_delete_employee').css('display', 'none');
        window.location.reload();
    });

    //Close modal add employee when click on X
    $("#btn_modal_exit_employee > span").click(function () {
        $('#modal_delete_employee').css('display', 'none');
        window.location.reload();
    });

    /**
     * Searh employee box
     */
    $("#input_search_employee").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_body_employees tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});