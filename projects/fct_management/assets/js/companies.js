function isEmptyField(field) {
    if (field == "") {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function () {

    $companyInputs = $("#card_company").find("input");

    $companyInputs.each(function () {
        $(this).prev().hide();
        console.log($(this));

        $(this).blur(function () {
            $fieldValue = $.trim($(this).val());
            if (isEmptyField($fieldValue)) {
                $(this).prev().html("Este campo es obligatorio");
                $(this).prev().show();
            } else {
                $(this).prev().hide();
            }
        });
    });


    //Validate company fields 
    // $("#c_name").blur(function () {
    //     $c_name = $.trim($('#c_name').val());

    //     if (isEmptyField($c_name)) {
    //         $("#c_name").prev().html("El nombre de la empresa es obligatorio").css("display", "block");
    //         console.log('vacio');
    //     } else {
    //         $("#c_name").prev().html("").css("display", "none");
    //         console.log('no vacio');
    //     }
    // });

    // Click on create company button
    $("#btn_create_company").click(function (e) {
        e.preventDefault();

        $("#modal_create_company").css("display", "block");
    });

    // Add employees option
    $("#btn_add_employee").click(function () {
        $class = $("#section_employees").attr("class");

        if ($class.indexOf("d-none") > -1) {
            $("#section_employees").removeClass("d-none");
        }

        // Clone new card
        $clone = $("#card_header").next().clone();

        //Get id for new card
        $lastId = $("#card_header").next().attr("id");
        $number = $lastId.split("_")[2];
        $idParsed = parseInt($number);
        $idParsed = $idParsed + 1;
        $newId = "card_employee_" + $idParsed.toString();
        $newCard = $clone.removeClass("d-none");
        $newCard.attr("id", $newId);
        $newCard.find("input").val(""); // Clear input values

        // Add new card
        $newCard.insertAfter("#card_header");

        //Delete an employee
        $deleteButtons = $(".delete_btn");

        $deleteButtons.each(function () {
            $(this).click(function () {
                $(this).parent().parent().remove();
            });
        });
    });

    // Search companies box
    $("#input_search_company").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_body_companies tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    fetch(
        "http://localhost/dwes/projects/fct_management/public/index.php/home/companies/getCompaniesTable"
    )
        .then((response) => response.json())
        .then((data) => {
            if ($("#input_search_company").length == 1) {
                data.forEach((element) => {
                    console.log(element["c_name"]);
                    $("#table_body_companies").append(
                        `<tr>
                <td><img src="http://localhost/dwes/projects/fct_management/assets/img/logos/${element["c_logo"]}" alt='Logo de la empresa' width='50px' height='50px'></td>
                <td>${element["c_name"]}</td>
                <td>${element["c_phone"]}</td>
                <td><a href="http://localhost/dwes/projects/fct_management/public/index.php//home/companies/company_profile/${element["c_id"]}"><span class="material-symbols-outlined">
                                group
                                </span></a></td>
                                <td><a href="http://localhost/dwes/projects/fct_management/public/index.php//home/companies/company_profile/${element["c_id"]}"><span class="material-symbols-outlined">
                            delete
                            </span></a><a href="http://localhost/dwes/projects/fct_management/public/index.php//home/companies/company_profile/${element["c_id"]}"><span class="material-symbols-outlined">
                        edit
                    </span></a></td>
            </tr>`
                    );
                });
            }
        });

    // When click on X, close the modal
    $("#span_modal_exit").click(function () {
        $("#modal_create_company").css("display", "none");
    });

    //When click on modal close button
    $("#btn_modal_exit").click(function () {
        $("#modal_create_company").css("display", "none");
        window.location.href =
            "http://localhost/dwes/projects/fct_management/public/index.php/home/companies";
    });

    //When click on create another company
    $("#btn_modal_reload").click(function () {
        $("#modal_create_company").css("display", "none");
        window.location.reload();
    });
});
