<?php
require_once("./configgg.php");
// require_once("./process_info.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/from_info.css">
    <link rel="stylesheet" href="../css/stlyes.css">
    <title>Document</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai+Looped:wght@100;200;300;400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Noto Sans Thai Looped', sans-serif;
    }
</style>

<body>
    <?php
    include('./navbar_login.php');
        ?>
    <div class="container">
        <h3 class="mt-4">ตารางข้อมูลนักศึกษา</h3>
        <hr>
        <table id="myTable" class="table table-striped table-hover">
            <thead>
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>รหัสนักศึกษา</th>
                <th>คณะ</th>
                <th>สาขา</th>
            </thead>
            <tbody>
                <?php
                include("./process_data.php");
                $i = 1;
                if ($result3) {
                    while ($user_data = $result3->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $user_data['first_name'] ?></td>
                            <td><?php echo $user_data['last_name'] ?></td>
                            <td><?php echo $user_data['user_id'] ?></td>
                            <td><?php echo $user_data['faculty_name'] ?></td>
                            <td><?php echo $user_data['branch_name'] ?></td>
                        </tr>
                <?php
                        $i += 1;
                    }
                } else {
                    // Handle the case where the query was not successful
                    echo "Query failed: " . $conn->error;
                }
                ?>

            </tbody>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="http://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>