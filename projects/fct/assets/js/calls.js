$(document).ready(function () {

    console.log('calls.js loaded');

    /**
     * Search calls box
     */
    $("#input_search_call").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_body_calls tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    /**
     * Fetch to get all the calls
     */
    
    fetch(
        "http://localhost/dwes/projects/fct/public/index.php/calls_table"
    )
        .then((response) => response.json())
        .then((data) => {
            if ($("#input_search_call").length == 1) {
                data.forEach((element) => {
                    $("#table_body_calls").append(
                        `<tr>
                <td>${element["ayear_date"]}</td>
                <td>${element["term_name"]}</td>
                <td>
                <a href="http://localhost/dwes/projects/fct/public/index.php/companies/call_asignations/${element["call_id"]}">
                <span class="material-symbols-outlined">join_inner</span></a>
                </td>
            </tr>`
                    );
                });
            }
        });
});
