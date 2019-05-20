<?php
include "db_config.php";
$id=$_GET['id'];
$key=base64_decode($_GET['key']);
$token=base64_decode($_GET['token']);
$data=mysql_query("SELECT * FROM placement WHERE SNO='$id' AND ENTRY_DATE='$token'");
if (mysql_num_rows($data)>0) {
	$value=mysql_fetch_array($data);
  $_SESSION['company_id']=$value['SNO'];
	?>

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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>SCSVMV</title>
	<script type="text/javascript">
	function updateTextInput (val) {
document.getElementById('textInput1').value=val;
	}
	function updateTextInput1 (val) {
document.getElementById('textInput2').value=val;
	}
 $(function ()
        {
            $('#txt').keyup(function (e){
                if(e.keyCode == 13){
                    var curr = getCaret(this);
                    var val = $(this).val();
                    var end = val.length;
                
                    $(this).val( val.substr(0, curr) + '<br>' + val.substr(curr, end));
                }
        
            })
        });

        function getCaret(el) { 
            if (el.selectionStart) { 
                return el.selectionStart; 
            }
            else if (document.selection) { 
                el.focus(); 

                var r = document.selection.createRange(); 
                if (r == null) { 
                    return 0; 
                } 

                var re = el.createTextRange(), 
                rc = re.duplicate(); 
                re.moveToBookmark(r.getBookmark()); 
                rc.setEndPoint('EndToStart', re); 

                return rc.text.length; 
            }  
            return 0; 
        }
  </script>
  <style type="text/css">
  .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}</style>
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
            <li><a href="Admindashboard.php">Dashboard</a></li>
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
            <li class="active"><a href="Overview.php">Overview<span class="sr-only">(current)</span></a></li>
            <li><a href="AddNewPlacementEvent.php">Add New Placement Event</a></li>
            <li><a href="Update.php">Update</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="jumbotron">

<form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" role="form">    
      <div class="form-group"> 
   
      <label for="ON CAMPUS" class="col-sm-3 control-label" >Company Name</label>       
	  <div class="col-sm-8">          
	  <input class="form-control" name="company_name" id="company_name" placeholder="Company Name" type="text" value="<?php echo $value['COMPANY_NAME'];?>" required="true">       
    </div>    
	  </div>    
	  <div class="form-group">       
	  <label for="JobDescription" class="col-sm-3 control-label">Job Description</label>       
	  <div class="col-sm-8">          
	  <input class="form-control" name="job_desc" class="form-control"id="job_desc"  type="text" placeholder="Job Description" value="<?php echo $value['JOB_DESCRIPTION'];?>" required="true">       
	  </div>
	  </div>
