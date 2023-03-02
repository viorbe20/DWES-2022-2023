function deleteEmployee(employeeName) {
    $('#delete_message').append('Se ha eliminado el empleado ' + employeeName);
    $("#modal_delete_employee").css("display", "block");
}


$(document).ready(function () {
    console.log('on company_employees.js');

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