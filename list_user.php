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
                        <h1>ข้อมูลบุคลากรและจัดกลุ่มผู้ใช้</h1>
                    </center>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr style="background-color:fdc500">
                                    <th>รูป</th>
                                    <th>คำนำหน้า</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>เพศ</th>
                                    <th>ตำแหน่ง</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์โทร</th>
                                    <th>แก้ไขข้อมูล</th>
                                    <th>ลบข้อมูล</th>
                                </tr>
                            </thead>

                            <!-- ดึงข้อมูลมาจากดาต้าเบส -->
                            <tbody style="background-color:ffffe0">
                                <?php
                            // แสดงข้อมูลในตาราง
                            // $sql = "SELECT * FROM admin"; 
                            $sql = "SELECT * FROM user"; 
                            // $sql = "SELECT * FROM driver"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th><img src='user_img/" . $row['photo'] . "'width=100 height=100' ></th>";
                                    echo "<th>" . $row['pre'] . "</th>";
                                    echo "<th>" . $row['fname'] . "</th>";
                                    echo "<th>" . $row['lname'] . "</th>";
                                    echo "<th>" . $row['sex'] . "</th>";
                                    echo "<th>" . $row['position'] . "</th>";
                                    echo "<th>" . $row['email'] . "</th>";
                                    echo "<th>" . $row['tel'] . "</th>";
                                    echo "<th><a href='edit_user.php?id=" . $row['user_id'] . "'input type='submit'class='btn btn-info'>แก้ไขข้อมูล</th>";
                                    // echo "<th><a href='delete_data.php?id=" . $row['id'] . "' input type='submit'class='btn btn-danger'>ลบข้อมูล</th>";
                                    echo "<th><a onclick=\"return confirm('ยืนยันการลบข้อมูล ??')\" href='del_user.php?id=" . $row['user_id'] . "'' input type='submit'class='btn btn-danger'>ลบข้อมูล</a></th>";
                                    
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<th colspan='10'>ยังไม่มีผู้ดูแลระบบ</th>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="w-100 btn btn-primary btn-lg"
                        onclick="location.href='add_user.php'">เพิ่มบุคลากร</button>
                </div>
            </div>
    </main>
    <?php
        include('footer.php')
        ?>
    </div>
</body>

</html>