document.addEventListener("DOMContentLoaded", function () {
    var inputField = document.getElementById("inputID");
    inputField.addEventListener("input", function () {
        var inputValue = inputField.value;
        if (inputValue.length == 11) {
            inputField.value = inputValue + "-";
        }
    });
});