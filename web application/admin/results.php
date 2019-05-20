  
<!DOCTYPE html>

<!-- saved from url=(0045)http://getbootstrap.com/examples/dashboard/?# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <link rel="icon" href="../client/img/scsvmv.png">

    <title>SCSVMV APP</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">


 <link href="assets/tableTools/css/jquery.dataTables.css" rel='stylesheet' type='text/css' />
<link href="assets/tableTools/css/dataTables.tableTools.css" rel='stylesheet' type='text/css' />

<script src="assets/tableTools/js/jquery.js" type="text/javascript"></script>
<script src="assets/tableTools/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="assets/tableTools/js/dataTables.tableTools.js" type="text/javascript"></script>




<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('#datatables').DataTable( {
        dom: 'T<"clear">lfrtip',
        tableTools: {
            "sSwfPath": "assets/tableTools/swf/copy_csv_xls_pdf.swf"
        }
    } );
} );
</script>      
   
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
         <a class="navbar-brand" href="#">
        <img alt="Brand" src="../client/img/scsvmv.png" height="25px" width="25px">
      </a>

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Adminmain.php">SCSVMV</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="Admindashboard.php">Dashboard</a></li>
            <li><a href="Adminsettings.php">Settings</a></li>
            <li><a href="Adminprofile.php">Admin Profile</a></li>
            <li><a href="Adminhelp.php">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

     <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="Overview.php">Overview<span class="sr-only">(current)</span></a></li>
            <li><a href="AddNewPlacementEvent.php">Add New Placement Event</a></li>
<li><a href="notification.php">Notifications  &nbsp;&nbsp;&nbsp;
             <?php 
include('db_config.php');
             if ($notifications_count>=1) {
              
             ?>
             <span class="label label-success" id="Tag"><?php echo $notifications_count;
?></span>
             <?php 
           }
             ?>
             </a></li>
            <li><a href="Update.php">Update</a></li>
             <li><a href="search.php">Search</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      

        <!--  <div class="row placeholders">
  
           
            
   <?php 
if($_GET['key']!=null)
{
$key=base64_decode($_GET['key']);
}
?>
        
         
          </div>-->

          <h2 class="sub-header">Eligible Students for <?php echo $key;?> </h2>
<table id="datatables" class="dataTable table table-striped table-condensed table-hover">
<thead>
<tr> 
<th>  Name </th>
<th>Dept</th>
<th> Reg No.</th>
<th> Gender</th>
<th> Phone</th>
<th> Email</th>
<th>Status</th>
</tr></thead><tbody>	




<?php

$id=$_GET['id'];
if(isset($id)&&isset($key))
{

 include 'db_config.php';

	 $extract = mysql_query("SELECT * FROM placement WHERE SNO='$id' AND COMPANY_NAME='$key' ORDER BY SNO ASC");
$padding=0;
$value=$id;

               while($result=mysql_fetch_array($extract))  {
$e=0;
$ne=0;
 $extractDept = mysql_query("SELECT * FROM dept ORDER BY ID ASC");
$deptCount=mysql_num_rows($extractDept);

		$print=explode(",",$result["DEPT"]);
		$printCount=count($print);
	$deptNameListForPlacement=array();
		for ($i=0; $i < $printCount; $i++) { 
			
			$extractDeptName = mysql_query("SELECT * FROM dept WHERE ID = '$print[$i]'");
		 while($extractDeptNameArray=mysql_fetch_array($extractDeptName))  {
		 	$deptNameListForPlacement[$i] = $extractDeptNameArray['DEPT_CODE'];

		 }
			}
				
 				$check = mysql_query("SELECT * FROM ug ORDER BY SNO ASC");
	            while($student=mysql_fetch_array($check))  {
	            
	            	
	            if (in_array($student["SPECIALIZATION"], $deptNameListForPlacement)) {
				
	            	if ($student["10_PERCENT"]>=$result["10_PERCENT"]) {

	            		if ($student["12_PERCENT"]>=$result["12_PERCENT"]) {
	            			
	            			if ($student["ARREARS_HISTORY"]<=$result["ARREAR_COUNT"]) 
	   				 			{
	   				 				if ($student["STANDING_ARREARS"]<=$result["STANDING_COUNT"]) {
	   				 					$EB="true";
                                                                                $studentName=$student["NAME"];
                                                                                $studentDept=$student["SPECIALIZATION"];
                                                                                $studentRegNo=$student["REGNO"];
                                                                                $studentGender=$student["GENDER"];
                                                                                $studentEmail=$student["EMAIL"];
                                                                                $studentPhone=$student["PHONE"];
?> 
<!-- Print out the contents of each row into a table-->

<tr><td><?php echo $studentName; ?></td>
<td><?php echo $studentDept; ?></td>
<td><?php echo $studentRegNo; ?></td>
<td><?php echo $studentGender; ?></td>
<td><?php echo $studentPhone; ?></td>
<td><?php echo $studentEmail; ?></td>
<td><?php 
$applied=$result['APPLIED'];
        $tempApplied=explode(",", $result['APPLIED']);
        if (in_array($studentRegNo,$tempApplied)) {
          ?>
<span class="label label-success">Applied</span>
          <?php

        }?>
</td>
</tr>

<?php	   				 				
}
	            					else{
	            					$EB="false";
	            					}
	            				}
	            				else{
	            					$EB="false";
	            				}
	            	}
	            	else{
	            		$EB="false";
	            	}
	            	}
	            	else{
	            	$EB="false";
	            	}
	            }else
	            {
	            	$EB="false";
	            }
	            	
}
				?>


<?php

}




}
?>

  


</tbody>
</table>
</div>
<button class="col-md-offset-4 btn btn-success col-md-4" onclick="goBack()">Go Back</button>
		

<script>
function goBack() {
    window.history.back()
}
</script>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
   