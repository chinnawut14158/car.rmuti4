<?php
/** Error reporting */
// error_reporting(0);
// ini_set('display_errors', FALSE);
// ini_set('display_startup_errors', FALSE);
require_once __DIR__ . '/vendor/autoload.php';
session_start();
$timeST = $_SESSION['timeGST'];
$timeEND = $_SESSION['timeGEND'];
$location = $_SESSION['location'];
$request_for = $_SESSION['request_for'];
$in_out = $_SESSION['in_out'];
$email = $_SESSION['email'];
$driver_name = $_SESSION['driver_name'];
$license_name = $_SESSION['license_name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Google Calendar API </title>
    <meta charset='utf-8' />
  </head>
  <body>
    <p>Add new Event</p>
      
<?php
define('APPLICATION_NAME', 'carrmuti');
define('CREDENTIALS_PATH', __DIR__ . '/.credentials/calendar.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/calendar-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR_EVENTS)
));
// https://developers.google.com/resources/api-libraries/documentation/calendar/v3/php/latest/class-Google_Service_Calendar.html 
/*if (php_sapi_name() != 'cli') {
  throw new Exception('This application must be run on the command line.');
}*/
  
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(SCOPES);
  $client->setAuthConfig(CLIENT_SECRET_PATH);
  $client->setAccessType('offline');
  $client->setApprovalPrompt('force');
    $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
    $client->setHttpClient($guzzleClient);  
  
  // Load previously authorized credentials from a file.
  $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
  if (file_exists($credentialsPath)) {
    $accessToken = json_decode(file_get_contents($credentialsPath), true);
  } else {
    // Request authorization from the user.
    $authUrl = $client->createAuthUrl();
    printf("Open the following link in your browser:\n%s\n", $authUrl);
    print 'Enter verification code: ';
    $authCode = trim(fgets(STDIN));
  
    // Exchange authorization code for an access token.
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
  
    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
      mkdir(dirname($credentialsPath), 0700, true);
    }
    file_put_contents($credentialsPath, json_encode($accessToken));
    printf("Credentials saved to %s\n", $credentialsPath);
  }
  $client->setAccessToken($accessToken);
  
  // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    $newAccessToken = $client->getAccessToken();
    $accessToken = array_merge($accessToken, $newAccessToken);
    file_put_contents($credentialsPath, json_encode($accessToken));
}
  return $client;
}
  
/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
  $homeDirectory = getenv('HOME');
  if (empty($homeDirectory)) {
    $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
  }
  return str_replace('~', realpath($homeDirectory), $path);
}
  
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);
 
/////////// ส่วนของการเพิ่ม Event
// ตัวแปรโครงสร้าง parameter สำหรับสร้าง event
$event_data = array(
    'summary' => $in_out, // หัวเรื่อง
    'location' => $location, // สถานที่
    'description' => 'ปฎิบัติหน้าที่ :'.'&nbsp;'. $request_for . '<br/>'.'ยานหาหนะ :'.'&nbsp;' . $license_name .'<br/>'.'พนักงานขับรถ :'.'&nbsp;' . $driver_name, // รายละเอียด
    'start' => array( // วันที่เวลาเริ่มต้น
      'dateTime' => $timeST,
      'timeZone' => 'Asia/Bangkok',
    ),
    'end' => array( // วันที่เวลาสิ้นสุด
      'dateTime' => $timeEND,
      'timeZone' => 'Asia/Bangkok',
    ),
    'recurrence' => array( // การทำซ้ำ
      'RRULE:FREQ=DAILY;COUNT=1'
    ),
    'attendees' => array( // ผู้เข้าร่วม อีเมล
      array('email' => $email),
    //   array('email' => 'sbrin@example.com'),
    ),
    'reminders' => array( // การแจ้งเตือน
      'useDefault' => FALSE,
      'overrides' => array(
        array('method' => 'email', 'minutes' => 24 * 60),
        array('method' => 'popup', 'minutes' => 60),
      ),
    ),
  );
  $event = new Google_Service_Calendar_Event($event_data); // สร้าง event object
   
  $calendarId = 'carrmuti@gmail.com'; // calendar หลัก
  $event = $service->events->insert($calendarId, $event); // ทำคำสั่งเพิ่มข้อมูล
  printf('Event created: %s', $event->htmlLink); // หากเพิ่มข้อมูลสำเร็จ จะได้ค่า ลิ้งค์

// echo "<br>";
// echo "<a href='calendar.php'>Back to Form</a>";
    echo "<script> alert('บันทึกสำเร็จ'); window.location = './line_notify.php';</script>";

?>
  
  </body>
</html>