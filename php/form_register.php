<?php
require_once("./configgg.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlyes.css">
    <link rel="stylesheet" href="../css/login_regis.css">
    <title>register page</title>
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><img src="https://ess.rmuti.ac.th/front/img/profile.png" width="60px"></a></div>
        </div>
    </nav>
    <div class="form-position">
        <form id="numericForm" class="form" action="process_register.php" method="POST">
            <h1 class="h1login">Register</h1>
            <div class="input">
                <input id="numberInput" name="stid_account" type="numericError" placeholder="Student id" required>
            </div>
            <span id="error" style="color: red; display: none;">กรุณากรอกให้ครบ 12 หลัก</span>
            <div class="input">
                <input name="email_account" type="email" placeholder="Email" required>
            </div>
            <div class="input">
                <input name="password_account1" type="password" placeholder="Password" required>
            </div>
            <div class="input">
                <input name="password_account2" type="password" placeholder="Confirm Password" required>
            </div>
            <button id="submitButton" class="submit" type="submit">sing up</button>
            <p>Have an account? <a href="form_login.php">Login in</a></p>

        </form>
    </div>

    <script>
        const inputElement = document.getElementById('numberInput');
        const errElement = document.getElementById('error');
        inputElement.addEventListener('input', function(event) {
            let value = event.target.value.replace(/[^\d-]/g, ''); // ลบทุกอักขระที่ไม่ใช่ตัวเลขหรือเครื่องหมาย "-"
            value = value.substring(0, 12); // เก็บค่าไม่เกิน 13 ตัวอักษร
            
            if (value.length !== 12) {
                errElement.style.display = 'inline';
            }else{
                errElement.style.display = 'none'
            }

            event.target.value = value;
        });
    </script>

</body>

</html>