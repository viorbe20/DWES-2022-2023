
$(document).ready(function () {

    fetch(
        "http://localhost/dwes/projects/fct_management/public/index.php/home/companies/test_view.php"
    )
        .then((response) => response.json())
        .then((data) => {
            console.log(data);

            // if(data = "createdCompany") {
            //     $("#modal_create_company").css("display", "block");
            // } else {
            //     $("#card_company").find("span").each(function () {
            //         $(this).html("Este campo es obligatorio");
            //         $(this).show();
            //     });
            // }
        });

    $('#myBtn').click(function () {

        $('#modal_create_company').css('display', 'block');


    });
});
