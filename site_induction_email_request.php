<?php

session_start();
//error_reporting(0);
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
// else if(!isset($_SESSION['login_user_induction']))
// {
//  header("location:login_site_induction_form.php");
// }
else
{
  $user= $_SESSION['admin'];
}
if(isset($_POST['send']))
{
  $cur_date= strtotime(date('Y-m-d'));
  $cur_time= strtotime(date('H:i:s'));
  $sum= $cur_date+$cur_time;
  $reference=md5($sum);
  $email= $_POST['email'];
$insert_refrence= $conn->query("insert into tbl_refrence set 
                    project_id = '".$_SESSION['admin']."',
                    induction_id = '".$_SESSION['induction']."',
                    pin = '".$_SESSION['pin']."',
                    email= '".$email."',
                    refrence_no = '".$reference."' ON DUPLICATE KEY UPDATE refrence_no = '".$reference."'");

 // echo "insert into tbl_refrence set 
 //                    project_id = '".$_SESSION['admin']."',
 //                    induction_id = '".$_SESSION['induction']."',
 //                    pin = '".$_SESSION['pin']."',
 //                    email= '".$email."'
 //                    refrence_no = '".$reference."' ON DUPLICATE KEY UPDATE refrence_no ='".$reference."'";

   

    $emailSubject = 'test subject';
$sendTo = 'shanky.rags@gmail.com';

$body = <<<EOD
<br><hr><br>
First Name: Grace<br>
Email Address: my local email address<br>
Subject: test<br>
Message: This is test message.<br>
EOD;


$headers .= "Content-type: text/html
";
$success = mail($sendTo, $emailSubject, $body, $headers);

if($success) 
echo "Success";
                
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
 <script type="text/javascript" src=js/validation_site_induction.js></script>




<head>
<header>
 <? include('header.php'); ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>
</head>

<body>
	<div class="container">
			 <div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: -220px 0 0 -200px;*/
    margin-top: -25vh;
    top: 52vh;
    left:30vw;
    width: 60%;background-color: #AEB6BF   ;border-radius: 4px">

    		<div class="row">
    
    		<h1 class="text-center"> <span class="label label-default">Email Request</span></h1>
    
  			</div>
  			<form method="POST"> 
  			<div class="row">
    		<div class="col-sm-8 form-group" style="margin:10px" >
								<h4><span class="label label-info">Enter the Email ID</span></h4>
								
								<input type="email" id="email2" placeholder="Enter Email ID Here.." class="form-control" name="email" value="" required>
								
							</div>
    
  			</div>
  			<div class="row">
    
    	<!-- 	<h1 class="text-center"><a href="#myModal" role="button" class="btn btn-success btn-md" data-toggle="modal">Send New Induction Link</a></h1> -->
       <h1 class="text-center"> <button type="submit" class="btn btn-success" name="send">
    <i class="icon-circle-arrow-right icon-large"></i> Send New Induction Link
</button></h1>
    
  			</div>
  			</form>


</div> <!-- Wrapper Close -->
</div>  <!-- Conatiner Close -->


</body>


 
    
  