<?php
include('connect.php');
// include('error.php');

session_start();
// $errors = array();
// $errors = array();

if (isset($_POST['savecar']) && isset($_FILES['my_image'])) {
	// ขั้นตอนการเพิ่มไฟล์รูปภาพเราอัพโหลด และเปลี่ยนชื่อไฟล์รูปภาพ
	// echo "<pre>";
	print_r($_FILES['my_image']);
	// echo "</pre>";
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	// $error = $_FILES['my_image']['error'];
	echo "$img_name";
	// if ($error === 0) {
		// การกำหนดขนาดของรูปภาพให้ไม่เกิน ค่าที่เราตั้งไว้
		if ($img_size < 12500000000) {
		// 	$em = "Sorry, your file is too large.";
		// 	header("Location: setting_vehicle.php?error=$em");
		// } else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			// กำหนดให้ ไฟล์ที่รับมาต้องเป็น นามสกุลไฟล์ "jpg", "jpeg", "png" เท่านั้น
			$allowed_exs = array("jpg", "jpeg", "png");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
				$img_upload_path = 'car/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				$car_type = mysqli_real_escape_string($conn, $_POST['car_type']);
                $car_name = mysqli_real_escape_string($conn, $_POST['car_name']);
                $seat = mysqli_real_escape_string($conn, $_POST['seat']);
				$license_plate = mysqli_real_escape_string($conn, $_POST['license_plate']);

				// Insert into Database
				$sql = "INSERT INTO car (car_id ,car_type ,car_name ,seat ,license_plate ,car_photo) 
				        VALUES(NULL, '$car_type', '$car_name', '$seat','$license_plate', '0')";
				mysqli_query($conn, $sql);
                echo "<script> alert('เพิ่มข้อมูลรถสำเร็จ'); window.location = './setting_vehicle.php';</script>";
			} else {
				$em = "You can't upload files of this type";
			}
		}
	} else {
		// $em = "unknown error occurred!";
		echo "<script> alert('No'); </script>";
	}
// } else {
// 	header("Location: setting_vehicle.php");
// 	echo "<script> alert('No'); </script>";
// }
