<?php
include('connect.php');
session_start();
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
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
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
                        <h1>แก้ไข Line Token</h1>
                    </center>
                    <div class="row g-5">
                        <div class="col-md-7 col-lg-12" style="padding:50px 100px 0px 100px;">
                            <form class="needs-validation" method="post" action="send_line.php">
                                <div class="row g-3">
                                    <div class="col-sm-12">
                                        <label for="" class="form-label">Line Token</label>
                                        <input type="text" class="form-control" id="" placeholder="กรอกโทเคน" value=""
                                            required="" name="token">
                                        <!-- <div class="invalid-feedback">
                                            Valid first PhoneNumber is required.
                                        </div> -->
                                    </div>
                                </div>
                                <hr class="my-4">
                                <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit"
                                    id="submit">บันทึก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <?php
        include('footer.php')
        ?>
    </div>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="form-validation.js"></script>
</body>

</html>