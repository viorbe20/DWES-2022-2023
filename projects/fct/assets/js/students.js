$(document).ready(function () {
    const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("upload-btn");
    const customTxt = document.getElementById("upload-btn-text");
    

    customBtn.addEventListener("click", function() {
        realFileBtn.click();
    });
    
    realFileBtn.addEventListener("change", function() {
        if (realFileBtn.value) {
            customTxt.innerHTML = realFileBtn.value.match(
                /[\/\\]([\w\d\s\.\-\(\)]+)$/
                )[1];
            } else {
                customTxt.innerHTML = "No file chosen, yet.";
            }
        });
    });