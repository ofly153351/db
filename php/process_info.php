<?php

require_once("./configgg.php");
session_start();
print_r($_POST);



$fname = $_POST["fname"];
$lname = $_POST["lname"];
$section = $_POST["sectionn"];
$teacher = $_POST["teacher"];
$oldschool = $_POST["oldschool"];
$faculty = $_POST["faculty"];
$branch = $_POST["branch"];
$exp = $_POST["exp"];
$birth_date = $_POST["date"];
$email = $_POST["mail"];
$fileName = $_FILES['img']['name'];
$id = $_SESSION['user_id'];
$innitial = $_POST['innitial']; 


$sql =  " UPDATE  student_info 
SET first_name = '$fname',
    last_name = '$lname',
    faculty = '$faculty',
    branch = '$branch',
    sectionn = '$section',
    expi = '$exp',
    teacher = '$teacher',
    birth_date = '$birth_date',
    old_school = '$oldschool',
    email = '$email',
    img_name = '$fileName',
    innitial = '$innitial'  
    WHERE user_id = $id ";

$result = $conn->query($sql);



if (isset($_FILES['img'])) {
    $uploadDirectory = 'img/';  // Adjust the directory path as needed
    $fileName = $_FILES['img']['name'];
    $fileTempName = $_FILES['img']['tmp_name'];
    $fileSize = $_FILES['img']['size'];
    $fileError = $_FILES['img']['error'];


    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Check for errors during file upload
    if ($fileError === 0) {
        $targetPath = $uploadDirectory . $fileName;
        // Move the uploaded file to the desired directory
        move_uploaded_file($fileTempName, $targetPath);
        // Now you can store the $targetPath in your database or perform other actions
    } else {
        // echo "No File Image Uplaod ";
    }
} else {
    echo "Error: No file uploaded";
}


if ($result === TRUE) {
    echo '<script>alert("Data has been recorded successfully..") ;</script>';
    header('Location: form_list.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



//ดึงขรูป
$query = "SELECT img_name FROM student_info WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

//สร้าง URL จากชื่อไฟล์
$imageUrl = 'img/' . $row['img_name'];

//แสดงรูปภาพใน HTML
// echo "<img  src='$imageUrl' alt='Student Image' >";


$sql = "SELECT * FROM student_info";
$result = $conn->query($sql);


//JOIN colum ชื่อสาขาเข้ากับ table studen_info 
$branchsh = "
    SELECT student_info.*, branch.branch_name
    FROM student_info
    JOIN branch ON student_info.branch = branch.branch_id
    WHERE student_info.user_id = $id
";

$result1 = $conn->query($branchsh);

// if ($result1->num_rows > 0) {
//     while ($row = $result1->fetch_assoc()) {
//         $branchName = $row['branch_name'];
//         // Access other columns in student_info table
//         $firstName = $row['first_name'];
//         $lastName = $row['last_name'];

//         echo "Branch Name: $branchName<br>";
//         echo "First Name: $firstName<br>";
//         echo "Last Name: $lastName<br>";
//         // Add other columns as needed
//     }
// } else {
//     echo "No records found for user with ID: $id";
// }