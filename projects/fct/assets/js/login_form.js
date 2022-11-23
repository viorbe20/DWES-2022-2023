/**
* Check if the input is empty
*/
function isEmptyField(data) {
    cleardata = data.trim();
    if ((cleardata == "") && (cleardata.length == 0)) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function () {

    console.log('ready');

    //Click on submit login form
    $('#form_login').submit(function (e) {
        e.preventDefault();

        filledUsername = false;
        filledPassword = false;

        //Empty fields validation
        if (isEmptyField($('#username').val())) {
            alert('El usuario no puede estar vacío');
        } else {
            if (isEmptyField($('#password').val())) {
                alert('La contraseña no puede estar vacía');
            } else {
                
                // If the fields are not empty, then we send the data to the server
                let formData = new FormData(this);
                fetch("http://localhost/dwes/projects/fct/public/index.php/home", {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.status == "success") {
                            window.location.href = "http://localhost/dwes/projects/fct/public/index.php/companies";
                        } else if (data.status == "error") {
                            alert(data.message);
                        } 
                    })
            }
        }
    });
});
