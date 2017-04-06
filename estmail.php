<?php
// error_reporting(0);
include_once('Mail.php');
  

$subject = 'mhghghghjghghjg' ;
$body = "hello";
$usermail = 'shanky.rags@gmail.com';
  $from = "donotreply@cip.com";
  $headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

$mail=mail($to, $subject, $body, $headers);  
       
//$mail=mail($usermail,$subject,$body,"dhasf");
if($mail==true){
  echo"sucess!";
}
// else

?>
