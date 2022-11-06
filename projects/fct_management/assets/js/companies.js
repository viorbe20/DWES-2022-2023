async function getCompanies () {
    
    console.log('getCompanies');
    window.location.href =
                        "http://localhost/dwes/projects/fct_management/public/index.php/home/companies";
    let response = await fetch('http://localhost/dwes/projects/fct_management/public/index.php/home/companies');
    
    console.log(response.json());

}


$(document).ready(function () {
    
    let myForm = $("#form_search_company");

    // Click on search company button
    myForm.submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        fetch(
            "http://localhost/dwes/projects/fct_management/public/index.php/home/companies",
            {
                method: "POST",
                body: formData,
            }
        )
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data == "correct_data") {
                    window.location.href =
                        "http://localhost/dwes/projects/fct_management/public/index.php/home/companies";
                } else if (data == "incorrect_data") {
                    window.location.href =
                        "http://localhost/dwes/projects/fct_management/public/index.php/home/companies";
                } else {
                    window.location.href =
                        "http://localhost/dwes/projects/fct_management/public/index.php/home/companies";
                }
            });
    });
});