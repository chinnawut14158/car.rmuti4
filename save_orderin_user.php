<?php
	include("connect.php");
session_start();
if (isset($_POST['submit'])) {

	$id = $_POST['id'];
	$datetimeTst = $_POST['datetimeTst'];
	$datetimeTend = $_POST['datetimeTend'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$position = $_POST['position'];
	$location = $_POST['location'];
	$passenger = $_POST['passenger'];
	$request_for = $_POST['request_for'];
	$date_from = $_POST['date_from'];
	$date_to = $_POST['date_to'];
	$time_from = $_POST['time_from'];
	$time_to = $_POST['time_to'];
	$license_plate = $_POST['license_plate'];
	$vehicle_id = $_POST['vehicle_id'];
	$driver_id = $_POST['driver_id'];
	$manager_name = $_POST['manager_name'];
	$name_request = $_POST['name_request'];
	$license_name = $_POST['license_name'];
	$driver_name = $_POST['driver_name'];
    
    $_SESSION['license_plate'] = "$license_plate";
	$_SESSION['driver_id'] = "$driver_id";
    $_SESSION['manager_name'] = "$manager_name";
	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	$_SESSION['time_from'] = $time_from;
	$_SESSION['time_to'] = $time_to;
	$_SESSION['date_from'] = $date_from;
	$_SESSION['date_to'] = $date_to;
	$_SESSION['request_for'] = $request_for;
	$_SESSION['location'] = $location;
	$_SESSION['driver_id'] = $driver_id;
	$_SESSION['timeGST'] = $datetimeTst;
	$_SESSION['timeGEND'] = $datetimeTend;
	$_SESSION['in_out'] = 'จองภายในอำเภอเมือง';
	$_SESSION['license_name'] = $license_name;
	$_SESSION['driver_name'] = $driver_name;


	$sqlemail = "SELECT * FROM user WHERE user_id = $driver_id";
	$resultemail = mysqli_query($conn, $sqlemail);
	 if (mysqli_num_rows($resultemail) == 1); {
		 $row = mysqli_fetch_array($resultemail);
	 $_SESSION['email'] = $row['email'];
	 }
	// เช็ครถ
    $checkcar = "SELECT * FROM events WHERE vehicle_id='$vehicle_id' AND 
    time_from >= '$time_from' AND time_to <= '$time_to' AND 
    date_from >= '$date_from' AND date_to <= '$date_to'";
    // เช็ค คนขับ
    $checkdriver = "SELECT * FROM events WHERE driver_id='$driver_id' AND 
    time_from >= '$time_from' AND time_to <= '$time_to' AND 
    date_from >= '$date_from' AND date_to <= '$date_to'";

    $result = mysqli_query($conn, $checkcar) or die("Error in sql : $checkcar".
    	mysqli_error($checkcar));
    $result2 = mysqli_query($conn, $checkdriver) or die("Error in sql : $checkdriver".
    	mysqli_error($checkdriver));
	
	if(mysqli_num_rows($result)==0){
        if(mysqli_num_rows($result2)==0){
	$sql = "UPDATE events SET fname='$fname', 
			lname='$lname',position='$position', location='$location', passenger='$passenger', 
			request_for='$request_for', date_from='$date_from', date_to='$date_to',
			time_from='$time_from', time_to='$time_to', name_request='$name_request',
			vehicle_id='$vehicle_id', driver_id='$driver_id', manager_name='$manager_name',
			manager_date=now(), status='2', status_order='กำลังดำเนินการ'
			WHERE events . id = '" . $id . "'";

		mysqli_query($conn, $sql);
		$query  = $conn->query($sql);
			// Insert into Database	event_google
			$sql2 = "INSERT INTO `event_google` (`id` ,`title` ,`description`,`location`,`date_from`,`date_to`,`time_from`,`time_to`,`datetimeTst`,`datetimeTend`,`created`) 
			VALUES(NULL, '$location', '$request_for', '$location', '$date_from', '$date_to', '$time_from', '$time_to'
			,'$datetimeTst','$datetimeTend',NOW())";	
		mysqli_query($conn, $sql2);

		// echo "<script> alert('กำลังส่งข้อมูลไปยัง ปฏิทิน'); window.location = './quickstart.php';</script>";
		echo "<script> alert('กำลังส่งข้อมูลไปยัง ปฏิทิน'); window.location = './add_event.php';</script>";
	}else{
		echo "<script>";
			echo "alert(\"คนขับซ้ำ บันทึกไม่สำเร็จ\");";
			echo "window.history.back()";
			echo "</script>";
	}
	} else {
		echo "<script>";
			echo "alert(\"รถซ้ำ บันทึกไม่สำเร็จ\");";
			echo "window.history.back()";
			echo "</script>";
	}
}
if (isset($_POST['submit2'])) {
	require_once __DIR__ . '/vendor2/autoload.php';
	include("connect.php");

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$position = $_POST['position'];
	$location = $_POST['location'];
	$passenger = $_POST['passenger'];
	$request_for = $_POST['request_for'];
	$date_from = $_POST['date_from'];
	$date_to = $_POST['date_to'];
	$time_from = $_POST['time_from'];
	$time_to = $_POST['time_to'];
	$license_plate = $_POST['license_plate'];
	$license_name = $_POST['license_name'];
	$vehicle_id = $_POST['vehicle_id'];
	$driver_id = $_POST['driver_id'];
	$driver_name = $_POST['driver_name'];
	$manager_name = $_POST['manager_name'];
	$name_request = $_POST['name_request'];

	$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
	$fontDirs = $defaultConfig['fontDir'];

	$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
	$fontData = $defaultFontConfig['fontdata'];

	$mpdf = new \Mpdf\Mpdf([
	'fontDir' => array_merge($fontDirs, [
		__DIR__ . '/tmp',
	]),
	'fontdata' => $fontData + [
		'sarabun' => [
			'R' => 'THSarabunNew.ttf',
			'I' => 'THSarabunNew Italic.ttf',
			'B' => 'THSarabunNew Bold.ttf',
			'BI'=> 'THSarabunNew BoldItalic.ttf'
		]
	],
	'default_font_size' => 14,
	'default_font' => 'sarabun'
	]);

	ob_start();

	// create new PDF instance
	// $mpdf = new \Mpdf\Mpdf();

	// create our PDF
	// $data .= '<img src="img/01.jpg">';
	// $data .= '<img src="RMUTI_KORAT.png">';
	// $data .= '<strong>fname</strong>' . $fname . '<br />';
	// $data .= '<strong>lname</strong>' . $lname . '<br />';
	// $data .= '<strong>email</strong>' . $email . '<br />';
	// $data .= '<strong>phone</strong>' . $phone . '<br />';
	$data .= ' <style>
	table {
	border-collapse: collapse;
	width: 100% ;
	height: 100%;   
	}
	td{
	border: 1px solid black;
	text-align: center;
	padding: 8px;
	}
	th {
	border: 1px solid black;
	font-size: 15px;
	padding: 8px;
	}
	.th2 {
	border: 1px solid white;
	font-size: 18px;

	}
	</style>
	</div>
	<table>
	<tr>              
	<th class="th2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/logo.jpg" width="50" height="80"/></th>
	  <th class="th2">มหาวิทยาลัยเทคโนโลยีอีสาน วิทยาเขตขอนแก่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
	แผนกยานพาหนะ งานอำนวนการ สำนักงานวิทยาเขตขอนแก่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
	ใบขออนุญาตใช้รถยนต์ราชการภายในอำเภอเมืองจังหวัดขอนแก่น &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	</tr>
	</table>';
	$data .= '<p style="text-align:right">วันที่.............เดือน.............พ.ศ. ................</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>เรื่อง</b> ขออนุญาตใช้รถยนต์ราชการภายในอำเภอเมือง จังหวัดขอนแก่น <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>เรียน</b> รองอธิการบดีประจำวิทยาเขตขอนแก่น<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า............................' . $fname . '..' . $lname . '...........................ตำแหน่ง........' . $position . '...........<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขออนุญาตใช้รถยนต์ราชการ เพื่อเดินทางไป (สถานที่จะไป) ............' .$location. '..........................................<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..................................................................................................................................จำนวน..........' .$passenger. '..........คน<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เพื่อปฏิบัติหน้าที่.....................' .$request_for. '......................................................................................................................<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ในวันที่..........'.$date_from.'..............เวลา..........'.$time_from.'-'.$time_to.'................น.</p>
	<p style="text-align:right">ลงชื่อ...................' . $name_request . '...................ผู้ขออนุญาต<br>
	(...................' . $name_request . '...................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>

	<p style="text-align:center">เลขไมล์...................................(ก่อนใช้)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขไมล์...................................(ก่อนใช้)<br>
	รถยนต์หมายเลขทะเบียน....'.$license_name.'.....&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;พนักงานขับรถ..........'.$driver_name.'............&nbsp;&nbsp;&nbsp;<br>
	....................................................................................................................................................................................................<br></p>
	<p style="text-align:center"><b>ผู้อนุญาตให้รถยนต์ราชการออกนอกวิทยาเขตฯ</b></p>
	<p style="text-align:center">.........................'.$manager_name.'.............................<br>
	หัวหน้าแผนกยานพาหนะ/ผู้ได้รับมอบอำนาจ</p>
	<b>แผนกรักษาความปลอดภัย</b>
	<table>
		<tr>
		  <td>เที่ยวที่</td>
		  <td>เวลารถออก</td>
		  <td>เวลารถเข้า</td>
		  <td colspan="2">ลงชื่อแผนกรักษาความปลอดภัย</td>
		</tr>
		<tr>
		  <td style="width:10%" align="center">1.</td>
		  <td></td>
		  <td></td>
		  <td align="lelt">เข้า</td>
		  <td align="lelt">ออก</td>
		</tr>
		<tr>
		  <td align="center">2.</td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr>
		  <td align="center">3.</td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr>
		  <td align="center">4.</td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr>
		  <td align="center">5.</td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
	  </table>';
	//write PDF
	$mpdf->WriteHTML($data);

	// output to browser
	$mpdf->Output('ใบขออนุญาตใช้รถยนต์ราชการภายในอำเภอเมืองจังหวัดขอนแก่น.pdf', 'D');
	}
?>