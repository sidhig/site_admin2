<?php

session_start();
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}


$main_query= $conn->query("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE inducted_by IS NOT NULL AND inducted_by != '' AND project_id='".$_SESSION['admin']."' order by tbl_induction_register.id desc");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>



<head>
<header>
 <? include('header.php'); ?>
 <? include('test_side2.php') ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>

<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">


  <div id="container">
  
     <div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: 30vh 0 0 -200px;*/
    top: 24vh;
    left: 22vw;
    width: 65%">

        <div class="Form_name" style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#6495ED  ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2; background-color: #696969">APPROVED SITE INDUCTION FORMS 
      </div>
      
       <table  class="table table-hover" style= "border: 1px solid rgba(128, 128, 128, 0.57);"">
        <tr style="background-color: #696969; color: white">
            <th>Induction Number</th>
            <th>Employee Name</th>
            <th>Created Date</th>
            <th style="text-align: left;">Review</th>

        </tr>

         <tbody style="" id='user'>
              <?

              while($row=$main_query->fetch_object())
                {?>
              
              <tr style="background-color: #F0FFFF; font-size: 15px"> 
              
                <td><? $value= str_pad($row->id, 4, '0', STR_PAD_LEFT); echo $value; ?></td>
                <td><? echo $row->given_name ." ". $row->surname ?></td>
                <td><? echo $row-> created_date?></td>
                <td>
                  <form id="approved_form<?=$row->id?>" method="post" action="site_induction_approved.php" >
                  <input type="hidden"  name="approved_form" value="<?=$row->id?>" />
                  <input type="submit" class="btn btn-primary" class="button edit_click1" value="Review Form" style="cursor:pointer; width:80%" /> <br><br>
                   <!-- </form>
                    <form id="approved_form<?=$row->id?>" method="get" action="pdf_php/approved_forms_pdf.php" >
                    <input type="hidden"  name="approved_form" value="<?=$row->id?>" />
                  <input type="submit" class="btn btn-danger" class="button edit_click1" value="Generate PDF" style="cursor:pointer; width:80%" /> 
                </form>  --> 
                </td>
               
              </tr>

             <? } ?>
          </tbody> 
      </table>

   

      </div> <!-- wrapper close -->
     
        

</div><!--container close-->
  


</body>
<footer>
  <? include("footer.php"); ?>
<footer>