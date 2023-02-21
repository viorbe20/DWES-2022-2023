$(document).ready(function () {

    console.log('students.js loaded');

    let tableBody = $('#table_body_students');
    let inputSearch = $('#input_search_student');
    let shownStudents = 5;

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
     * Get students from database
     * If inputsearch is empty show the first 5 students
     * If inputsearch has value, show the students that match with the input value
     */
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/students_table"
    )
        .then((response) => response.json())
        .then((data) => {
            //Show some students for default
            for (let i = 0; i < shownStudents; i++) {
                $("#table_body_students").append(
                    `<tr>
                    <td>${data[i]["s_name"]}</td>
                    <td>${data[i]["s_surname1"]}</td>
                    <td>${data[i]["s_surname2"]}</td>
                </tr>`
                );
            }
            //If inputsearch is empty show the first 5 students
            inputSearch.on('keyup', function () {
                if ((inputSearch.val() == '') || (inputSearch.val().indexOf(' ') > -1)) {
                    tableBody.empty();
                    for (let i = 0; i < shownStudents; i++) {
                        $("#table_body_students").append(
                            `<tr>
                            <td>${data[i]["s_name"]}</td>
                            <td>${data[i]["s_surname1"]}</td>
                            <td>${data[i]["s_surname2"]}</td>
                        </tr>`
                        );
                    }
                } else { //If inputsearch has value, show the students that match with the input value
                    tableBody.empty();
                    let query = inputSearch.val().toLowerCase();
                    let filteredStudents = data.filter(function (student) {
                        return student.s_name.toLowerCase().indexOf(query) > -1 || student.s_surname1.toLowerCase().indexOf(query) > -1 || student.s_surname2.toLowerCase().indexOf(query) > -1;
                    });
                    filteredStudents.forEach(function (student) {
                        tableBody.append(
                            `<tr>
                            <td>${student["s_name"]}</td>
                            <td>${student["s_surname1"]}</td>
                            <td>${student["s_surname2"]}</td>
                        </tr>`
                        );
                    });
                }
            });

        }
    )
});