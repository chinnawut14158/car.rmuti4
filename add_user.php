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
    include('ul.php');
    include('connect.php');
  ?>
    <!-- EndNavbar -->
    <main>
        <div class="container">
            <div class="row" style="padding:50px 20px 0px 20px;">
                <div class="col">
                    <center>
                        <h1>เพิ่มบุคลากร</h1>
                    </center>
                    <div class="row g-5">   
                        <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                            <form class="needs-validation" novalidate="" method="post" action="save_user.php" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <label for="" class="form-label">คำนำหน้า</label>
                                        <input type="text" class="form-control" id="" name="pre" placeholder="กรอกคำนำหน้า" value="" required="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" id="" name="fname" placeholder="กรอกชื่อ" value="" required="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="" class="form-label">นามสกุล</label>
                                        <input type="text" class="form-control" id="" name="lname" placeholder="กรอกนามสกุล" value="" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label">เพศ</label>
                                        <input type="text" class="form-control" id="" name="sex" placeholder="กรอกข้อมูล" value="" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label">เบอร์โทร</label>
                                        <input type="text" class="form-control" id="" name="tel" placeholder="กรอกข้อมูล" value="" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label">อีเมล</label>
                                        <input type="email" class="form-control" id="" name="email" placeholder="กรอกข้อมูล" value="" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label">รหัสผ่าน(เฉพาะ ผู้ดูแลระบบ เท่านั้น)</label>
                                        <input type="password" class="form-control" id="" name="password" placeholder="กรอกข้อมูล" value="" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">ตำแหน่ง</label>
                                        <select class="form-select" id="position" required="" name="position">
                                            <option value="">เลือก...</option>
                                            <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                                            <option value="พนักงานขับรถ">พนักงานขับรถ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">กลุ่มผู้ใช้</label>
                                        <select class="form-select" id="userlevel" required="" name="userlevel">
                                            <option value="">เลือก...</option>
                                            <option value="1">ผู้ดูแลระบบ</option>
                                            <option value="2">พนักงานขับรถ</option>
                                        </select>
                                    </div>
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">รูปภาพ</label>
                                                    <input type="file" class="form-control" name="my_image" id="my_image" placeholder="" value="" required="">
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit" id="saveuser">บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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