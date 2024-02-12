<?php
require_once("./configgg.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlyes.css">
    <link rel="stylesheet" href="../css/login_regis.css">
    <title>Login page</title>
</head>

<body>
    <div class="form-position">
        <form class="form" action="process_login.php" method="POST">
            <h1 class="h1login">Login</h1>
            <div class="input">
                <input id="numberInput" name="stid_account" type="text" placeholder="Student id" required>
            </div>
            <span id="error" style="color: red; display: none;">กรุณากรอกให้ครบ 12 หลัก</span>
            <div class="input">
                <input name="password_account" type="password" placeholder="Password" required>
            </div>
            <button class="submit" type="submit">login</button>

            <p>Don't have an account? <a href="form_register.php">Sing up</a></p>
    </div>
    </form>
</body>
<script>
    const inputElement = document.getElementById('numberInput');
    const errElement = document.getElementById('error');
    inputElement.addEventListener('input', function(event) {
        let value = event.target.value.replace(/[^\d-]/g, ''); // ลบทุกอักขระที่ไม่ใช่ตัวเลขหรือเครื่องหมาย "-"
        value = value.substring(0, 12); // เก็บค่าไม่เกิน 13 ตัวอักษร

        if (value.length !== 12) {
            errElement.style.display = 'inline';
        } else {
            errElement.style.display = 'none'
        }

        event.target.value = value;
    });
</script>

</html>