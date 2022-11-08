import { isEmptyField } from '../js/validation.js';

$(document).ready(function () {
    

    let v = "hola";

    isEmptyField(v);
    console.log(isEmptyField(v));

    // Get the modal
    var modal = document.getElementById("myModal");

    // When the user clicks the button, open the modal
    var btn = document.getElementById("myBtn");
    btn.onclick = function () {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});
