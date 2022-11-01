$(document).ready(function () {
    //Check empty input fields
    let allInputs = $("#new_company_data > section > div > input");
    allInputs.each(function () {
    
        //If blur function is triggered check if the filed is required
        $(this).blur(function () {
            if ($(this).attr("required") == "required") {
                if ($(this).val() == "") {
                    //Show error message in the next span
                    $(this).next().text("Este campo es obligatorio").css("color", "red");
                } else {
                    $(this).next().text("");
                }
            }
        });
    });

    //Submit button click event
    $('#btn_add_new_company').click(function () {    
        let errorSpans = $("#new_company_data > section > div > span.error");
        $emptySpans = 0;

        //Check if the error spans are empty
        errorSpans.each(function () {
            if ($(this).text() == "") {
                console.log($(this).text());
                $emptySpans++;
            }
        });

        //If there are no empty spans submit the form
        if ($emptySpans == errorSpans.length) {
            $(document).ready(function() {
                alert ("Se ha creado la empresa."); 
            });
        } else {
            $(document).ready(function() {
                console.log("emptySpans = " + $emptySpans);
                console.log("errorSpans.length = " + errorSpans.length);
                alert ("Debes completar los campos obligatorios."); 
            });
        }
    });





    // Add employee button click event from 'alta empresa'
    $("#add_employee_section").click(function () {
        $("#new_employee_data > section:nth-child(2)")
        .clone()
        .css("display", "flex")
        .appendTo("#new_employee_data");
        
        //Delete selected employee section
        let cancelSpan = $("#new_employee_data > section > span")
        //console.log(cancelSpan);
        cancelSpan.each(function () {
            $(this).click(function () {
                $(this).parent().remove()
            })
        })
    });

});
