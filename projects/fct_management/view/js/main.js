$(document).ready(function () {
    // Add employee button click event from 'alta empresa'
    
    $("#add_employee_section").click(function () {
        $("#new_employee_data > section:nth-child(2)")
        .clone()
        .css("display", "flex")
        .appendTo("#new_employee_data");
        
        //Delete selected employee section
        let cancelSpan = $("#new_employee_data > section > span")
        console.log(cancelSpan);
        cancelSpan.each(function () {
            $(this).click(function () {
                $(this).parent().remove()
            })
        })
    });

});
