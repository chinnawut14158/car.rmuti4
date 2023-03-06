<?php
require_once __DIR__ . '/vendor2/autoload.php';

// รับค่า
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
// $date_created = $_POST['date_created'];
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..................................................................................................................................จำนวน....' .$passenger. '..........คน<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เพื่อปฏิบัติหน้าที่.....................' .$request_for. '......................................................................................................................<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ในวันที่..........'.$date_from.'..............เวลา..........'.$time_from.'-'.$time_to.'................น.</p>
<p style="text-align:right">ลงชื่อ..............' . $name_request . '....................ผู้ขออนุญาต<br>
(.................' . $name_request . '....................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>';

// <p style="text-align:center">เลขไมล์...................................(ก่อนใช้)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขไมล์...................................(ก่อนใช้)<br>
// รถยนต์หมายเลขทะเบียน...............&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;พนักงานขับรถ..................................&nbsp;&nbsp;&nbsp;<br>
// ....................................................................................................................................................................................................<br></p>
// <p style="text-align:center"><b>ผู้อนุญาตให้รถยนต์ราชการออกนอกวิทยาเขตฯ</b></p>
// <p style="text-align:center">...........................................................................<br>
// หัวหน้าแผนกยานพาหนะ/ผู้ได้รับมอบอำนาจ</p>
// <b>แผนกรักษาความปลอดภัย</b>
// <table>
//     <tr>
//       <td>เที่ยวที่</td>
//       <td>เวลารถออก</td>
//       <td>เวลารถเข้า</td>
//       <td colspan="2">ลงชื่อแผนกรักษาความปลอดภัย</td>
//     </tr>
//     <tr>
//       <td style="width:10%" align="center">1.</td>
//       <td></td>
//       <td></td>
//       <td align="lelt">เข้า</td>
//       <td align="lelt">ออก</td>
//     </tr>
//     <tr>
//       <td align="center">2.</td>
//       <td></td>
//       <td></td>
//       <td></td>
//       <td></td>
//     </tr>
//     <tr>
//       <td align="center">3.</td>
//       <td></td>
//       <td></td>
//       <td></td>
//       <td></td>
//     </tr>
//     <tr>
//       <td align="center">4.</td>
//       <td></td>
//       <td></td>
//       <td></td>
//       <td></td>
//     </tr>
//     <tr>
//       <td align="center">5.</td>
//       <td></td>
//       <td></td>
//       <td></td>
//       <td></td>
//     </tr>
//   </table>' . '<br />';
  $data .= '<img src="img/inend.jpg"/>';
  // $data .= '
  // <table>
  // <tr>              
  // <th class="th"><img src="img/04.jpg"/></th>
  // </tr>
  // </table>';

  
// if($message)
// {
//     $data .= '<strong>message</strong>' . $message . '<br />';
// }

//write PDF
$mpdf->WriteHTML($data);

// output to browser
$mpdf->Output('ใบขออนุญาตใช้รถยนต์ราชการภายในอำเภอเมืองจังหวัดขอนแก่น.pdf', 'D');
?>