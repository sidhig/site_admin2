<?php
// error_reporting(0);
// include_once('Mail.php');
  
// $usermail = 'shanky.rags@gmail.com';
//   $from = "sidhiagra@gmail.com";
    
// $subject = 'mhghghghjghghjg' ;
// $body = "hello";

//         $host = "ssl://smtp.gmail.com";
//         $port = "465";
//         $username =  "sidhiagra@gmail.com"; //<> give errors
//         $password = "bhabhi@123g";

//         $headers = array ('From' => $from,
//           'To' => $usermail,
//           'Subject' => $subject);
//         $smtp = @Mail::factory('smtp',
//           array ('host' => $host,
//             'port' => $port,
//             'auth' => true,
//             'username' => $username,
//             'password' => $password));
//        $mail = $smtp->send($usermail, $headers, $body);
 
//    if (@PEAR::isError($mail)) {
//           echo ("<p>" . $mail->getMessage() . "</p>");
//          } else {
//          echo ("<p>Message successfully sent!</p>");
//          }



?>
<?php
require_once "Mail.php";

$from = "Sandra Sender <sidhiagra@gmail.com>";
$to = "sidhi.g@aviktechnosoft.com";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = "noreply.volts@gmail.com";
$password = "saurabhlew";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>