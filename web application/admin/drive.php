
       
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
<link href='http://fonts.googleapis.com/css?family=Raleway:500,400' rel='stylesheet' type='text/css'>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
 <link rel="stylesheet" href="assets/morris/morris.css">
<script src="assets/morris/jquery.min.js"></script>
 <script src="assets/morris/raphael-min.js"></script>
 <script src="assets/morris/morris.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    .user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>
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
        <?php
if(isset($_GET['id'])&&base64_decode($_GET['key']))
{

 include 'db_config.php';
$companyName=base64_decode($_GET['key']);
$id=$_GET['id'];
$key=base64_encode($companyName);
$token=$_GET['token'];
 $editPlacement="editPlacement.php?id=".$id."&key=".$key."&token=".$token;
                         
	 $extract = mysql_query("SELECT * FROM placement WHERE SNO='$id' AND COMPANY_NAME='$companyName' ORDER BY SNO ASC");
$padding=0;
$value=$id;

               while($result=mysql_fetch_array($extract))  {
$e=0;
$ne=0;
$countApplied=0;
if ($result['APPLIED']) {
 $applied=explode(",", $result['APPLIED']);
             $countApplied=count($applied);
}
        

?>
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <legend><h2 style="font-family: 'Raleway', sans-serif; font-weight:500;"><center><?php echo $result['COMPANY_NAME'];?></center></h2></legend>
<?php
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
	            	if ($EB=="false") {
					$ne=$ne+1;
				}elseif ($EB="true") {
					$e=$e+1;
				}
				
}
				?>
 <div class="row">
 
 <div class="col-md-3">
<div class="thumbnail">
<legend><center><h4>Assessment Stats</h4></center></legend>
 <div id="donutchart<?php echo $id; ?>"></div>
 

<script type="text/javascript">
  Morris.Donut({
  element: 'donutchart<?php echo $id; ?>',
  data: [
    {label: "Eligible", value: <?php echo $e;?>},

    {label: "Not-Eligible", value: <?php echo $ne;?>},
    {label: "Eligible & Applied", value: <?php echo $countApplied;?>},
  ],
  resize:'true',
  colors: ['#00a65a', '#3c8dbc']


});
  
    </script> 



<?php

}




}
$pathResults="results.php?id=".$_GET['id']."&key=".$_GET['key'];
$appliedResults="appliedList.php?id=".$_GET['id']."&key=".$_GET['key'];
?>

        <div class="caption">
        <hr>
     <h4 style="font-family: 'Raleway', sans-serif; font-weight:500;"><a href="<?php echo $pathResults;?>">Eligible Candidates List</a></h4>
      <h4 style="font-family: 'Raleway', sans-serif; font-weight:500;"><a href="<?php echo $appliedResults;?>">Applied Candidates List</a></h4>

 </div>
 </div>
