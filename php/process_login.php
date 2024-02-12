<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$open_connect = 1;
require_once('./configgg.php');
session_start();
$stid_account = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['stid_account']));


$_SESSION['user_id'] = $stid_account;

//  unset($_SESSION['user_id']);

if (isset($_POST['stid_account']) && isset($_POST['password_account'])) {
    $stid_account = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['stid_account']));
    $password_account = htmlspecialchars($_POST['password_account']);
    $query_check_account = "SELECT * FROM student_info WHERE user_id = '$stid_account'";
    $call_back_check_account = mysqli_query($conn, $query_check_account);

    if (mysqli_num_rows($call_back_check_account) == 1) {
        $result_check_account = mysqli_fetch_assoc($call_back_check_account);
        $hash = $result_check_account['password_account'];

        if (password_verify($password_account, $hash)) {
            if ($result_check_account['role_account'] == 2) {
                header('Location: form_list.php');
                exit();
            } elseif ($result_check_account['role_account'] == 1) {
                header('Location: form_adminpage.php');
                exit();
            }
        } else {
            echo '<script>alert("รหัสผ่านไม่ถูกต้อง"); window.location.href = "form_login.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("ไม่พบรหัสนักศึกษาในระบบ"); window.location.href = "form_login.php";</script>';
        exit();
    }
} else {
    echo '<script>alert("กรุณากรอกข้อมูลให้ครบ"); window.location.href = "form_login.php";</script>';
    exit();
}
