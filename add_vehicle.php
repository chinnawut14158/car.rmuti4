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
                        <h1>เพิ่มข้อมูลยานพาหนะ</h1>
                    </center>
                    <div class="row g-5">   
                        <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                            <form class="needs-validation" novalidate="" method="post" action="save_vehicle.php" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-sm-12">
                                        <label for="" class="form-label">ยี่ห้อรถ</label>
                                        <input type="text" class="form-control" id="" name="vehicle_name" placeholder="กรอกยี่ห้อรถ" value="" required="">
                                    </div>
                                    <?php
                                        $res = mysqli_query($conn, "SELECT * FROM type");
                                    ?>
                                        <div class="col-md-12">
                                        <label for="country" class="form-label">ประเภทรถ</label>
                                        <select class="form-select" id="type_id" name="type_id">
                                        <option value="0">เลือกประเภทรถ</option>
                                    <?php
                                        while ($row2 = mysqli_fetch_array($res)) {
                                    echo ("<option value='" . $row2['id'] . "'>" . $row2['type_name'] ."</option>");
                                    // echo ("<option value='" . $row['driver_id   fname'] ."</option>");
                                        }
                                    ?>
                                        </select>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-12">
                                            <label for="" class="form-label">หมายเลขทะเบียนรถ</label>
                                            <input type="text" class="form-control" id="license_plate"
                                                placeholder="กรอกหมายเลขทะเบียนรถ" value="" required="" name="license_plate">
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-sm-12">
                                                <label for="" class="form-label">จำนวนที่นั่ง</label>
                                                <input type="text" class="form-control" id="seat"
                                                    placeholder="กรอกจำนวนที่นั่ง" value="" required="" name="seat">
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">รูปภาพยานพานะ</label>
                                                    <input type="file" class="form-control" name="my_image" id="my_image" placeholder="ใส่ช่องอัปโหลดรูปภาพ" value="" required="">
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit" id="savecar">บันทึก</button>
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