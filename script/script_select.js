document.getElementById('faculty').addEventListener('change', function () {
    
    var selectedFacultyId = this.value;
    // แสดงตัวเลือกสาขาที่เกี่ยวข้องกับคณะที่เลือก
    var branchDropdown = document.getElementById('branch');
    for (var i = 0; i < branchDropdown.options.length; i++) {
        var option = branchDropdown.options[i];
        var facultyId = option.getAttribute('data-faculty-id');

        // ถ้าคณะของสาขาตรงกับคณะที่เลือก
        if (facultyId === selectedFacultyId || selectedFacultyId === "") {
            option.style.display = '';
            console.log(facultyId + selectedFacultyId);
        } else {
            option.style.display = 'none';
        }
    }

    // เปิด/ปิด dropdown ขึ้นอยู่กับการเลือกคณะ
    branchDropdown.disabled = (selectedFacultyId === "");
});
var branchDropdown = document.getElementById('branch');
let branch_op = document.querySelectorAll(".branch");

document.getElementById('branch').addEventListener('change', function(event) {
    var selectedOption = event.target.value;
    
    if (selectedOption !== "") {
        console.log("คุณเลือก: " + selectedOption);
    } else {
        console.log("คุณไม่ได้เลือกตัวเลือกใด ๆ");
    }
    branch_op.forEach((element)=>{
        if(element.value == selectedOption){

            console.log(selectedOption);
            let innitial = element.getAttribute("innitial");
            document.getElementById("innitial").value = innitial;
        }
    });
});


// branchDropdown.addEventListener('change',()=>{
//     document.getElementById("innitial").value = "";
//     var selectedOption = this.options[this.selectedIndex];
    
//     if (selectedOption) {
//       console.log("คุณเลือก: " + selectedOption.text);
//       console.log("ค่า: " + selectedOption.value);
//     } else {
//       console.log("ไม่มีตัวเลือกที่ถูกเลือก");
//     }
// });