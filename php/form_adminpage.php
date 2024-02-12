<?php
require_once("./configgg.php");

// del
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Prepare the DELETE query
    $deletestmt = $conn->prepare("DELETE FROM student_info WHERE `number` = ?");

    // Bind the parameter
    $deletestmt->bind_param("i", $delete_id); // "i" represents integer type

    // Execute the statement
    $deletestmt->execute();

    // Check if the deletion was successful
    if ($deletestmt->affected_rows > 0) {
        echo "<script>alert('Data has been deleted successfully');</script>";
        $_SESSION['success'] = "ลบข้อมูลเสร็จสิ้น";
        header("refresh:1; url=form_list.php");
    } else {
        echo "<script>alert('Error deleting data');</script>";
    }
}
if (isset($_POST['submit'])) {
    // Retrieve data from the form
    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $id = $_POST["user_id"];
    $exp = $_POST["expi"];
    $section = $_POST["sectionn"];
    $teacher = $_POST["teacher"];
    $oldschool = $_POST["old_school"];
    $faculty = $_POST["faculty"];
    $branch = $_POST["branch"];
    $birth_date = $_POST["birth_date"];
    $email = $_POST["email"];
    $fileName = $_FILES['fileToUpload']['name'];

    // Prepare the INSERT query
    $insertstmt = $conn->prepare("INSERT INTO 
    student_info
    (first_name, last_name, user_id , expi , sectionn , teacher , old_school , faculty , branch , birth_date , email , img_name) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the parameters
    $insertstmt->bind_param("ssssssssssss", $fname, $lname, $id, $exp, $section, $teacher, $oldschool, $faculty, $branch, $birth_date, $email, $fileName);

    // Execute the statement
    $insertstmt->execute();

    // Check if the insertion was successful
    if ($insertstmt->affected_rows > 0) {
        echo "<script>alert('Data has been inserted successfully');</script>";
        $_SESSION['success'] = "เพิ่มข้อมูลเสร็จสิ้น";
        header("refresh:1; url=form_list.php");
    } else {
        echo "<script>alert('Error inserting data');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .container {
        position: relative;
    }

    .adder {
        display: flex;
        justify-content: flex-end;
    }

    form {
        position: relative;
    }

    .box_modal form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .box_modal .title {
        align-self: center;
    }

    .box_modal {
        display: none;
        background-color: #ddd;
        justify-content: center;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        width: 600px;
        margin: 0 auto;
        position: absolute;
        z-index: 99999999;
        padding: 10px 20px;
        top: 50%;
        left: 30%;
    }

    .box_modal.active {
        display: flex;
    }

    #btnClose {
        position: absolute;
        top: 5px;
        right: 5px;
    }
</style>

<body>
    <div class="container">
        <h3 class="mt-4">ตารางข้อมูลนักศึกษา</h3>
        <hr>

        <div class="adder">
            <a href="#" class="btn btn-success mb-3 " id="myBtn">เพิ่มผู้ใช้งาน</a>
        </div>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Some text in the Modal..</p>
            </div>

        </div>

        <table id="myTable" class="table table-striped table-hover">
            <thead>
                <th>ลำดับ</th>
                <th>รหัสนักศึกษา</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>คณะ</th>
                <th>สาขา</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </thead>
            <tbody>
                <?php
                include("./process_data.php");
                if ($result3) {
                    while ($user_data = $result3->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $user_data['number'] ?></td>
                            <td><?php echo $user_data['user_id'] ?></td>
                            <td><?php echo $user_data['first_name'] ?></td>
                            <td><?php echo $user_data['last_name'] ?></td>
                            <td><?php echo $user_data['faculty_name'] ?></td>
                            <td><?php echo $user_data['branch_name'] ?></td>
                            <td>
                                <a class="btn btn-warning" style="color: black;" href="NameList?id=<?php echo $user_data['number']; ?>">แก้ไข</a>
                            </td>
                            <td>
                                <a data-id="<?= $user_data['number']; ?>" href="?delete=<?= $user_data['number']; ?>" class="btn btn-danger delete-btn">ลบ</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "Error executing query: " . $conn->error;
                }
                ?>
            </tbody>
            <div class="box_modal rounded-4 w-120 h-200 gap-1 justify-content-center" id="box_modal">
                <button class="rounded-4 " id="btnClose">X
                </button>
                <form action="form_adminpage.php" method="POST" enctype="multipart/form-data">
                    <div class="title">เพิ่มผู้ใช้งาน</div>
                    <input type="text" class="w-15 h-15 pad-5 " placeholder="ชื่อ" name="first_name">
                    <input type="text" class="form-control" placeholder="นามสกุล" name="last_name">
                    <input type="text" class="form-control" placeholder="รหัสนักศึกษา" name="user_id">
                    <div class="custom-select">
                        <select id="faculty" name="faculty">
                            <option value="" disabled>คณะ</option>
                            <?php
                            while ($row_faculty = $result_faculty->fetch_assoc()) {
                                echo "<option value='" . $row_faculty['faculty_id'] . "'>" . $row_faculty['faculty_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="boxselect">
                        <div class="custom-select">
                            <select id="branch" name="branch" disabled>
                                <option value="" disabled>เลือกสาขา</option>
                                <?php while ($row_branch = $result_branch->fetch_assoc()) {
                                    echo "<option data-faculty-id='" . $row_branch['faculty_id'] . "' value='" . $row_branch['branch_id'] . "'>" . $row_branch['branch_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="กลุ่มเรียน" name="sectionn">
                    <input type="text" class="form-control" placeholder="วุฒิการศึกษา" name="expi">
                    <input type="text" class="form-control" placeholder="อาจารย์ที่ปรึกษา" name="teacher">
                    <input type="date" class="form-control" placeholder="" name="birth_date">
                    <input type="text" class="form-control" placeholder="สถานศึกษาเก่า" name="old_school">
                    <input type="email" class="form-control" placeholder="email" name="email">
                    <input type="file" name="fileToUpload" id="fileToUpload" placeholder="อัพโหลดรูปนักศึกษา">
                    <div class="d-flex mt-5 justify-content-center align-middle">
                        <button class="rounded-pill" type="submit" name="submit"> เพิ่มข้อมูลนักศึกษา </button>
                    </div>
                </form>
            </div>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="http://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../script/script_select.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        $(".delete-btn").click(function(e) {
            var userId = $(this).data('id');
            e.preventDefault();
            deleteConfirm(userId);
        });

        function deleteConfirm(userId) {
            Swal.fire({
                title: 'ยืนยันการลบ ?',
                text: "ข้อมูลจะถูกลบอย่างถาวร",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: 'form_adminpage.php?delete=' + userId,
                                type: 'GET',
                            })
                            .done(function() {
                                Swal.fire({
                                    title: 'success',
                                    text: 'ลบข้อมูลเสร็จสิ้น',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    document.location.href = 'form_list.php';
                                })
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                                window.location.reload();
                            });
                    });
                },
            });
        }
    </script>

    <script>
        const box_modal = document.getElementById("box_modal");
        const btnClose = document.getElementById("btnClose");
        console.log(box_modal);
        const myBtn = document.getElementById("myBtn");
        console.log(myBtn);
        myBtn.addEventListener('click', () => {
            box_modal.classList.add("active");
        });
        btnClose.addEventListener('click', () => {
            box_modal.classList.remove("active");
        });
    </script>
</body>

</html>