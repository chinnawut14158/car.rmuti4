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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="bg-light">
    <!-- Navbar -->
    <?php
    include('ul.php')

    ?>
    <!-- EndNavbar -->
    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                    <center>
                        <h4 class="mb-3">ขออนุญาตใช้รถยนต์ราชการในเขตอำเภอเมือง จังหวัดขอนแก่น</h4>
                    </center>
                    <form class="needs-validation" name="from1" method="post" action="downloadfile.php" enctype="multipart/form-data">
                        <div class="row g-3">

                            <?php

                            if (isset($_GET['id'])) {
                                //ดึงข้อมูล จากไอดี มาทำการแก้ไข
                                // $sql    = "SELECT * FROM events WHERE id = '" . $_GET['id'] . "'";
                                $sql    = "SELECT * FROM events 
                            LEFT JOIN vehicle ON events.vehicle_id = vehicle.vehicle_id 
                            LEFT JOIN user ON events.driver_id = user.user_id WHERE id = '" . $_GET['id'] . "'";
                                $result = $conn->query($sql);
                                $row    = $result->fetch_assoc();
                                $_SESSION['type_id'] = $row['type_id'];
                                $_SESSION['vehicle_id'] = $row['vehicle_id'];
                                $_SESSION['driver_id'] = $row['driver_id'];
                                $_SESSION['idm'] = $row['id'];

                                $type = $_SESSION['type_id'];
                                $license_plate = $_SESSION['vehicle_id'];
                                $driver_id = $_SESSION['driver_id'];
                                $idm = $_SESSION['idm'];
                            ?>
                                <?php

                                $sql    = "SELECT * FROM events WHERE id=$idm";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                ?>
                                        <div class="col-sm-2">
                                            <label for="firstName" class="form-label">คำนำหน้า</label>
                                            <input type="text" class="form-control" id="pre" name="pre" placeholder="กรอกชื่อ" value="<?php echo $row['pre']; ?>">
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="firstName" class="form-label">ชื่อ</label>
                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ" value="<?php echo $row['fname']; ?>">
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="lastName" class="form-label">นามสกุล</label>
                                            <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามสกุล" value="<?php echo $row['lname']; ?>">
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>

                                        <!-- ตำแหน่งงาน -->
                                        <div class="col-sm-12">
                                            <label for="" class="form-label">ตำแหน่ง</label>
                                            <input type="text" class="form-control" id="position" name="position" placeholder="กรอกตำแหน่งงาน" value="<?php echo $row['position']; ?>">
                                            <div class="invalid-feedback">
                                                Valid Job title is required.
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="" class="form-label">ขออนุญาตใช้รถยนต์ ราชการ เพื่อเดินทางไป
                                                (สถานที่ไป)</label>
                                            <input type="text" class="form-control" id="location" name="location" placeholder="กรอกสถานที่เดินทาง" value="<?php echo $row['location']; ?>">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="" class="form-label">จำนวนผู้เดินทาง</label>
                                            <input type="text" class="form-control" id="passenger" name="passenger" placeholder="กรอกจำนวนผู้เดินทาง" value="<?php echo $row['passenger']; ?>">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="" class="form-label">เพื่อปฎิบัติหน้าที่</label>
                                            <input type="text" class="form-control" id="request_for" name="request_for" placeholder="กรอกวัตถุประสงค์ในการเดินทาง" value="<?php echo $row['request_for']; ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">เบอร์โทรสำหรับติดต่อ</label>
                                            <input type="text" class="form-control" id="tel" name="tel" placeholder="กรอกวัตถุประสงค์ในการเดินทาง" value="<?php echo $row['tel']; ?>">
                                        </div>

                                        <!-- วันที่เดินทางไป -->
                                        <div class="col-6">
                                            <label for="username" class="form-label">วันที่</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">วันที่</span>
                                                <input type="date" class="form-control" id="date_from" name="date_from" placeholder="" value="<?php echo $row['date_from']; ?>">
                                                <div class="invalid-feedback">
                                                    Your username is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="username" class="form-label">วันที่</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">วันที่</span>
                                                <input type="date" class="form-control" id="date_to" name="date_to" placeholder="" value="<?php echo $row['date_to']; ?>">
                                                <div class="invalid-feedback">
                                                    Your username is required.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- เวลา -->
                                        <div class="col-6">
                                            <label for="username" class="form-label">เวลาที่เดินทางไป</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">เวลาที่ไป</span>
                                                <input type="time" class="form-control" id="time_from" name="time_from" placeholder="Time" value="<?php echo $row['time_from']; ?>">
                                                <div class="invalid-feedback">
                                                    Your time is required.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- เวลา -->
                                        <div class="col-6">
                                            <label for="username" class="form-label">เวลาที่เดินทางกลับ</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">เวลาที่กลับ</span>
                                                <input type="time" class="form-control" id="time_to" name="time_to" placeholder="Time" value="<?php echo $row['time_to']; ?>">
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <!-- ----------------------------------------------------------------------------- -->
                                <?php
                                $sql    = "SELECT * FROM type WHERE id=$type";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <div class="col-sm-6">
                                            <label for="firstName" class="form-label">ประเภทรถ</label>
                                            <input type="text" class="form-control" id="show" name="show" value="<?php echo $row['type_name'] ?>">
                                        </div>
                                    <?php
                                    }
                                }
                                $sql    = "SELECT * FROM vehicle WHERE vehicle_id=$license_plate";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <div class="col-sm-6">
                                            <label for="firstName" class="form-label">เลขทะเบียน</label>
                                            <input type="hidden" class="form-control" id="license_plate" name="license_plate" placeholder="กรอกชื่อ" value="<?php echo $row['vehicle_id']; ?>">
                                            <input type="text" class="form-control" id="show" name="show" placeholder="กรอกชื่อ" value="<?php echo $row['license_plate']; ?>">
                                        </div>
                                    <?php
                                    }
                                }
                                $sql    = "SELECT * FROM user WHERE user_id=$driver_id";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <div class="col-sm-6">
                                            <label for="firstName" class="form-label">คนขับ</label>
                                            <input type="hidden" class="form-control" id="driver_name" name="driver_name" value="<?php echo $row['user_id'] ?>">
                                            <input type="text" class="form-control" id="show" name="show" value="<?php echo $row['fname'], '&nbsp', $row['lname'] ?>">
                                        </div>
                                    <?php
                                    }
                                }
                                $sql    = "SELECT * FROM events WHERE id=$idm";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">เอกสารที่แนบมา</label>
                                            <input type="text" class="form-control" id="file" name="file" value="<?php echo $row['document']; ?>">
                                        </div>
                                        <center>
                                            <div class="col-sm-6">
                                                <label for="lastName" class="form-label">ผู้อนุญาตให้รถยนต์ราชการออกนอกเขตวิทยาเขตฯ</label>
                                                <input type="text" class="form-control" id="manager_name" name="manager_name" placeholder="ลงชื่อผู้ขออนุญาต" value="<?php echo $row['manager_name']; ?>" required="">
                                            </div>
                                    <?php
                                    }
                                } ?>
                                        </center>
                                        <hr class="my-4">
                                        <!-- <a href='downloadfile.php?file=" . $row['document'] . "'input type='submit'class='btn btn-info'>เอกสารที่แนบมา"</a>; -->
                                        <button class="btn btn-info" type="submit" name="submit" href='downloadfile.php?file="<?php $row['document']  ?>"'>ดาวน์โหลดเอกสารที่แนบมา</button>
                                    <?php
                                }
                                    ?>
                    </form>
                </div>
            </div>
        </main>
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>