</div>
      <div class="col-md-9">

      	<?php 
      	 $extract = mysql_query("SELECT * FROM placement WHERE SNO='$id' ORDER BY SNO ASC");

               while($result=mysql_fetch_array($extract))  {
               	?>
               	
                <div class="col-md-6">
                <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Job Desciption:</td>
                        <td><?php echo $result['JOB_DESCRIPTION'];?></td>
                      </tr>
                      <tr>
                        <td>Venue:</td>
                        <td><?php 
                        if($result['OFF_ON']=='0')
                          { 
                            echo "On Campus";
                          }
                          elseif ($result['OFF_ON']=='1') {
                            echo "Off Campus";
                          }
                          ?>

                          </td>
                      </tr>
                      <tr>
                        <td>Salary:</td>
                        <td><?php 
                        if($result['SALARY']==NULL)
                          { 
                            echo "No Data Available";
                          }
                          elseif ($result['SALARY']!=NULL) {
                            echo $result['SALARY'];
                          }
                          ?></td>
                      </tr>
          <?php         
        $rawdate=strtotime($result["DATE"]);
        $date=date("d-M-Y",$rawdate);
              $rawdead=strtotime($result["DEADLINE"]);
        $dead=date("d-M-Y",$rawdead);
        $rawentry=strtotime($result["ENTRY_DATE"]);
        $entry=date("d-M-Y",$rawentry);
        $entry=strtotime($entry);
        date_default_timezone_set('Asia/Kolkata');
               ?>          
                      <tr>
                        <td>Last Date for Applying</td>
                        <td><?php echo $dead;?></td>
                      </tr>
                      <tr>
                        <td>Date of Interview:</td>
                        <td><?php echo $date;?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php if($result['EMAIL']==NULL)
                          { 
                            $email="No Data Available";
                            echo $email;
                          }
                          elseif ($result['EMAIL']!=NULL) {
                            $email=$result['EMAIL'];
                            echo '<a href="mailto:'.$email.'">'.$email.'</a';
                          }?></td>
                      </tr>
                        <td>Phone Number</td>
                        <td><?php if($result['PHONE_NUMBER']==NULL)
                          { 
                            $phone="No Data Available";
                            echo $phone;
                          }
                          elseif ($result['PHONE_NUMBER']!=NULL) {
                            $phone=$result['PHONE_NUMBER'];
                            echo '<a href="tel:'.$phone.'">'.$phone.'</a';
                          }?></td>
                      </tr>
                     
                    </tbody>
                  </table>
                  </div>
                  <div class="col-md-offset-1 col-md-4">
                     <center><img src="<?php if ($result['IMG']!=NULL){echo $result['IMG'];}else {
                       echo "assets/img/default.png";
                     }?>" height="200px" width="250px"/></center>
                  </div>
                 

                  <div class="col-lg-12">
                    <legend>Company info</legend>
                    <?php if($result['COMPANY_INFO']==NULL)
                    { echo "No Data Available";
                      }
                      else
                        {
                          echo $result['COMPANY_INFO'];
                          }
                          ?>
                  </div>
</div>
<div class="col-md-12">
<div class="col-md-6">
  <legend>Selection Process:</legend>
  <?php echo $result['SELECTION_PROCESS'];?>
</div>
 </div>
           
                  <div class="col-md-12">
                  <br/>
                 <div class="col-md-5">
                  
                    <legend style="font-family: 'Raleway', sans-serif; font-weight:500;">Selection Criteria:</legend>
                    </center>
                    </td></tr>
                    <tr>
                    <form class="form-horizontal">
<fieldset>
    <div class="form-group">
            <label class="col-md-7 control-label" for="radios">Minimum 10<sup>th</sup> Percent :</label>
            <div class="col-md-4"> 
            <label class="radio-inline" for="radios-1">
              <b><?php echo $result['10_PERCENT'];?>%</b>
            </label>   
            </div>
          </div>
<div class="form-group">
            <label class="col-md-7 control-label" for="radios">Minimum 12<sup>th</sup> Percent :</label>
            <div class="col-md-4"> 
            <label class="radio-inline" for="radios-1">
              <b> <?php echo $result['12_PERCENT'];?>%</b>
            </label>   
            </div>
          </div>
<div class="form-group">
            <label class="col-md-7 control-label" for="radios">Maximum Backlogs :</label>
            <div class="col-md-4"> 
            <label class="radio-inline" for="radios-1">
              <b><?php echo $result['ARREAR_COUNT'];?></b>
            </label>   
            </div>
          </div>
<div class="form-group">
            <label class="col-md-7 control-label" for="radios">Maximum Standing Arrears :</label>
            <div class="col-md-4"> 
            <label class="radio-inline" for="radios-1">
              <b><?php echo $result['STANDING_COUNT'];?></b>
            </label>   
            </div>
          </div>
</fieldset>
</form>
 
</div>
                  </div>
<div class="col-md-4">
<a href="<?php  echo $editPlacement;?>">
<button class="btn btn-warning btn-lg btn-block">Edit Drive</button>
</a>
</div>   
<div class="col-md-4">
<a href="notifyStudent.php">
<button class="btn btn-danger btn-lg btn-block">Notify </button>
</a>
</div>
<div class="col-md-4">
<a href="postResults.php?id=<?php  echo $id."&key=".$key;  ?>">
<button class="btn btn-info btn-lg btn-block">Upload Results </button>
</a>
</div>  
   
               <?php
           }
               	?>
      </div> 
      
      </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="./Dashboard Template for Bootstrap_files/jquery.min.js"></script>
     <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1422076482081">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1422076482081" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>