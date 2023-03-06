<?php
include('connect.php');
session_start();
$level = $_SESSION['userlevel'];
 	if($level!='1'){
    Header("Location:logout.php");  
  }  
?>
<!-- <!DOCTYPE html> -->
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
    include('ul.php');

    if (isset($_GET['id'])) {
        //ดึงข้อมูล จากไอดี มาทำการแก้ไข
            $sql    = "SELECT * FROM events WHERE id = '" . $_GET['id'] . "'";
            $result = $conn->query($sql);
            $row    = $result->fetch_assoc();
  ?>
    <!-- EndNavbar -->
    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                    <center>
                        <h4 class="mb-3">เพิ่มข้อมูลหลังจากเดินทาง</h4>
                    </center>
                    <form class="needs-validation" name="from1" method="post" action="save_after.php"
                        enctype="multipart/form-data">
                        <div class="row g-3">
                        <input type="hidden" class="form-control" id="id" name="id" 
                        placeholder="กรอกข้อมูล" value="<?php echo $row['id']; ?>" required="">
                        <input type="hidden" class="form-control" id="vehicle_id" name="vehicle_id" 
                        placeholder="กรอกข้อมูล" value="<?php echo $row['vehicle_id']; ?>" required="">
                        <div class="row g-3">

                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">เข็มไมล์ (ก่อนใช้)</label>
                                <input type="text" class="form-control" id="mile_st" name="mile_st" placeholder="กรอกข้อมูล"
                                    value="" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">เข็มไมล์ (หลังใช้)</label>
                                <input type="text" class="form-control" id="mile_end" name="mile_end"
                                    placeholder="กรอกข้อมูล" value="" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="lastName" class="form-label">วันที่ออก</label>
                                <input type="date" class="form-control" id="date_out" name="date_out"
                                    placeholder="กรอกข้อมูล" value="" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="lastName" class="form-label">วันที่เข้า</label>
                                <input type="date" class="form-control" id="date_in" name="date_in"
                                    placeholder="กรอกข้อมูล" value="" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="lastName" class="form-label">เวลารถออก</label>
                                <input type="time" class="form-control" id="time_out" name="time_out"
                                    placeholder="กรอกข้อมูล" value="" >
                            </div>   
                            <div class="col-sm-3">
                                <label for="lastName" class="form-label">เวลารถเข้า</label>
                                <input type="time" class="form-control" id="time_in" name="time_in"
                                    placeholder="กรอกข้อมูล" value="" >
                            </div>   
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">ลงชื่อแผนกรักษาความปลอดภัย (ออก)</label>
                                <input type="text" class="form-control" id="sec_out" name="sec_out"
                                    placeholder="กรอกข้อมูล" value="" >
                            </div> 
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">ลงชื่อแผนกรักษาความปลอดภัย (เข้า)</label>
                                <input type="text" class="form-control" id="sec_in" name="sec_in"
                                    placeholder="กรอกข้อมูล" value="" >
                            </div>   
                            <div class="col-sm-12">
                                <label for="lastName" class="form-label">การเดินทาง</label>
                                <select class="form-select" id="status_orderID" name="status_orderID" required="" >
                                    <option value="">เลือก...</option>
                                    <option value="1">กำลังดำเนินการ</option>
                                    <option value="2">เดินทางสำเสร็จ</option>
                                </select>
                            </div>
                            <hr class="my-4">

                        <button class="w-100 btn btn-success btn-lg" type="submit" name="submit">บันทึก</button>
                        </div>
                    </form>
<?php
    }
?>
                </div>
            </div>
        </main>
        <?php
        include('footer.php');
        ?>
    </div>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="form-validation.js"></script>
</body>

</html>