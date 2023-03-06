<?php
include('connect.php');
session_start();

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $level = $_POST['level'];
    $request_for = $_POST['request_for'];
    $location = $_POST['location'];
    $passenger = $_POST['passenger'];
    $teacher = $_POST['teacher'];
    $student = $_POST['student'];
    $date_from = $_POST['date_from'];
    $time_from = $_POST['time_from'];
    $date_to = $_POST['date_to'];
    $time_to = $_POST['time_to'];
    $distance = $_POST['distance'];
    $caretaker = $_POST['caretaker'];
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

        $sql = "INSERT INTO `events` (`id`, `in_out`, `in_out_id`, `pre`,`fname`, `lname`, `position`, `level`, `request_for`, 
            `location`, `passenger`, `teacher`, `student`, `date_from`, `time_from`, `date_to`, `time_to`, `distance`, 
            `caretaker`, `name_request`, `status`, `remark`, `vehicle_id`, `driver_id`, `allowance`, `manager_name`, 
            `manager_date`, `remark_mg2`, `manager2_name`, `manager2_date`, `remark_mg3`, `manager3_name`, 
            `manager3_date`, `date_out`, `time_out`, `sec_out`, `date_in`, `time_in`, `sec_in`, `mile_st`, 
            `mile_end`, `status_order`, `status_orderID`, `tel`, `document` ,`created`) VALUES
            (NULL, 'นอกอำเภอเมือง', 2, '$pre','$fname', '$lname', '$position', '$level', '$request_for', 
            '$location', '$passenger', '$teacher', '$student', '$date_from', '$time_from', '$date_to', '$time_to', '$distance', 
            '$caretaker', '$name_request', 1, NULL, NULL, NULL, NULL, NULL, 
            NULL, NULL, NULL, NULL, NULL, NULL, 
            NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 
            NULL, 'ยังไม่เริ่มดำเนินการ', 1, '$tel' , '$document2' ,current_timestamp())";

        mysqli_query($conn, $sql);

        echo "<script>";
        echo "alert(\"บันทึกสำเร็จ กำลังส่งข้อมูลไปยังผู้ดูแลระบบ\");";
        echo "window.history.back()";
        echo "</script>";
        
    // } else {
	}
	if( empty( $file ) ) {
        // Insert into Database
        $sql = "INSERT INTO `events` (`id`, `in_out`, `in_out_id`, `pre`,`fname`, `lname`, `position`, `level`, `request_for`, 
			`location`, `passenger`, `teacher`, `student`, `date_from`, `time_from`, `date_to`, `time_to`, `distance`, 
			`caretaker`, `name_request`, `status`, `remark`, `vehicle_id`, `driver_id`, `allowance`, `manager_name`, 
			`manager_date`, `remark_mg2`, `manager2_name`, `manager2_date`, `remark_mg3`, `manager3_name`, 
			`manager3_date`, `date_out`, `time_out`, `sec_out`, `date_in`, `time_in`, `sec_in`, `mile_st`, 
			`mile_end`, `status_order`, `status_orderID`, `tel`, `document`, `created`) VALUES
			(NULL, 'นอกอำเภอเมือง', 2, '$pre','$fname', '$lname', '$position', '$level', '$request_for', 
			'$location', '$passenger', '$teacher', '$student', '$date_from', '$time_from', '$date_to', '$time_to', '$distance', 
			'$caretaker', '$name_request', 1, NULL, NULL, NULL, NULL, NULL, 
			NULL, NULL, NULL, NULL, NULL, NULL, 
			NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 
			NULL, 'ยังไม่เริ่มดำเนินการ', 1, '$tel' , NULL, current_timestamp())";

        mysqli_query($conn, $sql);

        echo "<script>";
        echo "alert(\"บันทึกสำเร็จ กำลังส่งข้อมูลไปยังผู้ดูแลระบบ\");";
        echo "window.history.back()";
        echo "</script>";
    }
}
if (isset($_POST['submit2'])) {

    require_once __DIR__ . '/vendor2/autoload.php';

    // รับค่า
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $level = $_POST['level'];
    $request_for = $_POST['request_for'];
    $location = $_POST['location'];
    $passenger = $_POST['passenger'];
    $teacher = $_POST['teacher'];
    $student = $_POST['student'];
    $date_from = $_POST['date_from'];
    $time_from = $_POST['time_from'];
    $date_to = $_POST['date_to'];
    $time_to = $_POST['time_to'];
    $distance = $_POST['distance'];
    $caretaker = $_POST['caretaker'];
    $name_request = $_POST['name_request'];
    $tel = $_POST['tel'];
    $pre = $_POST['pre'];

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
        'default_font_size' => 13,
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
    font-size: 20px;
    }
    </style>
    
    </div>
    <table>
    <tr>
      <th class="th2"><img src="img/logo.jpg" alt="logo" width="40" height="60"></th>
      <th class="th2">มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น<br>
        ใบขออนุญาตใช้รถยนต์ราชการภายนอกเขตพื้นที่จังหวัดขอนแก่น</th>
    </tr>
    </table>';
    $data .= '<p style="text-align:right">วันที่.............เดือน.............พ.ศ. ................</p>
    <b>เรียน</b> รองอธิการบดีประจำวิทยาเขตขอนแก่น<br>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า........................' . $pre . '&nbsp;' . $fname . '..' . $lname . '...........................ตำแหน่ง..............' . $position . '.........ระดับ...........' . $level . '.................<br>
    มีความประสงค์ ขออนุญาตใช้รถยนต์ราลการ มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น เพื่อปฏิบัติราชการ 
    .....................................' . $request_for . '.......................สถานที่......................................' . $location . '................................<br>
    โดยมีผู้เดินทาง.................' . $passenger . '.................คน  <input type="radio" id="vehicle1" name="vehicle1" value="Bike">
    <label for="vehicle1">อาจารย์ - เจ้าหน้าที่ .................' . $teacher . '.................คน</label><input type="radio" id="vehicle1" name="vehicle1" value="Bike">
    <label for="vehicle1">นักศึกษา .................' . $student . '.................คน</label><br>
    ในวันที่..............' . $date_from . '..............เวลา ..............' . $time_from . '..............น. ถึงวันที่..............' . $date_to . '..............เวลา ..............' . $time_to . '..............น.<br>
    รวมระยะทาง.................' . $distance . '.................กม. โดยมอบให้...........................' . $caretaker . '...........................เป็นผู้ควบคุมรถยนต์ราชการขณะเดินทาง<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณา<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ.......' . $name_request . '.........ผู้ขออนุญาต<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(....................' . $name_request . '....................)<br></p>
    <p>ความเห็นหัวหน้าแผนกงานยานพาหนะ<br>
    <input type="radio">ไม่สามารถให้บริการได้ เนื่องจาก ............................................................................<br>
    <input type="radio">พิจารณาแล้ว เห็นควรให้ใช้รถยนต์ราชการ หมายเลขทะเบียน พร้อมพนักงานขับรถ ดังนี้<br>
    &nbsp;&nbsp;<input type="radio"> นข-9920<input type="radio"> นข-9921<input type="radio"> นข-9923<input type="radio"> นข-9924<input type="radio"> นข-4708<input type="radio"> นข-3883<input type="radio"> นข-3884<input type="radio"> กธ-6218<input type="radio"> กธ-6219<input type="radio"> ผพ-2795<br>
    &nbsp;&nbsp;<input type="radio"> 40-0477<input type="radio"> 40-0162<input type="radio"> 82-8504<input type="radio"> 85-9096<input type="radio"> 40-0635<input type="radio"> 40-06361<input type="radio"> 40-0411<br>
    &nbsp;&nbsp;<input type="radio"> นายเกีตรติศักดิ์ สะตะ<input type="radio"> นายบุญถิ่น ถิ่นถาน<input type="radio"> นายพัฒนา ทิพม่อม<input type="radio"> นายสุวรรณ นิยมทอง<input type="radio"> นายสมชาย นะคำศรี<br>
    &nbsp;&nbsp;<input type="radio"> นายธีรสิทธิ์ ประเสริฐสังข์<input type="radio"> นายเดวิด ทาปุ๋ย<input type="radio"> นายพงศกร ลาโกตร<input type="radio"> นายไอศูรย์ เงาพระฉาย<br>
    ทั้งนี้ ขอเบิกเบี้ยเลี้ยงตามสิทธิ์ และขอยืมเงินสำรองจ่ายค่าน้ำมันเชื้อเพลิง จำนวน.............................................บาท</p>
    <p style="text-align:right">ลงชื่อ...............................................หัวหน้าแผนกงานยานพาหนะ<br>
    ................/.............../................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    <b>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b></p>
    <p style="text-align:center">ความเห็น...............................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ความเห็น...............................................<br>
    ลงชื่อ...............................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ...............................................<br>
    ผู้อำนวยการสำนักงานวิทยาเขตขอนแก่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รองอธิการบดีประจำวิทยาเขตขอนแก่น<br>
    ................/.............../................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;................/.............../................<br>
    <b>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b><br>
    แผนกรักษาความปลอดภัย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    ................/.............../................เวลารถออก...................................น. ลงชื่อ ...........................................................................(ตัวบรรจง)<br>
    ................/.............../................เวลารถเข้า....................................น. ลงชื่อ ...........................................................................(ตัวบรรจง)<br></p>';

    // $data .= '<img src="img/outend.jpg" width="100%" height="73%"/>';

    //write PDF
    $mpdf->WriteHTML($data);

    // output to browser
    $mpdf->Output('ใบขออนุญาตใช้รถยนต์ราชการภายนอกเขตพื้นที่จังหวัดขอนแก่น.pdf', 'D');
}
