<?php
require_once('./configgg.php');
$sql = "SELECT first_name,last_name, FROM your_table_name WHERE f_name = '$user_id'";
$result = $conn->query($sql);
