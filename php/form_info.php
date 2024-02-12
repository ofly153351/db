<?php
session_start();
require_once("./configgg.php");
require_once("./process_info_sesstion.php");
require_once("./process_data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlyes.css">
    <link rel="stylesheet" href="../css/from_info.css">
</head>
<title>info</title>
</head>

<body>
    <form action="process_info.php" method="POST" enctype="multipart/form-data">

        <head>
            <?php
            include("./navbar_login.php");
            ?>
        </head>
        <div class="box">
            <div class="box1">
                <h2> ทะเบียนนักศึกษา </h2>
                <div class="input1">
                    <label>
                        <input style="width: 250px;" required="" placeholder="ชื่อ : " value="<?php echo "$first_name" ?>" type="text" class="input" name="fname">
                    </label>
                    <label>
                        <input style="width: 250px;" required="" placeholder="นามสกุล : " value="<?php echo "$last_name" ?>" type="text" class="input" name="lname">
                    </label>
                    <label>
                        <input style="width: 250px;" required="" placeholder="รหัสนักศึกษา : " value="<?php echo "$_SESSION[user_id]"; ?>" type="text" class="input" name="id" readonly>
                    </label>
                </div>
                <div class="selectform">
                    <div class="col-form">
                        <div class="boxselect">
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
                            <div style="gap: 0px" class="input1">
                                <label>
                                    <input style="width: 80px; border-top-right-radius: 0; border-bottom-right-radius: 0; " required="" value="กลุ่มเรียน" type="text" name="innitial" id="innitial" class="input">
                                </label>
                                <label>
                                    <input style="width: 170px; border-top-left-radius: 0; border-bottom-left-radius: 0;" required="" placeholder="กลุ่มเรียน" value="<?php echo "$section" ?>" type="text" name="sectionn" class="input">
                                </label>
                            </div>
                            <div class="input1">
                                <label>
                                    <input style="width: 250px;" required="" placeholder="อาจารที่ปรึกษา" value="<?php echo "$teacher" ?>" type="text" name="teacher" class="input">
                                </label>
                            </div>
                            <div class="input1">
                                <label>
                                    <input style="width: 250px;" required="" placeholder="สถานศึกษาเก่า" value="<?php echo "$oldschool" ?>" type="text" name="oldschool" class="input">
                                </label>
                            </div>
                            <input type="submit" class="button" value="บันทึกข้อมูล">
                        </div>
                        <div class="boxselect">
                            <div class="custom-select">
                                <select id="branch" name="branch" disabled>
                                    <option value="" disabled>เลือกสาขา</option>
                                    <?php
                                    while ($row_branch = $result_branch->fetch_assoc()) {
                                        $selected = ($_SESSION['user_id'] == $row_branch['branch_id']) ? 'selected' : '';
                                        echo "<option class='branch' innitial='" . $row_branch['innitial'] . "' data-faculty-id='" . $row_branch['faculty_id'] . "' value='" . $row_branch['branch_id'] . "'>" . $row_branch['branch_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input1">
                                <label>
                                    <input style="width: 250px;" required="" placeholder="ระดับวุฒิการศึกษา" value="<?php echo "$exp" ?>" type="text" name="exp" class="input">
                                </label>
                            </div>
                            <div class="input1">
                                <label>
                                    <input style="width: 250px;" required="" placeholder="" value="<?php echo "$birth_date" ?>" type="date" name="date" class="input">
                                </label>
                            </div>
                            <div class="input1">
                                <label>
                                    <input style="width: 250px;" required="" placeholder="Email" value="<?php echo "$email" ?>" type="email" name="mail" class="input">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-img">
                        <div class="containerupload">
                            <h1>อัพโหลดรูปภาพ</h1>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" name="img" accept=".png, .jpg, .jpeg" />
                                    <label class="upimg" for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url('../image/image.png'); width: auto;  ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../script/imgupload.js"></script>
    <script src="../script/script_select.js"></script>
</body>

</html>