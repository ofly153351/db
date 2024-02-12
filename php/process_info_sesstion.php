<?php
$data = "SELECT * FROM student_info WHERE user_id = ?";
$stmt = $conn->prepare($data);
$stmt->bind_param("s", $_SESSION['user_id']);
$stmt->execute();
$result4 = $stmt->get_result();

if ($result4->num_rows > 0) {
    $row = $result4->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $section = $row['sectionn'];
    $exp = $row['expi'];
    $teacher = $row['teacher'];
    $birth_date = $row['birth_date'];
    $oldschool = $row['old_school'];
} else {
    echo "User not found";
}
$stmt->close();
