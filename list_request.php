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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
</head>

<body style="background-color:ebebeb">

  <!-- Navbar -->
  <?php
  include('ul.php');
  ?>
  <!-- EndNavbar -->

  <main>
    <div class="container">
      <div class="row" style="padding:50px 0px 0px 0px;">
        <div class="col">
          <center>
            <h1>รายการจอง(ภายในเขตอำเภอเมือง)</h1>
          </center>
          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="request_in_data">
              <thead>
                <tr style="background-color:fdc500">
                  <!-- <th>id</th> -->
                  <th>พนักงานขับรถ</th>
                  <th>รูปยานพาหนะ</th>
                  <th>ยานพาหนะ</th>
                  <th>รายละเอียดการขอใช้</th>
                  <!-- <th>วันที่</th>
                  <th>เวลา</th> -->
                  <th>สถานะ</th>
                  <th>รายระเอียด</th>
                  <th>หลังจากเดินทาง</th>
                  <th>ลบข้อมูล</th>
                </tr>
              </thead>
              <tbody style="background-color:ffffe0">
                <?php

                // ดึงข้อมูลมาจากดาต้าเบส
                // แสดงข้อมูลในตาราง
                $sql = "SELECT * FROM events 
                            LEFT JOIN vehicle ON events.vehicle_id = vehicle.vehicle_id 
                            LEFT JOIN user ON events.driver_id = user.user_id WHERE status=2 AND in_out_id=1";

                // $sql = "SELECT * FROM `events` WHERE status=1";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // echo "<th>" . $row['id'] . "</th>";
                    echo "<th><img src='user_img/" . $row['photo'] . "'width=100 height=100 ></th>";
                    echo "<th><img src='car/" . $row['vehicle_photo'] . "'width=100 height=100 ></th>";
                    echo "<th>" . $row['license_plate'] . "</th>";
                    echo "<th>" . $row['request_for'] . "</th>";
                    echo "<th>" . $row['status_order'] . "</th>";
                    echo "<th><a href='checkdetail_in.php?id=" . $row['id'] . "'input type='submit'class='btn btn-success'>ดูข้อมูล</th>";
                    echo "<th><a href='after_order.php?id=" . $row['id'] . "'input type='submit'class='btn btn-info'>เพิ่มข้อมูล</th>";
                    echo "<th><a onclick=\"return confirm('ยืนยันการลบข้อมูล ??')\" href='del_order.php?id=" . $row['id'] . "'' input type='submit'class='btn btn-danger'>ลบข้อมูล</a></th>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr>";
                  echo "<th colspan='4'>ยังไม่มีคำขอใช้บริการ</th>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
            <center>
              <h1>รายการจอง(ภายนอกเขตอำเภอเมือง)</h1>
            </center>
            <table class="table table-hover table-bordered table-striped" id="request_out_data">
              <thead>
                <tr style="background-color:fdc500">
                  <!-- <th>id</th> -->
                  <th>พนักงานขับรถ</th>
                  <th>รูปยานพาหนะ</th>
                  <th>ยานพาหนะ</th>
                  <th>รายละเอียดการขอใช้</th>
                  <!-- <th>วันที่</th>
                  <th>เวลา</th> -->
                  <th>สถานะ</th>
                  <th>รายระเอียด</th>
                  <th>หลังจากเดินทาง</th>
                  <th>ลบข้อมูล</th>
                </tr>
              </thead>
              <tbody style="background-color:ffffe0">
                <?php

                // ดึงข้อมูลมาจากดาต้าเบส
                // แสดงข้อมูลในตาราง
                $sql = "SELECT * FROM events 
                            LEFT JOIN vehicle ON events.vehicle_id = vehicle.vehicle_id 
                            LEFT JOIN user ON events.driver_id = user.user_id WHERE status=2 AND in_out_id=2";

                // $sql = "SELECT * FROM `events` WHERE status=1";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th><img src='user_img/" . $row['photo'] . "'width=100 height=100 ></th>";
                    echo "<th><img src='car/" . $row['vehicle_photo'] . "'width=100 height=100 ></th>";
                    echo "<th>" . $row['license_plate'] . "</th>";
                    echo "<th>" . $row['request_for'] . "</th>";
                    echo "<th>" . $row['status_order'] . "</th>";
                    echo "<th><a href='checkdetail_out.php?id=" . $row['id'] . "'input type='submit'class='btn btn-success'>ดูข้อมูล</th>";
                    echo "<th><a href='after_order.php?id=" . $row['id'] . "'input type='submit'class='btn btn-info'>เพิ่มข้อมูล</th>";
                    echo "<th><a onclick=\"return confirm('ยืนยันการลบข้อมูล ??')\" href='del_order.php?id=" . $row['id'] . "'' input type='submit'class='btn btn-danger'>ลบข้อมูล</a></th>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr>";
                  echo "<th colspan='4'>ยังไม่มีคำขอใช้บริการ</th>";
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
</body>
</html>
<script>
  $(document).ready(function() {
    $('#request_in_data').DataTable();
  });
</script>
<script>
  $(document).ready(function() {
    $('#request_out_data').DataTable();
  });
</script>