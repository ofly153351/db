<?php

$open_connect = 1;
require_once("./configgg.php");

if (isset($_POST['stid_account'], $_POST['email_account'], $_POST['password_account1'], $_POST['password_account2'])) {
    $stid_account = htmlspecialchars($_POST['stid_account']);
    $email_account = htmlspecialchars($_POST['email_account']);
    $password_account1 = $_POST['password_account1'];
    $password_account2 = $_POST['password_account2'];

    if (empty($stid_account) || empty($email_account) || empty($password_account1) || empty($password_account2) || ($password_account1 != $password_account2)) {
        header('Location: form_register.php');
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $query_check_email_account = "SELECT email FROM student_info WHERE email = ?";
    $stmt_check_email_account = mysqli_prepare($conn, $query_check_email_account);
    mysqli_stmt_bind_param($stmt_check_email_account, "s", $email_account);
    mysqli_stmt_execute($stmt_check_email_account);
    mysqli_stmt_store_result($stmt_check_email_account);

    if (mysqli_stmt_num_rows($stmt_check_email_account) > 0) {
        // echo '<script>alert("email"); window.location.href = "database\php\form_register.php";</script>';
        header('Location: form_register.php');
        exit;
    }



    // Hash the password
    $hashed_password = password_hash($password_account1, PASSWORD_DEFAULT);

    // Insert user data into the database
    $query_create_account = "INSERT INTO student_info (user_id, email, password_account, role_account)
                             VALUES (?, ?, ?, 2 )";
    $stmt_create_account = mysqli_prepare($conn, $query_create_account);
    mysqli_stmt_bind_param($stmt_create_account, "sss", $stid_account, $email_account, $hashed_password);
    $call_back_create_account = mysqli_stmt_execute($stmt_create_account);

    if ($call_back_create_account) {
        header('Location: form_login.php');
        exit;
    } else {
        echo '<script>alert("Registration failed"); window.location.href = "form_register.php";</script>';
        exit;
    }
}
