$(document).ready(function () {

    console.log('assignments.js loaded');

    //When user select a group, students from that group will be loaded
    $("#selected_group_id").change(function () {

        console.log('Group selected');

        //Get the id of the selected group, ayear and term from the form
        let selectedGroupId = $('#selected_group_id option:selected').val();
        let selectedAyearId = $('#selected_ayear_id').val();
        let selectedTermId = $('#selected_term_id').val();

        fetch("http://localhost/dwes/projects/fct/public/index.php/students_by_group/" + selectedAyearId + "_" + selectedTermId + "_" + selectedGroupId)
            .then(response => response.json())
            .then(data => {
                if (data.status == 'error') {
                    printMessage(data.message, 'error');
                } else {
                    //Append the students to the select
                    $("#student_select").empty();
                    data.forEach((element) => {
                        $("#student_select").append(
                            `<option value="${element["s_id"]}">${element["s_surname1"]} ${element["s_surname2"]}, ${element["s_name"]}  </option>`
                        );
                    });
                }

            });
    });



        // //Fetch to get the students from the selected group
        //     fetch(
        //         "http://localhost/dwes/projects/fct/public/index.php/students_by_group/" + selectedAyearId + "_" + selectedTermId + "_" + selectedGroupId
        //     )
        //         .then((response) => response.json())
        //         .then((data) => {
        //             //Append the students to the select
        //             $("#student_select").empty();
        //             data.forEach((element) => {
        //                 //console log show how many elements
        //                 console.log('Hay ' + data.length + ' elementos');
        //                 $("#student_select").append(
        //                     `<option value="${element["s_id"]}">${element["s_surname1"]} ${element["s_surname2"]}, ${element["s_name"]}  </option>`
        //                 );
        //             });
        //         }
        //         );
        // });

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
