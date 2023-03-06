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
                    <form class="needs-validation" name="from1" method="post" action="user_confirm_in.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <?php
                            if (isset($_GET['id'])) {
                                //ดึงข้อมูล จากไอดี มาทำการแก้ไข
                                $sql    = "SELECT * FROM events WHERE id = '" . $_GET['id'] . "'";
                                $result = $conn->query($sql);
                                $row    = $result->fetch_assoc();
                                $file = $row['document'];
                            ?>
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="กรอกชื่อ" value="<?php echo $row['id']; ?>" required="">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ" value="<?php echo $row['fname']; ?>" required="">

                                </div>
                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามสกุล" value="<?php echo $row['lname']; ?>" required="">
                                </div>
                                <!-- ตำแหน่งงาน -->
                                <div class="col-sm-12">
                                    <label for="" class="form-label">ตำแหน่ง</label>
                                    <input type="text" class="form-control" id="position" name="position" placeholder="กรอกตำแหน่งงาน" value="<?php echo $row['position']; ?>" required="">
                                </div>
                                <div class="col-sm-12">
                                    <label for="" class="form-label">ขออนุญาตใช้รถยนต์ ราชการ เพื่อเดินทางไป
                                        (สถานที่ไป)</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="กรอกสถานที่เดินทาง" value="<?php echo $row['location']; ?>" required="">
                                </div>
                                <div class="col-sm-12">
                                    <label for="" class="form-label">จำนวนผู้เดินทาง</label>
                                    <input type="text" class="form-control" id="passenger" name="passenger" placeholder="กรอกจำนวนผู้เดินทาง" value="<?php echo $row['passenger']; ?>" required="">
                                </div>
                                <div class="col-sm-12">
                                    <label for="" class="form-label">เพื่อปฎิบัติหน้าที่</label>
                                    <input type="text" class="form-control" id="request_for" name="request_for" placeholder="กรอกวัตถุประสงค์ในการเดินทาง" value="<?php echo $row['request_for']; ?>" required="">
                                </div>
                                <!-- วันที่เดินทางไป -->
                                <div class="col-6">
                                    <label for="username" class="form-label">วันที่</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">วันที่</span>
                                        <input type="date" class="form-control" id="date_from" name="date_from" placeholder="" required="" value="<?php echo $row['date_from']; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="username" class="form-label">วันที่</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">วันที่</span>
                                        <input type="date" class="form-control" id="date_to" name="date_to" placeholder="" required="" value="<?php echo $row['date_to']; ?>">
                                    </div>
                                </div>
                                <!-- เวลา -->
                                <div class="col-6">
                                    <label for="username" class="form-label">เวลาที่เดินทางไป</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">เวลาที่ไป</span>
                                        <input type="time" class="form-control" id="time_from" name="time_from" placeholder="Time" required="" value="<?php echo $row['time_from']; ?>">
                                    </div>
                                </div>
                                <!-- เวลา -->
                                <div class="col-6">
                                    <label for="username" class="form-label">เวลาที่เดินทางกลับ</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">เวลาที่กลับ</span>
                                        <input type="time" class="form-control" id="time_to" name="time_to" placeholder="Time" required="" value="<?php echo $row['time_to']; ?>">
                                        <div class="invalid-feedback">
                                            Your time is required.
                                        </div>
                                    </div>
                                </div>
                                <!-- ----------------------------------------------------------------------------- -->
                                <div class="col-md-6">
                                    <?php
                                    $query = "SELECT * FROM type Order by type_name";
                                    $result = $conn->query($query);
                                    ?>
                                    <label for="country" class="form-label">ประเภทรถ</label>
                                    <!-- <select class="form-select" name="vehicle_id" id="vehicle_id"> -->
                                    <select class="form-select" name="country" id="country" class="form-control" onchange="FetchState(this.value)" required>
                                        <option value="0">เลือกประเภทรถ</option>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value=' . $row['id'] . '>' . $row['type_name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="pwd" class="form-label">ทะเบียน</label>
                                    <!-- <label for="pwd">ทะเบียน</label> -->
                                    <select class="form-select" name="state" id="state" class="form-control" required>
                                        <option value="">เลือกทะเบียน</option>
                                    </select>
                                </div>
                                <?php
                                $res = mysqli_query($conn, "SELECT * FROM user WHERE userlevel = 2");
                                ?>
                                <div class="col-md-12">
                                    <label for="country" class="form-label">คนขับ</label>
                                    <select class="form-select" id="driver_id" name="driver_id">
                                        <option value="0">เลือกคนขับ</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo ("<option value='" . $row['user_id'] . "'>" . $row['fname'] . '&nbsp' . $row['lname'] . "</option>");
                                            // echo ("<option value='" . $row['driver_id   fname'] ."</option>");
                                        }
                                        ?>
                                    </select>
                                </div>
                                <center>
                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">ผู้อนุญาตให้รถยนต์ราชการออกนอกเขตวิทยาเขตฯ</label>
                                        <input type="text" class="form-control" id="manager_name" name="manager_name" placeholder="ลงชื่อผู้ขออนุญาต" value="" required="">
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div><br>
                                    
                                </center>
                                <hr class="my-4">
                                <button class="w-100 btn btn-success btn-lg" type="submit" name="submit">บันทึก</button>
                                <script type="text/javascript">
                                    function FetchState(id) {
                                        $('#state').html('');
                                        $('#city').html('<option>Select City</option>');
                                        $.ajax({
                                            type: 'post',
                                            url: 'ajaxdata.php',
                                            data: {
                                                country_id: id
                                            },
                                            success: function(data) {
                                                $('#state').html(data);
                                            }

                                        })
                                    }

                                    function FetchCity(id) {
                                        $('#city').html('');
                                        $.ajax({
                                            type: 'post',
                                            url: 'ajaxdata.php',
                                            data: {
                                                state_id: id
                                            },
                                            success: function(data) {
                                                $('#city').html(data);
                                            }

                                        })
                                    }
                                </script>
                            <?php
                            }
                            ?>
                    </form>
                    <div>
                        <!-- <button class="w-10 btn btn-success btn-lg" onclick="location.href='downloadfile.php?file=<?php $file ?>'">ดาวน์โหลดเอกสารที่แนบมา</button> -->
                    </div>
                </div>
            </div>
        </main>
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>