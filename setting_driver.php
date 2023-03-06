<?php
session_start(); 
    include('connect.php');

  $level = $_SESSION['userlevel'];
 	if($level!='1'){
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
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
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
                        <h1>ข้อมูลพนักงานขับรถ</h1>
                    </center>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์โทร</th>
                                    <th>แก้ไขข้อมูล</th>
                                    <th>ลบข้อมูล</th>
                                </tr>
                            </thead>

                            <!-- ดึงข้อมูลมาจากดาต้าเบส -->
                            <tbody>
                                <?php
                            // แสดงข้อมูลในตาราง
                            $sql = "SELECT * FROM driver"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th>" . $row['fname'] . "</th>";
                                    echo "<th>" . $row['lname'] . "</th>";
                                    echo "<th>" . $row['email'] . "</th>";
                                    echo "<th>" . $row['tel'] . "</th>";
                                    echo "<th><a href='edit_vehicle.php?id=" . $row['driver_id'] . "'>แก้ไขข้อมูล</th>";
                                    echo "<th><a href='del_vehicle.php?id=" . $row['driver_id'] . "'>ลบข้อมูล</th>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<th colspan='4'>ยังไม่มีคำพนักงานขับรถ</th>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>
    <?php
        include('footer.php')
        ?>
    </div>


    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script src="form-validation.js"></script>


</body>

</html>