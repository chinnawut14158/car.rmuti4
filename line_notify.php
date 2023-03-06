<?php
    // sleep(3);
    // session_start();
    include("connect.php");
    session_start();
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $time_from = $_SESSION['time_from'];
    $time_to = $_SESSION['time_to'];
    $date_from = $_SESSION['date_from'];
    $date_to = $_SESSION['date_to'];
    $request_for = $_SESSION['request_for'];
    $location = $_SESSION['location'];
    $driver_id = $_SESSION['driver_id'];
    $head = $_SESSION['head'];

    //ดึงข้อมูลจาก ฐานข้อมูล notify_line
    $sql = "SELECT * FROM notify_line ";
    //เชื่อมต่อ
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1); {
        // เก็บ token ในฐานข้อมูลออกมาเก็บไว้เพื่อเรียกใช้งาน
        $row = mysqli_fetch_array($result);
        $_SESSION['token'] = $row['token'];
        $token = $row['token'];
        
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Bangkok");
    }
    // เอา token ของเรามาเก็บไว้ใน sToken
    $sToken = "$token";

    // เอา ชื่อคนขับ
    $sql2 = "SELECT * FROM user WHERE user_id = $driver_id";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) == 1); {
        $row = mysqli_fetch_array($result2);
    $_SESSION['Dpre'] = $row['pre'];
    $_SESSION['Dfname'] = $row['fname'];
    $_SESSION['Dlname'] = $row['lname'];

    $Dpre = $_SESSION['Dpre'];
    $Dfname = $_SESSION['Dfname'];
    $Dlname = $_SESSION['Dlname'];
    }
    //ส่วนนี้ข้อความที่เราต้องการส่งกลับไปหา line app
    // $linename $request_for $jorney_date_st $jorney_date_end เป็นข้อมูลที่เรากรอกแบบฟอร์ม
    $sMessage = "$head
ชื่อผู้จอง: $fname $lname
เวลา: $time_from ถึงเวลา $time_to
วันที่: $date_from ถึงวันที่ $date_to
รายละเอียดการขอใช้: $request_for
รายละเอียดสถานที่: $location
ชื่อคนขับ: $Dpre$Dfname $Dlname";

    $chOne = curl_init();
    curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($chOne, CURLOPT_POST, 1);
    curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
    $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($chOne);

    //Result error 
    if (curl_error($chOne)) {
        echo 'error:' . curl_error($chOne);
    } else {
        $result_ = json_decode($result, true);
        echo "status : " . $result_['status'];
        echo "message : " . $result_['message'];
    }
    curl_close($chOne);

    echo "<script> alert('ส่งการแจ้งเตือนผ่านไลน์แล้ว'); window.location = './list_request.php';</script>";

    ?>
