// Add employee button click event from 'alta empresa'
$(document).ready(function () {

    $("#add_employee_section").click(function () {
        $("#new_employee_data > section:nth-child(2)").clone().css("display", "flex").appendTo("#new_employee_data");
    });
});
