<?php


session_start();
error_reporting(0);
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else

{
	$user= $_SESSION['admin'];
}


if(isset($_POST['save']))
{
	$visitor_business= $_POST['visitor_business_name'];
  $v_name_1=$_POST['visit_name_1'].",".$_POST['visit_phone_1']."#".$_POST['visit_name_2'].",".$_POST['visit_phone_2']."#".$_POST['visit_name_3'].",".$_POST['visit_phone_3']."#".$_POST['visit_name_4'].",".$_POST['visit_phone_4'];
 
        // if($_POST['visit_name_2'] != "" || $_POST['visit_name_3']!="")
        // {
        //  $replace=str_replace("#,#","#",$v_name_1);
        // $visitor=rtrim($replace,"#,#,");
        // }
        // else{
        // $replace=str_replace("#,#,#","#",$v_name_1);
        // $visitor= rtrim($replace,"#,#,");
        // }


    $visit_reason =$_POST['visit_reason'];
    $time_in=$_POST['time_in'];
     $induction_no=ltrim($_POST['induction_no'],"0");

    $emp_name= $_POST['emp_name'];
    $emp_trade=$_POST['emp_trade'];

    $visitor_insert = $conn->query("insert into tbl_visitor_induction set 
                    induction_no = '".$induction_no."',
                     position= '".$emp_trade."',
                    today_date = CURDATE(),
                    
                    visitor_business = '".$visitor_business."',
                    visitor_name = '".$v_name_1."',
                    visit_reason = '".$visit_reason."',
                    visit_in = '".$time_in."',
                    visit_out = '',  
                    created=now(),
                    updated=now()");
    
    if($visitor_insert)
{
  
  ?>
     <script>
          
                  alert("You Have Successfully Visitor Details");
                  window.location.href='header.php';
      </script>
 
<?
    }
}
 
 // $id= $_POST['visitor_form'];
 $get_query=$conn->query("select tbl_employee.id, tbl_employee.given_name ,tbl_employee.surname   ,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name,tbl_employer.tread,tbl_employee.occupation,tbl_induction_register.empid FROM tbl_employee JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid WHERE tbl_employee.id ='".$_SESSION['induction']."' AND tbl_employee.pin ='".$_SESSION['pin']."'")->fetch_object();




// $visitior_db= $get_query->visitor_name;
// $myArray = explode('#', $visitior_db);

// $thirdArray = array();

// foreach ($myArray as $key => $value) {
//       $secondaryArray = explode(',', $value);
//       foreach($secondaryArray as $val)
//       {
//       array_push($thirdArray, $val);
//       }
//     }



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<head>
<header>
 <? include('header.php'); ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">



</header>


<div class="Main_Form" style="float: left; background-color: white; width: auto; border: solid 1px black; border-radius: 10px; margin-left: 12%;">
	
 <center>

<div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>BLANK VISITOR INDUCTION FORM</legend>

<div class="form-group">
   <label class="col-md-4 control-label" style="text-align: left;color: #E74C3C"><u>SITE VISITOR DETAIL</u></label> 
  
</div>

<!-- Text input-->
<div class="form-group"> 
  <label class="col-md-4 control-label">Date</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      
  <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" name="date_today" value=" <? echo date('d-m-y') ?>" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Visitor/Business Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input  placeholder="Visitor/Business Name" class="form-control"  type="text" value="" name="visitor_business_name" required>
    </div>
  </div>
</div>

 <div class="form-group">
  <label class="col-md-4 control-label">Visitor</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  placeholder="Visitor Name #1" class="form-control" name="visit_name_1"  type="text" value="" required>
    </div>
  </div>
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  <input  placeholder="Visitor Phone #1" class="form-control" name="visit_phone_1"  type="text" value="" required>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Visitor</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  placeholder="Visitor Name #2" class="form-control" name="visit_name_2" type="text" value="" >
    </div>
  </div>
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  <input  placeholder="Visitor Phone #2" class="form-control" name="visit_phone_2" type="text" value="">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Visitor</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  placeholder="Visitor Name #3" class="form-control" name="visit_name_3" type="text" value="" >
    </div>
  </div>
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  <input  placeholder="Visitor Phone #3" class="form-control" name="visit_phone_3"   type="text" value="" >
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Visitor</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  placeholder="Visitor Name #4" class="form-control" name="visit_name_4" type="text" value="" >
    </div>
  </div>
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  <input  placeholder="Visitor Phone #4" class="form-control" name="visit_phone_4"  type="text" value="">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Reason For Visit</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
  <input placeholder="Visit Reason" class="form-control" name="visit_reason"  type="text" value="" required>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Time In</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input  placeholder="Time IN" class="form-control" name="time_in" type="text" value="<? echo date("H:i"); ?>" readonly>
    </div>
  </div>
</div>
<!-- <div class="form-group">
  <label class="col-md-4 control-label" >Time Out</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input name="last_name" placeholder="Time Out" class="form-control"  type="text" value="<?  ?>" readonly>
    </div>
  </div>
</div> -->

<div class="form-group">
   <label class="col-md-4 control-label" style="text-align: left;color: #E74C3C"><u>INDUCTED PERSON</u></label> 
  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" style="">Induction No.</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
  <input  placeholder="Induction Number" class="form-control"  type="text" name="induction_no" value="<? $value= str_pad($get_query->id, 4, '0', STR_PAD_LEFT); echo $value; ?>" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Employer/Business Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input name="emp_name" placeholder="Employer Name" class="form-control"   type="text" value="<? echo $get_query->company_name; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->



<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Subcontractor Name</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->given_name; ?>" readonly>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Mobile No. #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<? echo $get_query->contact_phone; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Trade</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
  <input  placeholder="Trade" class="form-control" type="text" name="emp_trade" value="<? echo $get_query->tread ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Email Address</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="city" placeholder="Enail Address" class="form-control"  type="text" value="<? echo $get_query->email_add?>" readonly>
    </div>
  </div>
</div>

<!-- Select Basic -->
   

<!-- Text input-->

<div class="form-group"> 
  <label class="col-md-4 control-label">Date</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      
  <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo date("d-m-y"); ?>" readonly>
    </div>
  </div>
</div>
<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" class="btn btn-success" value="Submit" name="save"> <span class="glyphicon glyphicon-share-alt"></span></input>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->



</center>        
</div> 
 
  <style> 
 input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input[type="number"] {
    -moz-appearance: textfield;
}

input[type="date"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    margin: 0;
}


</style>

<footer>
  <? include("footer.php"); ?>
<footer>

	    				
          
					
							
						        
					



	    					