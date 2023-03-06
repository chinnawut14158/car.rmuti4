<?php
session_start();
include('connect.php');

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

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">

  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#712cf9">
</head>

<body style="background-color:ebebeb">

  <!-- Navbar -->
  <?php
  include('ul.php');
  ?>
  <!-- EndNavbar -->

  <div class="container">
    <center>
      <h1>ปฏิทินการเดินรถ คณะวิศวกรรมศาสตร์</h1>
    </center>
    <div class="row g-5">
      <div class="col-md-7 col-lg-12" style="padding:0px 0px 0px 0px;">
        <center><iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23EF6C00&ctz=Asia%2FBangkok&showTz=0&showCalendars=0&showTabs=1&showPrint=1&showDate=1&showNav=1&showTitle=0&src=Y19hYzc4bWZjM3U4ZjNmM25zNDN1bmJrMWxoa0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23D50000" style="border: 0" width="1300" height="600" frameborder="0" scrolling="no"></iframe></center>
      </div>
    </div>
  </div>
</body>

</html>