<?php
session_start();
include('connect.php');

$level = $_SESSION['userlevel'];
if ($level != '1') {
    Header("Location:logout.php");
}
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$position = $_POST['position'];
$location = $_POST['location'];
$passenger = $_POST['passenger'];
$request_for = $_POST['request_for'];
$date_from = $_POST['date_from'];
$date_to = $_POST['date_to'];
$time_from = $_POST['time_from'];
$time_to = $_POST['time_to'];
$type = $_POST['country'];
$license_plate = $_POST['state'];
$driver_id = $_POST['driver_id'];
$manager_name = $_POST['manager_name'];

$_SESSION['timeST'] = "T$time_from+07:00";
$_SESSION['timeEND'] = "T$time_to+07:00";

// $_SESSION['B'] = "$date";
$_SESSION['id'] = "$id";
$_SESSION['fname'] = "$fname";
$_SESSION['lname'] = "$lname";
$_SESSION['position'] = "$position";
$_SESSION['location'] = "$location";
$_SESSION['passenger'] = "$passenger";
$_SESSION['request_for'] = "$request_for";
$_SESSION['date_from'] = "$date_from";
$_SESSION['date_to'] = "$date_to";
$_SESSION['time_from'] = "$time_from";
$_SESSION['time_to'] = "$time_to";
$_SESSION['type'] = "$type";
$_SESSION['license_plate'] = "$license_plate";
$_SESSION['driver_id'] = "$driver_id";
$_SESSION['manager_name'] = "$manager_name";
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
    include('ul.php');
    ?>
    <!-- EndNavbar -->

    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                    <center>
                        <h4 class="mb-3">ตรวจสอบข้อมูล</h4>
                    </center>
                    <form class="needs-validation" name="from1" method="post" action="save_orderin_user.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_SESSION['id'] ?>" required="">
                                <label for="firstName" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ" value="<?php echo $_SESSION['fname'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามสกุล" value="<?php echo $_SESSION['lname'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <!-- ตำแหน่งงาน -->
                            <div class="col-sm-12">
                                <label for="" class="form-label">ตำแหน่ง</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="กรอกตำแหน่งงาน" value="<?php echo $_SESSION['position'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid Job title is required.
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="" class="form-label">ขออนุญาตใช้รถยนต์ ราชการ เพื่อเดินทางไป
                                    (สถานที่ไป)</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="กรอกรายละเอียดการเดินทาง" value="<?php echo $_SESSION['location'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="" class="form-label">จำนวนผู้เดินทาง</label>
                                <input type="text" class="form-control" id="passenger" name="passenger" placeholder="กรอกรายละเอียดการเดินทาง" value="<?php echo $_SESSION['passenger'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="" class="form-label">เพื่อปฎิบัติหน้าที่</label>
                                <input type="text" class="form-control" id="request_for" name="request_for" placeholder="กรอกรายละเอียดการเดินทาง" value="<?php echo $_SESSION['request_for'] ?>" required="">
                                <div class="invalid-feedback">
                                    Valid is required.
                                </div>
                            </div>

                            <!-- วันที่เดินทางไป -->
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">วันที่</span>
                                    <input type="text" class="form-control" id="date_from" name="date_from" placeholder="Username" required="" value="<?php echo $_SESSION['date_from'] ?>">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">วันที่</span>
                                    <input type="text" class="form-control" id="date_to" name="date_to" placeholder="Username" required="" value="<?php echo $_SESSION['date_to'] ?>">
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
                                    <input type="text" class="form-control" id="time_from" name="time_from" placeholder="Time" required="" value="<?php echo $_SESSION['time_from'] ?>">
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
                                    <input type="text" class="form-control" id="time_to" name="time_to" placeholder="Time" required="" value="<?php echo $_SESSION['time_to'] ?>">
                                    <div class="invalid-feedback">
                                        Your time is required.
                                    </div>
                                </div>
                            </div>
                            <?php
                            $sql    = "SELECT * FROM type WHERE id=$type";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">ประเภทรถ</label>
                                        <input type="hidden" class="form-control" id="vehicle_id" name="vehicle_id" required="" value="<?php echo $_SESSION['type'] ?>">
                                        <input type="text" class="form-control" id="show" name="show" required="" value="<?php echo $row['type_name'] ?>">
                                    </div>
                                <?php
                                }
                            }
                            $sql    = "SELECT * FROM vehicle WHERE vehicle_id=$license_plate";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">หมายเลขทะเบียนรถ</label>
                                        <input type="hidden" class="form-control" id="license_plate" name="license_plate" required="" value="<?php echo $_SESSION['license_plate'] ?>">
                                        <input type="text" class="form-control" id="license_name" name="license_name" required="" value="<?php echo $row['license_plate'] ?>">
                                    </div>
                                <?php
                                }
                            }
                            $sql    = "SELECT * FROM user WHERE user_id=$driver_id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-md-12">
                                        <label for="country" class="form-label">คนขับ</label>
                                        <input type="hidden" class="form-control" id="driver_id" name="driver_id" required="" value="<?php echo $_SESSION['driver_id'] ?>">
                                        <input type="text" class="form-control" id="driver_name" name="driver_name" required="" value="<?php echo $row['fname'], '&nbsp', $row['lname'] ?>">
                                <?php
                                }
                            }
                                ?>
                                    </div>
                                    <input type="hidden" class="form-control" id="name_request" name="name_request" placeholder="กรอกข้อมูล" value="<?php echo $_SESSION['fname'], '&nbsp', $_SESSION['lname'] ?>" required="">

                                    <center>
                                        <div class="col-sm-6">
                                            <label for="lastName" class="form-label">ผู้อนุญาตให้รถยนต์ราชการออกนอกเขตวิทยาเขตฯ</label>
                                            <input type="text" class="form-control" id="manager_name" name="manager_name" placeholder="กรอกข้อมูล" value="<?php echo $_SESSION['manager_name'] ?>" required="">
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>
                                    </center>

                                    <input type="hidden" class="form-control" id="datetimeTst" name="datetimeTst" placeholder="" value="<?php echo $_SESSION['date_from'] . $_SESSION['timeST'] ?>" required="">
                                    <input type="hidden" class="form-control" id="datetimeTend" name="datetimeTend" placeholder="" value="<?php echo $_SESSION['date_to'] . $_SESSION['timeEND'] ?>" required="">
                                    <hr class="my-4">
                                    <button class="w-100 btn btn-success btn-lg" type="submit" name="submit2">สร้างPDF</button>
                                    <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">บันทึก</button>

                    </form>
                </div>
            </div>
        </main>
        <?php
        include('footer.php')
        ?>
    </div>
</body>

</html>