<?php
session_start();
if (isset($_POST['submit'])) {
include("connect.php");

$errors = array();

$id = $_POST['id'];
$time_out = $_POST['time_out'];
$time_in = $_POST['time_in'];
$date_out = $_POST['date_out'];
$date_in = $_POST['date_in'];
$sec_out = $_POST['sec_out'];
$sec_in = $_POST['sec_in'];
$mile_st = $_POST['mile_st'];
$mile_end = $_POST['mile_end'];
$vehicle_id = $_POST['vehicle_id'];
// $status = $_POST['status'];
$status_orderID = $_POST['status_orderID'];

$_SESSION['status_orderID'] = $_POST['status_orderID'];
$checkstaus = $_SESSION['status_orderID'];


$sql    = "SELECT * FROM vehicle WHERE vehicle_id = $vehicle_id";
            $result = $conn->query($sql);
            $row    = $result->fetch_assoc();

			$number1 = $row['mile'];
 			$number2 = ( $mile_end - $mile_st );
			$number3 = ( $number1 + $number2 );

if($checkstaus=1){
$sql = "UPDATE events SET mile_st='$mile_st', mile_end='$mile_end', time_out='$time_out', 
		time_in='$time_in',date_out='$date_out', date_in='$date_in', sec_out='$sec_out', 
		sec_in='$sec_in', status_order='กำลังดำเนินการ', status_orderID='$status_orderID'
        WHERE id = '" . $id . "'";

$sql2 = "UPDATE vehicle SET mile='$number3'
        WHERE vehicle_id = '" . $vehicle_id . "'";
}
if($checkstaus=2){
	$sql = "UPDATE events SET mile_st='$mile_st', mile_end='$mile_end', time_out='$time_out', 
		time_in='$time_in',date_out='$date_out', date_in='$date_in', sec_out='$sec_out', 
		sec_in='$sec_in', status_order='ดำเนินการสำเร็จแล้ว', status_orderID='$status_orderID'
        WHERE id = '" . $id . "'";

	$sql2 = "UPDATE vehicle SET mile='$number3'
		WHERE vehicle_id = '" . $vehicle_id . "'";
}
$query  = $conn->query($sql);
$query  = $conn->query($sql2);
				if ($query) {
    				echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location = './list_request.php';</script>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
            }
			
?>