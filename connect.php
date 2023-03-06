<?php 
    // ใช้สำหรับ localhost(xampp)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projectcalendar";

    // ใช้สำหรับ เซริฟมอ
    // $servername = "localhost";
    // $username = "chin";
    // $password = "Chin1234!";
    // $dbname = "projectcalendar";

    // สร้างคำสั่งลัด ให็เป็น $conn
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // $conn = mysqli_connect("127.0.0.1", "chin", "Chin1234!", "projectcalendar");

    // ตรวจสอบการเชื่อมต่อ
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 
?> 