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

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body style="background-color:ebebeb">

  <!-- Navbar -->
  <?php
  include('user_ul.php');
  ?>
  <!-- EndNavbar -->
  <div class="container">
    <div class="row g-4">
      <!-- <div class="col-sm-3">
          <button class="w-10 btn btn-success btn-lg" onclick="location.href='download.php?file=manualadmin.pdf'">ดาวน์โหลดคู่มือการใช้งาน(ผู้ดูแลระบบ)</button>                
      </div> -->
      <div class="col-sm-4">
        <button class="w-10 btn btn-success btn-lg" onclick="location.href='download.php?file=manualuser.pdf'">ดาวน์โหลดคู่มือการใช้งาน(ผู้ใช้ทั่วไป)</button>               
      </div>
      <div class="col-sm-4">
      <button class="w-10 btn btn-success btn-lg" onclick="location.href='download.php?file=formin.pdf'">ดาวน์โหลดแบบฟอร์ม(ภายในเขตอำเภอเมือง)</button>               
      </div>
      <div class="col-sm-4">
      <button class="w-10 btn btn-success btn-lg" onclick="location.href='download.php?file=formout.pdf'">ดาวน์โหลดแบบฟอร์ม(นอกเขตอำเภอเมือง)</button>              
      </div>
    </div>
  </div>
  <?php
        include('footer.php');
        ?>
  </div>


  <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <script src="form-validation.js"></script>


</body>

</html>