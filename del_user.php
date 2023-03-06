<?php
    include("connect.php");
    
    $id = $_GET['id'];
    //ลบข้อมูลรถจาก id
    $sql    = "DELETE FROM user WHERE user_id = '".$id."'";
    $query  = $conn->query($sql); 
    if($query){
        echo "<script>";
        echo "alert(\"ลบข้อมูลบุคลากรแล้ว\");";
        echo "window.history.back()";
        echo "</script>";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>