<?php
session_start();
include('connect.php');
    $errors = array();

if (isset($_POST['submit'])) {
    $token = $_POST['token'];
    if (count($errors) == 0) {
        $sql = "UPDATE `notify_line` SET `token` = '$token' WHERE `notify_line`.`notify_id` = 1";
        $query  = $conn->query($sql);                                     
    if($query){
        echo "<script>alert('บันทึกสำเร็จ'); window.location = './setting_line.php';</script>"; 
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}echo "$token";