<?php 
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
                $img_upload_path="car/".$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
                $vehicle_name = mysqli_real_escape_string($conn, $_POST['vehicle_name']);
                $seat = mysqli_real_escape_string($conn, $_POST['seat']);
				$license_plate = mysqli_real_escape_string($conn, $_POST['license_plate']);

                // Insert into Database
                // $sql = "INSERT INTO vehicle (vehicle_id ,type_id ,vehicle_name ,seat ,license_plate, mile ,vehicle_photo) 
                //         VALUES(NULL, '$type_id', '$vehicle_name', '$seat','$license_plate',0,'$new_img_name')";

                $sql = "INSERT INTO vehicle (type_id, vehicle_name, seat, license_plate, mile, vehicle_photo) 
                        VALUES('$type_id', '$vehicle_name', '$seat', '$license_plate', '0', '$new_img_name')";


                mysqli_query($conn, $sql);

                echo "<script>alert('เพิ่มข้อมูลรถแล้ว'); window.location = './list_vehicle.php';</script>"; 
            }else {
                echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ'); window.location = './add_vehicle.php';</script>"; 
            }
        }
    }else {
        echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ'); window.location = './add_vehicle.php';</script>"; 
    }
}