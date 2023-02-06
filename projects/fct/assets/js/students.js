$(document).ready(function () {

    console.log('students.js loaded');

    /**
    * Modal upload students file
    */

    $('#btn_upload_students_file').on('click', function () {
        console.log('qqqqqqqqqqqq');
        console.log($('#modal_add_company'));
        $('#modal_add_company').css('display', 'block');

    });

    // Cancel modal add class
    $('#btn_upload_students_file').on('click', function () {
        $('#modal_upload_students_file').css('display', 'none');
    });

    // Exit modal add class
    $('#btn_modal_exit_call').on('click', function () {
        $('#modal_upload_students_file').css('display', 'none');
    });

    //Confirm modal add class
    $('#btn_modal_confirm_call').on('click', function () {
        $('#modal_add_call').css('display', 'none');

        // Send form values to php
        $('#form_upload_students_file').addEeventListener('submit'), function (e) {
            e.preventDefault();
        }
    });


    /**
     * Search student box
     */
    $("#input_search_student").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_body_students tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    /**
     * Fetch to get all the students
     */
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/students_table"
    )
        .then((response) => response.json())
        .then((data) => {
            if ($("#input_search_student").length == 1) {
                data.forEach((element) => {
                    $("#table_body_students").append(
                        `<tr>
                    <td>${element["s_name"]}</td>
                    <td>${element["s_surname1"]}</td>
                    <td>${element["s_surname2"]}</td>
                </tr>`
                    );
                });
            }
        });
});
