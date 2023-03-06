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
    include('ul.php');
    ?>
    <!-- EndNavbar -->
    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                    <center>
                        <h4 class="mb-3">ขออนุญาตใช้รถยนต์ราชการภายนอกเขตอำเภอเมือง จังหวัดขอนแก่น</h4>
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

                                $result = $conn->query($sql);
                                $row    = $result->fetch_assoc();
                            ?>
                                <?php

                                $sql    = "SELECT * FROM events WHERE id=$idm";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                ?>
                                        <div class="col-sm-6">
                                            <label for="firstName" class="form-label">ชื่อ</label>
                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ" value="<?php echo $row['fname']; ?>" required="">
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="lastName" class="form-label">นามสกุล</label>
                                            <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามสกุล" value="<?php echo $row['lname']; ?>" required="">
                                        </div>

                                        <!-- ตำแหน่งงาน -->
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ตำแหน่ง</label>
                                            <input type="text" class="form-control" id="position" name="position" placeholder="กรอกตำแหน่งงาน" value="<?php echo $row['position']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ระดับ</label>
                                            <input type="text" class="form-control" id="level" name="level" placeholder="กรอกระดับ" value="<?php echo $row['level']; ?>">

                                        </div>
                                        <!-- ตำแหน่งงาน -->
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ขออนุญาตใช้รถยนต์ราชการ เพื่อเดินทางไป</label>
                                            <input type="text" class="form-control" id="request_for" name="request_for" placeholder="กรอกรายละเอียดการเดินทาง" value="<?php echo $row['request_for']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">สถานที่ไป</label>
                                            <input type="text" class="form-control" id="location" name="location" placeholder="กรอกรายละเอียดการเดินทาง" value="<?php echo $row['location']; ?>" required="">
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="" class="form-label">เบอร์โทรสำหรับติดต่อ</label>
                                            <input type="text" class="form-control" id="tel" name="tel" placeholder="กรอกจำนวน (คน)" value="<?php echo $row['tel']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">จำนวน</label>
                                            <input type="text" class="form-control" id="passenger" name="passenger" placeholder="กรอกจำนวน (คน)" value="<?php echo $row['passenger']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">อาจารย์ - เจ้าหน้าที่</label>
                                            <input type="text" class="form-control" id="teacher" name="teacher" placeholder="กรอกจำนวน (คน)" value="<?php echo $row['teacher']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">นักศึกษา</label>
                                            <input type="text" class="form-control" id="student" name="student" placeholder="กรอกจำนวน (คน)" value="<?php echo $row['student']; ?>" required="">
                                        </div>

                                        <!-- วันที่เดินทางไป -->
                                        <div class="col-6">
                                            <label for="username" class="form-label">วันที่เดินทางไป</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">วันที่</span>
                                                <input type="date" class="form-control" id="date_from" name="date_from" placeholder="Username" required="" value="<?php echo $row['date_from']; ?>">
                                            </div>
                                        </div>
                                        <!-- วันทีเดินทางไป -->
                                        <!-- เวลา -->
                                        <div class="col-6">
                                            <label for="username" class="form-label">เวลาที่เดินทาง</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">เวลาที่ไป</span>
                                                <input type="time" class="form-control" id="time_from" name="time_from" placeholder="Time" required="" value="<?php echo $row['time_from']; ?>">
                                            </div>
                                        </div>
                                        <!-- สิ้นสุดเวลา -->

                                        <!-- วันที่เดินทางกลับ -->
                                        <div class="col-6">
                                            <label for="username" class="form-label">วันที่เดินทางกลับ</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">วันที่กลับ</span>
                                                <input type="date" class="form-control" id="date_to" name="date_to" placeholder="Username" required="" value="<?php echo $row['date_to']; ?>">
                                            </div>
                                        </div>
                                        <!-- เวลา -->
                                        <div class="col-6">
                                            <label for="username" class="form-label">เวลาที่เดินทาง</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">เวลาที่กลับ</span>
                                                <input type="time" class="form-control" id="time_to" name="time_to" placeholder="Time" required="" value="<?php echo $row['time_to']; ?>">
                                            </div>
                                        </div>
                                        <!-- สิ้นสุดเวลา -->
                                        <!-- วันทีเดินทางกลับ -->
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">รวมระยะทาง</label>
                                            <input type="text" class="form-control" id="distance" name="distance" placeholder="กรอกระยะทาง" value="<?php echo $row['distance']; ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ผู้ควบคุมรถยนต์ราชการขณะเดินทาง</label>
                                            <input type="text" class="form-control" id="caretaker" name="caretaker" placeholder="กรอกชื่อผู้รับผิดชอบ" value="<?php echo $row['caretaker']; ?>" required="">

                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ลงชื่อคนขอ</label>
                                            <input type="text" class="form-control" id="name_request" name="name_request" placeholder="กรอกชื่อผู้รับผิดชอบ" value="<?php echo $row['name_request']; ?>" required="">

                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ความเห็นหัวหน้าแผนกงานยานพาหนะ</label>
                                            <input type="text" class="form-control" id="status" name="status" placeholder="กรอกความเห็น" value="<?php echo $row['status']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">หมายเหตุ</label>
                                            <input type="text" class="form-control" id="remark" name="remark" placeholder="กรอกความเห็น" value="<?php echo $row['remark']; ?>" required="">
                                        </div>
                                    <?php
                                    }
                                }
                                $sql    = "SELECT * FROM type WHERE id=$type";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <div class="col-md-6">
                                            <label for="country" class="form-label">ประเภทรถ</label>
                                            <input type="text" class="form-control" id="type_name" name="type_name" placeholder="" value="<?php echo $row['type_name']; ?>" required="">
                                        </div>
                                    <?php
                                    }
                                }
                                $sql    = "SELECT * FROM events WHERE id=$idm";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <div class="col-md-6">
                                            <label for="pwd" class="form-label">ทะเบียน</label>
                                            <input type="text" class="form-control" id="vehicle_id" name="vehicle_id" placeholder="" value="<?php echo $row['vehicle_id']; ?>" required="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="country" class="form-label">คนขับ</label>
                                            <input type="text" class="form-control" id="driver_id" name="driver_id" placeholder="" value="<?php echo $row['driver_id']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ขอเบิกเบี้ยเลี้ยง</label>
                                            <input type="text" class="form-control" id="allowance" name="allowance" placeholder="ลงชื่อ" value="<?php echo $row['allowance']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ลงชื่อหัวหน้าแผนกงาน</label>
                                            <input type="text" class="form-control" id="manager_name" name="manager_name" placeholder="ลงชื่อ" value="<?php echo $row['manager_name']; ?>" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">เอกสารที่แนบมา</label>
                                            <input type="text" class="form-control" id="file" name="file" value="<?php echo $row['document']; ?>">
                                        </div>
                                        <hr class="my-4">
                                        <!-- ความเห็นผู้อำนวยการสำนักงานวิทยาเขตขอนแก่น -->
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ความเห็นอำนวยการสำนักงานวิทยาเขตขอนแก่น</label>
                                            <input type="text" class="form-control" id="remark_mg2" name="remark_mg2" placeholder="กรอกความเห็น" value="<?php echo $row['remark_mg2'] ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>
                                        <!-- ความเห็นรองอธิการบดีประจำวิทยาเขตขอนแก่น -->
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ความเห็นรองอธิการบดีประจำวิทยาเขตขอนแก่น</label>
                                            <input type="text" class="form-control" id="remark_mg3" name="remark_mg3" placeholder="กรอกความเห็น" value="<?php echo $row['remark_mg3'] ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ลงชื่อผู้อำนวยการสำนักงานวิทยาเขตขอนแก่น</label>
                                            <input type="text" class="form-control" id="manager2_name" name="manager2_name" placeholder="ลงชื่อ" value="<?php echo $row['manager2_name'] ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ลงชื่อรองอธิการบดีประจำวิทยาเขตขอนแก่น</label>
                                            <input type="text" class="form-control" id="manager3_name" name="manager3_name" placeholder="ลงชื่อ" value="<?php echo $row['manager3_name'] ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ลงวันที่ผู้อำนวยการสำนักงานวิทยาเขตขอนแก่น</label>
                                            <input type="date" class="form-control" id="manager2_date" name="manager2_date" placeholder="ลงชื่อ" value="<?php echo $row['manager2_date'] ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">ลงวันที่รองอธิการบดีประจำวิทยาเขตขอนแก่น</label>
                                            <input type="date" class="form-control" id="manager3_date" name="manager3_date" placeholder="ลงชื่อ" value="<?php echo $row['manager3_date'] ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid is required.
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                            <hr class="my-4">
                            <!-- <button class="w-100 btn btn-success btn-lg" type="submit">บันทึก</button> -->
                            <button class="btn btn-info" type="submit" name="submit" href='downloadfile.php?file="<?php $row['document']  ?>"'>ดาวน์โหลดเอกสารที่แนบมา</button>
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