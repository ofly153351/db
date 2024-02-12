<?php



$servername = "localhost";
$username = "root";
$password = "";
$db_name = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql_faculty = "SELECT * FROM faculty";
$result_faculty = $conn->query($sql_faculty);

// // ดึงข้อมูลสาขาจากฐานข้อมูล
$sql_branch = "SELECT * FROM branch";
$result_branch = $conn->query($sql_branch);

$sql = "SELECT * FROM student_info";
$result = $conn->query($sql);

