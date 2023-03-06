<?php
include('connect.php');

if (isset($_POST['submit'])) {

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
	$name_request = $_POST['name_request'];
	$tel = $_POST['tel'];
	$pre = $_POST['pre'];

	if (isset($_FILES["file"])) {
		$file = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];

		$img_ex = pathinfo($file, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

		$allowed_exs = array("jpg", "jpeg", "png", "docx", "pdf"); 

		if (in_array($img_ex_lc, $allowed_exs)) {
			$document = uniqid("document-").'.'.$img_ex_lc;
			$img_upload_path="document/".$document;
			move_uploaded_file($tmp_name, $img_upload_path);
			$document2 = $document;
		}
	}
	if( !empty( $file ) ) {

        $sql = "INSERT INTO `events` (`id`, `in_out`, `in_out_id`, `pre`, `fname`,`lname`, `position`, `level`, `request_for`, 
				`location`, `passenger`, `teacher`, `student`, `date_from`, `time_from`, `date_to`, `time_to`, `distance`, 
				`caretaker`, `name_request`, `status`, `remark`, `vehicle_id`, `driver_id`, `allowance`, `manager_name`, 
				`manager_date`, `remark_mg2`, `manager2_name`, `manager2_date`, `remark_mg3`, `manager3_name`, 
				`manager3_date`, `date_out`, `time_out`, `sec_out`, `date_in`, `time_in`, `sec_in`, `mile_st`, 
				`mile_end`, `status_order`, `status_orderID`, `tel`, `document`, `created`) VALUES
				(NULL, 'ภายในเขตอำเภอเมือง', 1, '$pre','$fname', '$lname', '$position', NULL, '$request_for', 
				'$location', '$passenger', NULL, NULL, '$date_from', '$time_from', '$date_to', '$time_to', NULL, 
				NULL, '$name_request', 1, NULL, NULL, NULL, NULL, NULL, 
				NULL, NULL, NULL, NULL, NULL, NULL, 
				NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 
				NULL, 'ยังไม่เริ่มดำเนินการ', 1, '$tel' , '$document2', current_timestamp())";

        mysqli_query($conn, $sql);

        echo "<script>";
        echo "alert(\"บันทึกสำเร็จ กำลังส่งข้อมูลไปยังผู้ดูแลระบบ\");";
        echo "window.history.back()";
        echo "</script>";
		}
	if( empty( $file ) ) {

	// Insert into Database events
	$sql = "INSERT INTO `events` (`id`, `in_out`, `in_out_id`, `pre`, `fname`, `lname`, `position`, `level`, `request_for`, 
			`location`, `passenger`, `teacher`, `student`, `date_from`, `time_from`, `date_to`, `time_to`, `distance`, 
			`caretaker`, `name_request`, `status`, `remark`, `vehicle_id`, `driver_id`, `allowance`, `manager_name`, 
			`manager_date`, `remark_mg2`, `manager2_name`, `manager2_date`, `remark_mg3`, `manager3_name`, 
			`manager3_date`, `date_out`, `time_out`, `sec_out`, `date_in`, `time_in`, `sec_in`, `mile_st`, 
			`mile_end`, `status_order`, `status_orderID`, `tel`, `document`, `created`) VALUES
			(NULL, 'ภายในเขตอำเภอเมือง', 1, '$pre','$fname', '$lname', '$position', NULL, '$request_for', 
			'$location', '$passenger', NULL, NULL, '$date_from', '$time_from', '$date_to', '$time_to', NULL, 
			NULL, '$name_request', 1, NULL, NULL, NULL, NULL, NULL, 
			NULL, NULL, NULL, NULL, NULL, NULL, 
			NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 
			NULL, 'ยังไม่เริ่มดำเนินการ', 1, '$tel' , NULL ,current_timestamp())";

	mysqli_query($conn, $sql);

	echo "<script>";
	echo "alert(\"บันทึกสำเร็จ กำลังส่งข้อมูลไปยังผู้ดูแลระบบ\");";
	echo "window.history.back()";
	echo "</script>";
	}
}
if (isset($_POST['submit2'])) {

	require_once __DIR__ . '/vendor2/autoload.php';

	$fname =  $_POST['fname'];
	$lname =  $_POST['lname'];
	$position =  $_POST['position'];
	$location =  $_POST['location'];
	$passenger =  $_POST['passenger'];
	$request_for =  $_POST['request_for'];
	$date_from =  $_POST['date_from'];
	$date_to =  $_POST['date_to'];
	$time_from =  $_POST['time_from'];
	$time_to =  $_POST['time_to'];
	$name_request =  $_POST['name_request'];
	$pre =  $_POST['pre'];

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
				'BI' => 'THSarabunNew BoldItalic.ttf'
			]
		],
		'default_font_size' => 14,
		'default_font' => 'sarabun'
	]);

	ob_start();

	// create new PDF instance
	// $mpdf = new \Mpdf\Mpdf();

	// create our PDF
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
  	<th class="th2">มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    แผนกยานพาหนะ งานอำนวนการ สำนักงานวิทยาเขตขอนแก่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    ใบขออนุญาตใช้รถยนต์ราชการภายในอำเภอเมืองจังหวัดขอนแก่น &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	</tr>
	</table>';
	$data .= '<p style="text-align:right">วันที่.............เดือน.............พ.ศ. ................</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>เรื่อง</b> ขออนุญาตใช้รถยนต์ราชการภายในอำเภอเมือง จังหวัดขอนแก่น <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>เรียน</b> รองอธิการบดีประจำวิทยาเขตขอนแก่น<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า.........................' . $pre . '&nbsp;' . $fname . '..' . $lname . '...........................ตำแหน่ง........' . $position . '...........<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขออนุญาตใช้รถยนต์ราชการ เพื่อเดินทางไป (สถานที่จะไป) ............' . $location . '..........................................<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..................................................................................................................................จำนวน..........' . $passenger . '..........คน<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เพื่อปฏิบัติหน้าที่.....................' . $request_for . '......................................................................................................................<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ในวันที่..........' . $date_from . '..............เวลา..........' . $time_from . '-' . $time_to . '................น.</p>
	<p style="text-align:right">ลงชื่อ...................' . $pre . '&nbsp;' . $name_request . '...................ผู้ขออนุญาต<br>
	(...................' . $name_request . '...................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
	<p style="text-align:center">เลขไมล์...................................(ก่อนใช้)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขไมล์...................................(ก่อนใช้)<br>
	รถยนต์หมายเลขทะเบียน....' . $license_name . '.....&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;พนักงานขับรถ..........' . $driver_name . '............&nbsp;&nbsp;&nbsp;<br>
	....................................................................................................................................................................................................<br></p>
	<p style="text-align:center"><b>ผู้อนุญาตให้รถยนต์ราชการออกนอกวิทยาเขตฯ</b></p>
	<p style="text-align:center">.........................' . $manager_name . '.............................<br>
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
