<?php
include('connect.php');
session_start();
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
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php
    include('user_ul.php');
    ?>
    <!-- EndNavbar -->

    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                    <center>
                        <h4 class="mb-3">ขออนุญาตใช้รถยนต์ราชการภายนอกเขตอำเภอเมือง จังหวัดขอนแก่น</h4>
                    </center>
                    <form class="needs-validation" name="from1" method="post" action="user_sendorderout.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-2">
                                <label for="firstName" class="form-label">คำนำหน้า</label>
                                <input type="text" class="form-control" id="pre" name="pre" placeholder="กรอกคำนำหน้า" value="" required="">
                            </div>
                            <div class="col-sm-4">
                                <label for="firstName" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อ" value="" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามสกุล" value="" required="">
                            </div>

                            <!-- ตำแหน่งงาน -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">ตำแหน่ง</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="กรอกตำแหน่งงาน" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ระดับ</label>
                                <input type="text" class="form-control" id="level" name="level" placeholder="กรอกระดับ *ไม่มีใส่ -" value="">
                            </div>
                            <!-- ตำแหน่งงาน -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">ขออนุญาตใช้รถยนต์ราชการ เพื่อปฏิบัติหน้าที่</label>
                                <input type="text" class="form-control" id="request_for" name="request_for" placeholder="กรอกวัตถุประสงค์ในการเดินทาง" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">สถานที่ไป</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="กรอกรายละเอียดสถานที่เดินทาง" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">จำนวนผู้เดินทาง</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength=3 class="form-control" id="passenger" name="passenger" placeholder="กรอกจำนวนผู้เดินทาง" value="" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">อาจารย์ - เจ้าหน้าที่</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength=3 class="form-control" id="teacher" name="teacher" placeholder="กรอกจำนวน (คน) *ไม่มีใส่ 0" value="" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">นักศึกษา</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength=3 class="form-control" id="student" name="student" placeholder="กรอกจำนวน (คน) *ไม่มีใส่ 0" value="" required="">
                            </div>

                            <!-- วันที่เดินทางไป -->
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่เดินทางไป</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">วันที่ไป</span>
                                    <input type="date" class="form-control" id="date_from" name="date_from" placeholder="Username" required="">
                                </div>
                            </div>
                            <!-- วันทีเดินทางไป -->
                            <!-- เวลา -->
                            <div class="col-6">
                                <label for="username" class="form-label">เวลาที่เดินทาง</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">เวลาที่ไป</span>
                                    <input type="time" class="form-control" id="time_from" name="time_from" placeholder="Time" required="">
                                </div>
                            </div>
                            <!-- สิ้นสุดเวลา -->

                            <!-- วันที่เดินทางกลับ -->
                            <div class="col-6">
                                <label for="username" class="form-label">วันที่เดินทางกลับ</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">วันที่กลับ</span>
                                    <input type="date" class="form-control" id="date_to" name="date_to" placeholder="Username" required="">
                                </div>
                            </div>
                            <!-- เวลา -->
                            <div class="col-6">
                                <label for="username" class="form-label">เวลาที่เดินทาง</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">เวลาที่กลับ</span>
                                    <input type="time" class="form-control" id="time_to" name="time_to" placeholder="Time" required="">
                                </div>
                            </div>
                            <!-- สิ้นสุดเวลา -->
                            <!-- วันทีเดินทางกลับ -->
                            <div class="col-sm-6">
                                <label for="" class="form-label">รวมระยะทาง(กม.)</label>
                                <input type="number" min=1 class="form-control" id="distance" name="distance" placeholder="กรอกระยะทาง" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ผู้ควบคุมรถยนต์ราชการขณะเดินทาง</label>
                                <input type="text" class="form-control" id="caretaker" name="caretaker" placeholder="กรอกชื่อผู้รับผิดชอบ" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ลงชื่อผู้ขออนุญาต</label>
                                <input type="text" class="form-control" id="name_request" name="name_request" placeholder="กรอกชื่อ-นามสกุล" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">เบอร์โทรสำหรับติดต่อ</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="12" class="form-control" id="tel" name="tel" placeholder="กรอกเบอร์โทรศัพท์" value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">แนบเอกสาร(ในกรณีที่ไม่มี ไม่ต้องแนบเอกสาร)</label>
                                <input type="file" class="form-control" id="file" name="file" value="">
                            </div>
                            <hr class="my-4">
                            <button class="w-100 btn btn-success btn-lg" type="submit" name="submit">บันทึกข้อมูล</button>
                            <button class="w-100 btn btn-success btn-lg" type="submit" name="submit2">สร้างPDF</button>
                    </form>
                </div>
                <div>
                </div>
            </div>
        </main>
        <?php
        include('footer.php');
        ?>
        </footer>
    </div>
</body>

</html>