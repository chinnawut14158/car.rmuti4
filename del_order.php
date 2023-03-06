<?php
    include("connect.php");
    
    $id = $_GET['id'];
    //ลบข้อมูลรถจาก id
    $sql    = "DELETE FROM events WHERE id = '".$id."'";
    $query  = $conn->query($sql); 
    if($query){
        // echo "<script>alert('ลบข้อมูลแล้ว'); window.location = './list_request.php';</script>"; 
        echo "<script>";
        echo "alert(\"ลบข้อมูลแล้ว\");";
        echo "window.history.back()";
        echo "</script>";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>