$(document).ready(function () {
    let myForm = $("#form_login");
    
    myForm.submit(function (e) {
        e.preventDefault();
        
        let formData = new FormData(this);
        fetch("http://localhost/dwes/projects/fct_management/public/index.php/home", {
            method: "POST",
            body: formData
        })
        
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data == "empty_inputs") {
                $("#login_error_span").text("Los campos son obligatorios");
            } else if (data == "incorrect_data") {
                $("#login_error_span").text("Los datos no son correctos");
            } else if (data == "correct_data") {
                $("#login_error_span").text("");
                window.location.href = "http://localhost/dwes/projects/fct_management/public/index.php/home/companies";
            }
        })
    });
});
