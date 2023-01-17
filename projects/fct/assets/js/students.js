$(document).ready(function () {

    console.log('students.js loaded');

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
                    <td>
                    <a href="#" target="_self" onclick="deleteStudent(${element["s_id"]})">
                    <span class="material-symbols-outlined" id="student_delete_icon_${element['S_id']}">
                    delete
                    </span></a>
                    </td>
                </tr>`
                    );
                });
            }
        });
});
