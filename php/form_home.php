<?php

require_once("./configgg.php");
require_once("./process_info.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <td>ID</th>
            <th>Name</th>
        </tr>
        <tr>
            <td><?php
                $result->data_seek(0); // Reset the pointer to the beginning
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i += 1;
                    echo "<p>Data from Column $i: " . $row["user_id"];
                }
                ?>
            </td>
            <td>
            <?php
            $result->data_seek(0); // Reset the pointer to the beginning
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i += 1;
                echo "<p>name $i: " . $row["first_name"] . "</p>";
            }
            ?>
            </td>
        </tr>
</body>

</html>