<div class="form-group">
  <div class="col-md-offset-3 col-md-3"> 
   <table class="table table-striped table-bordered">
     <tr><td>
        <label for="ON CAMPUS" class="control-label">ON CAMPUS&nbsp; </label>       
     
            <input class="checkbox-inline" type="radio" style="width:50px;" name="campus" class="form-control" value="0" <?php if($value['OFF_ON']==0){echo 'checked="true"'; }?> >
          </td></tr>
     <tr><td>
       <label for="OFF CAMPUS" class="control-label">OFF CAMPUS</label>
    
     
        <input class="checkbox-inline" type="radio" style="width:50px;"name="campus" class="form-control" value="1" <?php if($value['OFF_ON']==1){ echo 'checked="true"'; }?>  >
   
     </td></tr>
   </table>
   </div>
   </div>              

	  <fieldset>       
	  <div class="form-group">          
	  <label for="TenthMarks" class="col-sm-3 control-label">Min. Tenth Marks</label>          
	  <div class="col-sm-8">             
	  <input type="text" class="form-control" min="0" data-theme="c" max="100" name="10_percent" id="10_percent" placeholder="Minimum Tenth Marks" required="true" value="<?php echo $value['10_PERCENT'];?>"></div>       
	  </div>      
	  <div class="form-group"> 
      <label for="TenthMarks" class="col-sm-3 control-label">Min. Twelth Marks</label>       
	  <div class="col-sm-8">          
	  <input class="form-control" name="12_percent" id="12_percent" type="text" name="12_percent" id="12_percent" placeholder="Minimum Twelth Marks" required="true" value="<?php echo $value['12_PERCENT'];?>">       
	  </div>    
	  </div>
      <div class="form-group"> 
      <label for="arrearhistory" class="col-sm-3 control-label">Max. Arrear History</label>       
	  <div class="col-sm-8">          
	  <input class="form-control" name="arrear_count" id="arrear_count" type="text" placeholder="Maximum Arrear History count" required="true" value="<?php echo $value['ARREAR_COUNT'];?>">       
	  </div>    
	  </div>
      <div class="form-group"> 
      <label for="STANDINGARREARS" class="col-sm-3 control-label">Max. Standing Arrars</label>       
	  <div class="col-sm-8">          
	  <input name="standing_arrears" class="form-control"id="standing_arrears"type="text" placeholder="Maximum Standing Arrears count" required="true" value="<?php echo $value['STANDING_COUNT'];?>">       
	  </div>    
	  </div>	
      
	  </fieldset>    
	  <div class="form-group"> 
      <label for="Branches" class="col-sm-3 control-label">Branches</label><br>
	  <div class="vertical-align">
	  <?php
	   

		$selectedDept=explode(",",$value['DEPT']);
		
	

 $extract = mysql_query("SELECT * FROM dept ORDER BY ID ASC");
$deptCount=mysql_num_rows($extract);

$dept = array();

                while($result=mysql_fetch_array($extract))  {
$dept[] = $result['DEPT_CODE'];
?>

  
<label class="checkbox-inline"><input type="checkbox" name="checkBoxDept[]" value="<?php echo $result['ID'];?>" <?php for ($i=0; $i < $deptCount; $i++) {  	if (in_array($result['ID'],$selectedDept)) {echo 'checked="true"'; 	} } ?>/><?php echo $result['DEPT_CODE'];?>&nbsp;&nbsp;&nbsp;</label>
<?php
}?>

 	  </div>
	  </div>
	  <div class="form-group"> 
      <label for="Last Date" class="col-sm-3 control-label">Application Deadline</label>       
	  <div class="col-sm-8">          
	 <input type="date" name="deadline"class="form-control" id="deadline" value="<?php echo $value['DEADLINE'];?>">      	  
	  </div>   
	  </div>
	   <div class="form-group"> 
      <label for="Dateofrecruitment" class="col-sm-3 control-label">Date of Recruitment</label>       
    <div class="col-sm-8">          
    <input type="date" name="date" class="form-control" id="date" value="<?php echo $value['DATE'];?>">           
    </div>   
    </div>
     <div class="form-group"> 
      <label for="Selection Process" class="col-sm-3 control-label">Selection Process</label>       
    <div class="col-sm-8">          
   <div id="content">
        <textarea id="txt" name="selectionProcess" class="form-control" ><?php echo $value['SELECTION_PROCESS'];?></textarea>
    </div>         
    </div>   
    </div>
      <div class="form-group"> 
      <label for="Company Description" class="col-sm-3 control-label">Company Description</label>       
    <div class="col-sm-8">          
   <div id="content">
        <textarea id="txt" name="companyDescription" class="form-control"><?php echo $value['COMPANY_INFO'];?></textarea>
    </div>         
    </div>   
    </div>
    <div class="form-group"> 
      <label for="Company Logo" class="col-sm-3 control-label">Present Logo</label>       
    <div class="col-sm-8">          
   <img src="<?php if ($value['IMG']!=NULL){echo $value['IMG'];}else { echo "assets/img/default.png"; }?>" height="100px" width="120px"/>
    </div>
    </div>
     
    <div class="form-group"> 
      <label for="Company Logo" class="col-sm-3 control-label">Change Company Logo</label>       
    <div class="col-sm-8">          
    <span class="btn btn-danger  btn-file">
    Change <input type="file" class="form-control" name="photo" id="photo">  </span>         
    </div>
    </div>
     <div class="form-group"> 
    <label for="Company Logo" class="col-sm-3 control-label"></label>   
    <div class="col-sm-8">          
   <h3><label class="checkbox-inline"><input type="checkbox" name="makeEligible" value="Eligible" <?php if($value['CAN_APPLY']!=NULL){echo "checked=true";}?>/>Make Eligible students to apply</label></h3>
 </div>   
    </div>
	  <div class="col-sm-12">          
	  <center>
	  <input type="submit" class="btn btn-primary col-md-5" name="submit" id="submit" value="UPDATE"></center> 


	  <button class="btn btn-success col-md-offset-1 col-md-5" onclick="goBack()">Go Back</button>
		

