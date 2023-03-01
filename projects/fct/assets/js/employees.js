function deleteEmployee(employeeName) {
    $('#delete_message').append('Se ha eliminado el empleado ' + employeeName);
    $("#modal_delete_employee").css("display", "block");
}


$(document).ready(function () {

    console.log('employees.js loaded');

    //check inputs and spans and create new employee 
    $('#btn_modal_confirm_employee').click(function () {
        $('#modal_delete_employee').css('display', 'none');
        window.location.reload();
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

    /**
     * Modal delete employee
     * Click on close button, close modal.
     */
    $("#modal_delete_employee #btn_modal_exit").click(function () {
        $("#modal_delete_employee").css("display", "none");
        window.location.reload();
    });

    /**
    * Modal delete employee
    * Click on X button
    */
    $("#modal_delete_employee #span_modal_exit").click(function () {
        $("#modal_delete_employee").css("display", "none");
    });
});