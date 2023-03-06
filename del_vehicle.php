<?php
    include("connect.php");
    
    $vehicle_id = $_GET['id'];
    //ลบข้อมูลรถจาก id
    $sql    = "DELETE FROM vehicle WHERE vehicle_id = '".$vehicle_id."'";
    $query  = $conn->query($sql); 
    if($query){
        echo "<script>";
        echo "alert(\"ลบข้อมูลรถแล้ว\");";
        echo "window.history.back()";
        echo "</script>";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>