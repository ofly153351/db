function valid_input(){
    var input = document.getElementById('engInput').value;
    if (!/^[A-Za-z]*$/.test(input)) {
        alert('กรุณากรอกเฉพาะภาษาอังกฤษเท่านั้น');
        document.getElementById('engInput').value = "";
    }
}