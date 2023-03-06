<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CarBooking</title>
    <style>
        input[type="text"],input[type="password"] {
            display: block;
            padding: 14px;
            margin-bottom: 24px;
            width: 100%;
            border: 2px solid #A8A8A8;
            background: none; 
        }
        input[type="text"]:focus, input[type="password"]:focus, input[type="text"]:hover, input[type="password"]:hover{
            border: 2px solid #0d6efd;
            outline: none;
        }
        input[type="submit"] {
            display: block;
            padding: 14px;
            margin-bottom: 24px;
            width: 100%;
            border: 2px solid #A8A8A8;
            background: none;
            
        }
        input[type="submit"]:hover {
            border: 2px solid #0d6efd;
            background-color: #0d6efd;
        }
    </style>
  </head>
  <body style="background-color:#605ca8; color:#fff; "> 
  <div class="d-flex vh-100">
  
    <div style="background-color: #FFFFFF; width:450px; border-radius: 24px; padding:10px 16px 20px 16px;" class="mx-auto align-self-center">
    <p align="center"><img src="css\image/RMUTI.png" width="80"></p>
    <center><h6 style="color:#000000;">ระบบจัดเก็บข้อมูลการขออนุญาตขอใช้รถยนต์ราชการ</h6></center>
    <center><h6 style="color:#000000; ">มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น</h6></center>
    <center><h6 style="color:#000000; "></h6></center>
    <!-- <center><h6 style="color:#dc3545; ">ใช้ Username และ Password ตัวเดียวกันกับอีเมลมหาวิทยาลัย</h6></center> -->
    <center><h1 style="color:#000000; font-size:30px; margin-bottom:32px; margin-top:30px;">Login</h1></center>
    <form  name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
        <!-- <form> -->
            <input type="text" name="username" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <p style="color:#FF0000" >*สำหรับผู้ดูแลระบบเท่านั้น</p>
            <button class="w-100 btn btn-success btn-lg" type="submit" name="submit2">เข้าสู่ระบบ</button>
        </form>
        <br><button class="btn btn-warning" onclick="location.href='user_index.php'">ผู้ใช้ทั่วไป</button><p style="color:#FF0000" >*ผู้ใช้ทั่วไปสามารถคลิกที่ "ผู้ใช้ทั่วไป" เพื่อไปยังขอใช้บริการ</p>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>