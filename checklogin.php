<?php 
session_start();
        if(isset($_POST['username'])){
                  include("connect.php");
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  // $sql="SELECT * FROM user WHERE email='$username' AND password='$password'";
                  $sql="SELECT * FROM user 
                  WHERE  email='".$username."' 
                  AND  password='".$password."' ";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);
                      
                      $_SESSION["userlevel"] = $row["userlevel"];

                      if($_SESSION["userlevel"]=="1"){ 

                        Header("Location: index.php");
                      }
                  if ($_SESSION["userlevel"]=="2"){ 

                    echo "<script>";
                      echo "alert(\" ขออภัยคุณไม่มีสิทธิเข้าถึงหน้านี้\");"; 
                      echo "window.history.back()";
                    echo "</script>";
                      }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{

             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>