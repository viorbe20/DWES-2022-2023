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
});