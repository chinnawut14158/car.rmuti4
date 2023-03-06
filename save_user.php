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
            header("Location: user_set.php?error=$em");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path="user_img/".$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $pre = mysqli_real_escape_string($conn, $_POST['pre']);
                $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                $lname = mysqli_real_escape_string($conn, $_POST['lname']);
				$sex = mysqli_real_escape_string($conn, $_POST['sex']);
                $position = mysqli_real_escape_string($conn, $_POST['position']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $tel = mysqli_real_escape_string($conn, $_POST['tel']);
                $userlevel = mysqli_real_escape_string($conn, $_POST['userlevel']);
                // Insert into Database
                $sql = "INSERT INTO user (user_id ,userlevel ,pre ,fname ,lname ,sex , position, email, password, tel, photo) 
                        VALUES(NULL, '$userlevel', '$pre', '$fname', '$lname','$sex','$position','$email','$password','$tel','$new_img_name')";

                mysqli_query($conn, $sql);

                echo "<script>alert('เพิ่มบุคลากรแล้ว'); window.location = 'list_user.php';</script>"; 
                // header("Location: vehicle.php");
            }else {
                $em = "You can't upload files of this type";
                header("Location: user_set.php?error=$em");
            }
        }
    }else {
        $em = "unknown error occurred!";
        header("Location: user_set.php?error=$em");
    }

}else {
    header("Location: user_set.php");
}