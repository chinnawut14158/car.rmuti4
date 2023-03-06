<?php 
session_start();
// if (isset($_POST['submit'])){
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
    include "connect.php";

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 12500000000) {
            $em = "Sorry, your file is too large.";
            header("Location: setting_vehicle.php?error=$em");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path="user_img/".$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
                // $vehicle_name = mysqli_real_escape_string($conn, $_POST['vehicle_name']);
                // $seat = mysqli_real_escape_string($conn, $_POST['seat']);
				// $license_plate = mysqli_real_escape_string($conn, $_POST['license_plate']);

				$errors = array();

				$id = $_POST['id'];
				$pre = $_POST['pre'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$sex = $_POST['sex'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$tel = $_POST['tel'];
				$userlevel = $_POST['userlevel'];
				$position = $_POST['position'];

				// $vehicle_id = $_POST['vehicle_id'];
				// $new_img_name = $_POST['image'];
				// $vehicle_name = $_POST['vehicle_name'];
				// $seat = $_POST['seat'];
				// $license_plate = $_POST['license_plate'];

				// $sql = "UPDATE vehicle SET type_id='$type_id', vehicle_name='$vehicle_name', seat='$seat', license_plate='$license_plate', 
				// 		vehicle_photo='$new_img_name' WHERE vehicle_id = '" . $vehicle_id . "'";
				$sql = "UPDATE user SET userlevel='$userlevel', pre='$pre',fname='$fname', lname='$lname', sex='$sex', email='$email', 
						position='$position', tel='$tel' , photo='$new_img_name' WHERE user_id = '" . $id . "'";
                // Insert into Database
                // $sql = "INSERT INTO vehicle (vehicle_id ,type_id ,vehicle_name ,seat ,license_plate ,vehicle_photo) 
                //         VALUES(NULL, '$type_id', '$vehicle_name', '$seat','$license_plate','$new_img_name')";

                mysqli_query($conn, $sql);

                echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location = './list_user.php';</script>"; 
                // header("Location: vehicle.php");
            }else {
                echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ'); window.location = './add_user.php';</script>"; 
            }
        }
	}
    // }else {
    //     echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ2'); window.location = './add_vehicle.php';</script>"; 
    // }
	else{
				// $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
                // $vehicle_name = mysqli_real_escape_string($conn, $_POST['vehicle_name']);
                // $seat = mysqli_real_escape_string($conn, $_POST['seat']);
				// $license_plate = mysqli_real_escape_string($conn, $_POST['license_plate']);

				$errors = array();

				// $vehicle_id = $_POST['vehicle_id'];
				$new_img_name = $_POST['image'];
				// $vehicle_name = $_POST['vehicle_name'];
				// $seat = $_POST['seat'];
				// $license_plate = $_POST['license_plate'];
				$id = $_POST['id'];
				$pre = $_POST['pre'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$sex = $_POST['sex'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$tel = $_POST['tel'];
				$userlevel = $_POST['userlevel'];
				$position = $_POST['position'];


				// $sql2 = "UPDATE vehicle SET type_id='$type_id', vehicle_name='$vehicle_name', seat='$seat', license_plate='$license_plate', 
				// 		vehicle_photo='$new_img_name' WHERE vehicle_id = '" . $vehicle_id . "'";
				$sql2 = "UPDATE user SET userlevel='$userlevel', pre='$pre',fname='$fname', lname='$lname', sex='$sex', email='$email', 
						position='$position', tel='$tel' , photo='$new_img_name' WHERE user_id = '" . $id . "'";
				mysqli_query($conn, $sql2);

                echo "<script>alert('แก้ไขข้อมูลแล้ว'); window.location = './list_user.php';</script>"; 
                // header("Location: vehicle.php");
            // }else{
            //     echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ1'); window.location = './add_vehicle.php';</script>"; 
            }
		}
			?>




<?php
// session_start();
// if (isset($_POST['submit'])) {
// include("connect.php");

// $errors = array();

// $id = $_POST['id'];
// $pre = $_POST['pre'];
// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $sex = $_POST['sex'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $tel = $_POST['tel'];
// $userlevel = $_POST['userlevel'];
// $position = $_POST['position'];

// $sql = "UPDATE user SET userlevel='$userlevel', pre='$pre',fname='$fname', lname='$lname', sex='$sex', email='$email', position='$position', tel='$tel'
//         WHERE user_id = '" . $id . "'";

// $query  = $conn->query($sql);
// 				if ($query) {
//     				echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location = './list_user.php';</script>";
// 				} else {
//     				echo "Error: " . $sql . "<br>" . $conn->error;
// 				}
//             }
?>