<?
error_reporting(0);
session_start();
include_once('connect.php');

$get_project_name= $conn->query("select * from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();	
//echo $get_project_name;
$get_report= $conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date) from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id where today_date between '2017-02-27' and '2017-03-05'  group by today_date");

// echo "select * from tbl_employer where id='".$get_report->empid."'";
// echo "Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date) from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id  where today_date between '2017-02-27' and '2017-03-05' group by today_date";
$week_start= $_POST['start_date_week'];
$week_end= $_POST['end_date_week'];

if(isset($_POST['generate']))
{
//   $keys = array(1, 2, 3, 4);
// $a = array_fill_keys($keys, $_POST['comments']);
// print_r($a);
	// $Project=$query_emp['comments'];
 //  $id=$query_emp['id'];
 //   foreach ($id as $key => $Project) {
    
 //   }
}
?>
<header>
 <? include('header.php'); ?>
   <? include('test_side2.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>
<div class="container" 
<div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: -220px 0 0 -200px;*/
    margin-top: -25vh;
    top: 48vh;
    left:25vw;
    width: 60%;background-color: white;border-radius: 4px">
    <form id="contact" method="post" class="form" role="form" action="pdf_php/site_attendance_register_pdf.php">
  <div class="row">
  		<h4> <u>Project: <? echo $get_project_name->project_name ?></u></h4>
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <caption class="text-center">The Requested Site Attendance Report for the Week: &nbsp <?=$week_start." --TO-- ".$week_end?></caption>
          <thead>
            <tr>
              <th rowspan="2">Trade</th>
              <th rowspan="2">Employer/Business Name</th>

              <th colspan="7" style="text-align: center;">Number Of Workers on site</th>  
              	<th rowspan="2">Comments</th>
              </tr>
              	<tr>
              			<th>Mon</th>
        				<th>Tue</th>
        				<th>Wed</th>
        				<th>Thu</th>
        				<th>Fri</th>
        				<th>Sat</th>
                 		<th>Sun</th>
                         
        	
           
  			</tr>

          </thead>
          <tbody>
          <? $query_emp1=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '2017-02-27' and '2017-03-05' AND tbl_induction_register.empid='1') group by today_date,empid order by empid,today_date");
         $query_emp2=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '2017-02-27' and '2017-03-05' AND tbl_induction_register.empid='2') group by today_date,empid order by empid,today_date");
          $query_emp3=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '2017-02-27' and '2017-03-05' AND tbl_induction_register.empid='3') group by today_date,empid order by empid,today_date");

          		if($query_emp1->num_rows>0)
          		{
          			create_row($query_emp1,$week_start,$week_end); 
          		}
          		if($query_emp2->num_rows>0)
          		{
          			create_row($query_emp2,$week_start,$week_end); 
          		}
          		if($query_emp3->num_rows>0)
          		{
          			create_row($query_emp3,$week_start,$week_end); 
          		}


           ?>
          
           <!-- function Starts here -->
            <? function create_row($query_emp,$week_start,$week_end) 

			{
			 
          	$arr= array();
          	$arr2=array();
          		while($row1=mysqli_fetch_assoc($query_emp)){

          			//$day_emp1= $row1['dayname'];
                $day_emp1= $row1['dayname'];
          			$no_emp1= $row1['sum'];
                $tday=$row1['today_date'];
                echo $tday;
          			explode(" ",$day_emp1);
          			explode(" ",$no_emp1);
          			array_push($arr, $day_emp1);
          			array_push($arr2, $no_emp1);
					$emp1= $row1['company_name'];
          $trade= $row1['Tread'];
                    
          //echo $trade;
					$arr3 = array_combine($arr, $arr2);
          	}	
          	// print_r($arr);
          	// print_r($arr2);
          	// print_r($arr3);
          	$days = array("Monday"=>"0", "Tuesday"=>"0","Wednesday"=>"0", "Thursday"=>"0","Friday"=>"0","Saturday"=>"0","Sunday"=>"0");
          	// print_r($days);
          	 foreach($arr3 as $key => $value) {
		            $days[$key] = $value;
      			   }
			   
			    //print_r($days);
       
          	?>

            <tr>
            
              <td><? echo $emp1 ?></td>
              <td><? echo $trade ?></td>
              <?
              $week_date = new DateTime($week_start); 

              foreach($days as $number=>$num) {?>

              <td><a href="<?="site_attendance_approved.php?redirect=true&&tday=".$week_date->format('Y-m-d')."&"."e=".$emp1?>"><? echo $num; ?></a></td>
              
             <? 
                $week_date->modify('+1 day');
                
             } 

             ?>
           <td><?  echo "<input type='text' name='comments[]' placeholder='Enter Comments Here' value=''/>";
			
            ?></td>
            <td><?  echo "<input type='hidden' name='employer[]' id='employer' value='".$emp1."'/>";
      
            ?></td>
            </tr>
            <? } ?>
			
 <!-- function Ends here -->
          </tbody>
          
        </table>
        <input type="hidden" name="date_start" value="<?=$week_start?>">
        <input type="hidden" name="date_end" value="<?=$week_end?>">
      </div><!--end of .table-responsive-->
    </div>
  </div>
  
  
<div class="row">

<div class="col-xs-12 col-md-12 form-group">
<button class="btn btn-primary pull-right" name="generate" type="submit">Generate PDF</button>
</div>
</form>
	</div>

<script> function filter(number){ alert (number);} 



</script>


<style>
	
	h4 {
  text-align: left;
  margin:2vh;
  font-weight: bold;
}

table caption {
	padding: .5em 0;
}

@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}
</style>