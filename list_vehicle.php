<?php
include('connect.php');
session_start();
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

<body style="background-color:ebebeb">

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
                        <h1>ยานพาหนะ</h1>
                    </center>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr style="background-color:fdc500">
                                    <!-- <th></th> -->
                                    <th>รูป</th>
                                    <th>ชนิดรถ</th>
                                    <th>ชื่อ</th>
                                    <th>ที่นั่ง</th>
                                    <th>ป้ายทะเบียน</th>
                                    <th>แก้ไขข้อมูล</th>
                                    <th>ลบข้อมูล</th>
                                </tr>
                            </thead>

                            <!-- ดึงข้อมูลมาจากดาต้าเบส -->
                            <tbody style="background-color:ffffe0">
                                <?php
                                // แสดงข้อมูลในตาราง
                                // $sql = "SELECT * FROM vehicle"; 
                                $sql = "SELECT * FROM vehicle LEFT JOIN type ON vehicle.type_id = type.id";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        // echo "<th>" . $row['vehicle_id'] . "</th>";
                                        echo "<th><img src='car/" . $row['vehicle_photo'] . "'width=150 height=150' ></th>";
                                        echo "<th>" . $row['type_name'] . "</th>";
                                        echo "<th>" . $row['vehicle_name'] . "</th>";
                                        echo "<th>" . $row['seat'] . "</th>";
                                        echo "<th>" . $row['license_plate'] . "</th>";
                                        echo "<th><a href='edit_vehicle.php?id=" . $row['vehicle_id'] . "'input type='submit'class='btn btn-info'>แก้ไขข้อมูล</th>";
                                        // echo "<th><a href='del_vehicle.php?id=" . $row['vehicle_id'] . "'>ลบข้อมูล</th>";
                                        echo "<th><a onclick=\"return confirm('ยืนยันการลบข้อมูล ??')\" href='del_vehicle.php?id=" . $row['vehicle_id'] . "'' input type='submit'class='btn btn-danger'>ลบข้อมูล</a></th>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<th colspan='7'>ยังไม่มีข้อมูลยานพาหนะ</th>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="w-100 btn btn-primary btn-lg" onclick="location.href='add_vehicle.php'">เพิ่มยานพาหนะ</button>
                </div>
            </div>
    </main>
    <?php
        include('footer.php')
        ?>
    </div>
</body>

</html>