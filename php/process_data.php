<?php

require_once("./configgg.php");

$query = "
        SELECT student_info.*, faculty.faculty_name, branch.branch_name
        FROM student_info
        LEFT OUTER JOIN faculty ON student_info.faculty = faculty.faculty_id
        LEFT OUTER JOIN branch ON student_info.branch = branch.branch_id
    ";
$result3 = $conn->query($query);
