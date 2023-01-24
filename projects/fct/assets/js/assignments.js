$(document).ready(function () {

    console.log('assignments.js loaded');

    /**
     * Search calls box
     */
    // $("#input_search_call").on("keyup", function () {
    //     var value = $(this).val().toLowerCase();
    //     $("#table_body_calls tr").filter(function () {
    //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    //     });
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
