<?php 
include_once 'connect.php';

if (isset($_POST['country_id'])) {
	$query = "SELECT * FROM vehicle where type_id=".$_POST['country_id'];
	$result = $conn->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">เลือกหมายเลขทะเบียน</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['vehicle_id'].'>'.$row['license_plate'].'</option>';
		 }
	}else{

		echo '<option>ไม่มีรถ!</option>';
	}

}

// elseif (isset($_POST['state_id'])) {
	 

// 	$query = "SELECT * FROM city where s_id=".$_POST['state_id'];
// 	$result = $conn->query($query);
// 	if ($result->num_rows > 0 ) {
// 			echo '<option value="">Select City</option>';
// 		 while ($row = $result->fetch_assoc()) {
// 		 	echo '<option value='.$row['id'].'>'.$row['city_name'].'</option>';
// 		 }
// 	}else{

// 		echo '<option>No City Found!</option>';
// 	}

// }


?>