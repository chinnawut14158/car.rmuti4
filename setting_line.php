<?php
session_start();
include('connect.php');

$level = $_SESSION['userlevel'];
if ($level != '1') {
    Header("Location:logout.php");
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CarBooking RMUTI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php
    include('connect.php');
    include('ul.php');
    ?>
    <!-- EndNavbar -->
    <main>
        <div class="container">
            <div class="row" style="padding:50px 20px 0px 20px;">
                <div class="col">
                    <center>
                        <h1>ตั้งค่าการแจ้งเตือนผ่านไลน์</h1>
                    </center>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr style="background-color:fdc500">
                                    <th>Token</th>
                                    <th>แก้ไข</th>
                                    <!-- <th>ลบ</th> -->
                                </tr>
                            </thead>

                            <!-- ดึงข้อมูลมาจากดาต้าเบส -->
                            <tbody style="background-color:ffffe0">
                                <?php
                                // แสดงข้อมูลในตาราง
                                $sql = "SELECT * FROM notify_line";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<th>" . $row['token'] . "</th>";
                                        echo "<th><a href='edit_line.php?id=" . $row['notify_id'] . "'input type='submit'class='btn btn-info'>แก้ไขข้อมูล</th>";
                                        // echo "<th><a href='order_del.php?id=" . $row['notify_id'] . "'>ลบข้อมูล</th>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<th colspan='2'>ยังไม่มี Token</th>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        if ($result->num_rows <= 0) {
                        ?>
                            <button class="w-100 btn btn-primary btn-lg" onclick="location.href='add_line.php'">เพิ่มโทเคนไลน์</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
    </main>
    <?php
        include('footer.php')
        ?>
    </div>
</body>

</html>