<script>
function goBack() {
    window.history.back()
}
</script>  
	  </div>
	  
	  </div>
	  <div>
        </div>
      </form>
      </div>
    </div>
<?php
include 'db_config.php';


if(isset($_POST['submit'])&&isset($_SESSION['company_id']))
{
$id=$_SESSION['company_id'];
$company_name=$_POST['company_name'];
$job_desc=$_POST['job_desc'];
$campus=$_POST['campus'];
$t_percent=$_POST['10_percent'];
$tw_percent=$_POST['12_percent'];
$arrear_count=$_POST['arrear_count'];
$standing_arrears=$_POST['standing_arrears'];
$deptUpdate=$_POST['checkBoxDept'];
$date=$_POST['date'];
$deadline=$_POST['deadline'];
date_default_timezone_set('Asia/Kolkata');
$userdate = date('Y-m-d',time());
$status="1";
$selectionProcess=$_POST['selectionProcess'];
$companyDescription=$_POST['companyDescription'];

 
$makeEligible=$_POST['makeEligible'];
if ($makeEligible=="Eligible") {
$makeEligible=TRUE;
}else{
  $makeEligible=FALSE;
}

$query="UPDATE `placement` SET `COMPANY_NAME`='$company_name', `JOB_DESCRIPTION`='$job_desc', `OFF_ON`='$campus', `10_PERCENT`='$t_percent', `12_PERCENT`='$tw_percent', 
  `ARREAR_COUNT`='$arrear_count', `STANDING_COUNT`='$standing_arrears',`DEPT`='".implode(',',$deptUpdate)."',`DATE`='$date',`DEADLINE`='$deadline',`ENTRY_DATE`='$userdate',`COMPANY_INFO`='$companyDescription',`SELECTION_PROCESS`='$selectionProcess',`CAN_APPLY`=
'$makeEligible'";

$photo=$_FILES['photo']['name'];
if ($photo) {
$target="assets/img/";
$target=$target.basename($photo);
move_uploaded_file($_FILES['photo']['tmp_name'],$target);
 $query.=" ,`IMG`='$target' WHERE SNO='$id'";
}else
{
  $target=NULL;
   $query.= "WHERE SNO='$id'";
}

#$array = array("CSE", "ECE", "EEE", "CIVIL_SE", "EIE", "IT", "MECH", "BCA" );
#for ($i=0; $i <8 ; $i++) { 
# $reg=mysql_query("INSERT INTO `dept` (`DEPT_CODE`) VALUES ('$array[$i]')")or die(mysql_error());
#}
  
   
$reg=mysql_query($query)or die(mysql_error());

  if($reg)
  {
  
?>
<script type="text/javascript">
	alert("Drive Updated Successfully");
window.location="Admindashboard.php";
</script>
<?php
}
  else
  {
  ?>
<script type="text/javascript">
	alert("Some Error Occured.Please Contact Administator");
</script>
  <?php
  }
}

?>  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Dashboard Template for Bootstrap_files/jquery.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1422076482081">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1422076482081" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>
<?php
}
	
?>