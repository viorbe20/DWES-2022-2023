$(document).ready(function () {

    console.log('assignments.js loaded');

    //When user select a group, students from that group will be loaded
    $("#group_select_assignment").change(function () {

        
        //Get the id of the selected group, ayear and term from the form
        let selectedGroupId = $('#selected_group_id option:selected').val();
        let selectedAyearId = $('#selected_ayear_id').val();
        let selectedTermId = $('#selected_term_id').val();
        // console.log(selectedGroupId);
        // console.log(selectedAyearId);
        // console.log(selectedTermId);
        
        //Fetch to get the students from the selected group
        fetch(
            "http://localhost/dwes/projects/fct/public/index.php/students_by_group/" + selectedAyearId + "_" + selectedTermId + "_" + selectedGroupId
        )
            .then((response) => response.json())
            .then((data) => {
                //Empty the select
                $("#student_select_assignment").empty();
                //Append the students to the select
                data.forEach((element) => {
                    $("#student_select_assignment").append(
                        `<option value="${element["id"]}">${element["name"]} ${element["surname"]}</option>`
                    );
                });
            }
        );
    });

    /**
     * Fetch to get all the calls
     */
    
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/assignments_table"
    )
        .then((response) => response.json())
        .then((data) => {
                data.forEach((element) => {
                    $("#table_body_assignments").append(
                        `<tr>
                <td>${element}</td>
                <td>
                <a href="http://localhost/dwes/projects/fct/public/index.php/calls/call_assignments/${element["call_id"]}">
                <span class="material-symbols-outlined">join_inner</span></a>
                </td>
            </tr>`
                    );
                });
        });
});
