<?php
session_start();
session_destroy();
// echo '<script>alert("Session cleared successfully!");</script>';
header("Location: form_login.php");
exit(); // Make sure to exit after the header to prevent further script execution
