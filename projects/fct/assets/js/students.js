$(document).ready(function () {

    
    const $fileInput = $('#file-input');
    
    
    $('#save_file').click(function () {
        console.log($fileInput.files[0]);
        // if($fileInput.files[0] != undefined) {
        //     const file = $fileInput.files[0];
        //     const formData = new FormData();
        // }
    });



    // formData.append("file", file);

    // fetch("upload.php", {
    //     method: "POST",
    //     body: formData
    // })
    // .then(response => response.text())
    // .then(response => {
    //     console.log(response);
    //     alert("File saved successfully!");
    // })
    // .catch(error => {
    //     console.log(error);
    //     alert("An error occurred while saving the file.");
    // });


});
