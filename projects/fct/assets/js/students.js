$(document).ready(function () {

    console.log('students.js loaded');

    /**
    * Modal upload students file
    */

    $('#btn_upload_students_file').on('click', function () {
        console.log($('#modal_add_company'));
        $('#modal_upload_students_file').css('display', 'block');

    });

    // Cancel modal upload students file
    $('#btn_modal_cancel_students_file').on('click', function () {
        $('#modal_upload_students_file').css('display', 'none');
    });

    // Exit modal upload students file
    $('#btn_modal_exit_upload_students_file').on('click', function () {
        $('#modal_upload_students_file').css('display', 'none');
    });

    //Confirm modal upload students file
    $('#btn_modal_confirm_students_file').on('click', function () {
        $('#modal_upload_students_file').css('display', 'none');

        // Send form values to php. If isset in php, then check the data and upload file
        $('#btn_modal_confirm_students_file').addEeventListener('submit'), function (e) {
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
