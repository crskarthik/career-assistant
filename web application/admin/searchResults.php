 <!DOCTYPE html>
<!-- saved from url=(0045)http://getbootstrap.com/examples/dashboard/?# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>SCSVMV APP</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
 <link href="assets/tableTools/css/jquery.dataTables.css" rel='stylesheet' type='text/css' />
<link href="assets/tableTools/css/dataTables.tableTools.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
             <li class="active"><a href="search.php">Search</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        
          <?php
if (isset($_POST['search'])&&$_POST['search']=='submit') {

include 'db_config.php';
$query="SELECT * FROM ";
if (isset($_POST['Degree'])) {
  $degree=$_POST['Degree'];
  $query.=$degree." WHERE ";
}
if (isset($_POST['Dept'])) {
$dept=$_POST['Dept'];
if ($dept!="all") {
 $query.="SPECIALIZATION = '".$dept."' ";
 $deptCompromise="0";
}
elseif ($dept="all") {
 $deptCompromise="1";
}
}

if (isset($_POST['batch'])) {
 
$admissionYear=$_POST['batch'];
if ($admissionYear!="all"&&$deptCompromise=="0") {
  
$query.="AND REGNO IN (SELECT REGNO FROM ug WHERE ADMISSION_YEAR = ".$admissionYear.")";
$queryCompromise="1";
}
elseif ($admissionYear!="all"&&$deptCompromise=="1") {
  
$query.="ADMISSION_YEAR = ".$admissionYear." ";
$queryCompromise="1";
}
elseif($admissionYear=="all"){

  $queryCompromise="0";
  

}
}

if (isset($_POST['cgpaMin'])&&$queryCompromise=="0"&&$deptCompromise=="1") {
  $cgpaMin=round($_POST['cgpaMin']);
 
   $query.="(CGPA_TILL BETWEEN ".$cgpaMin." AND ";
 }
 elseif (isset($_POST['cgpaMin'])&&$queryCompromise=="0"&&$deptCompromise=="0") {
  $cgpaMin=round($_POST['cgpaMin']);
  
   $query.="AND REGNO IN (SELECT REGNO FROM ug WHERE CGPA_TILL BETWEEN ".$cgpaMin." AND ";
}
elseif (isset($_POST['cgpaMin'])&&$queryCompromise=="1") {
  $cgpaMin=round($_POST['cgpaMin']);

      $query.="AND REGNO IN (SELECT REGNO FROM ug WHERE CGPA_TILL BETWEEN ".$cgpaMin." AND ";
}
if (isset($_POST['cgpaMax'])) {
  $cgpaMax=round($_POST['cgpaMax']);
  $query.=$cgpaMax.")";
}
if (isset($_POST['tenthMin'])) {
  $tenthMin=round($_POST['tenthMin']);
  $query.="AND REGNO IN(SELECT REGNO FROM ug WHERE 10_PERCENT BETWEEN ".$tenthMin." AND ";
}
if (isset($_POST['tenthMax'])) {
  $tenthMax=round($_POST['tenthMax']);
  $query.=$tenthMax.")";
}
if (isset($_POST['twelthMin'])) {
  $twelthMin=round($_POST['twelthMin']);
  $query.=" AND REGNO IN(SELECT REGNO FROM ug WHERE 12_PERCENT BETWEEN ".$twelthMin." AND ";
}
if (isset($_POST['twelthMax'])) {
  $twelthMax=round($_POST['twelthMax']);
  $query.=$twelthMax.")";
}
if (isset($_POST['backlogs'])) {
  $backlogs=round($_POST['backlogs']);
  $query.="AND REGNO IN (SELECT REGNO FROM ug WHERE ARREARS_HISTORY <= ".$backlogs.")";
}
if (isset($_POST['jobStatus'])) {
$jobStatus=$_POST['jobStatus'];
if ($jobStatus!="all") {
  if ($jobStatus=="placed") {
     $query.="AND REGNO IN (SELECT REGNO FROM ug WHERE PLACED = 1) ";
  }elseif ($jobStatus=="notPlaced") {
     $query.="AND REGNO IN (SELECT REGNO FROM ug WHERE PLACED != 1) ";
  }

 $deptCompromise="0";
}
elseif ($jobStatus="all") {
 $jobStatus="1";
}
}
$check=substr($query,-1);
  
  if ($check==',') {
    $query=rtrim($query,",");
  }
  $query.=";";
  
  $fetchQuery=mysql_query($query)or die(mysql_error());
?>
<h4>Search Results</h4>
<?php echo $query;?>
        <div class="alert alert-success">Searched for students of 
        <b><?php echo $degree; ?>
        from <?php if($deptCompromise=="0"){ echo $dept;}elseif ($deptCompromise=="1") {
        	echo "All Departments";
        }?> from <?php if($queryCompromise=="1"){ echo $admissionYear;}elseif ($queryCompromise=="0") {
        	echo "All Batches";
        }?> with CGPA from <?php echo $cgpaMin." - ".$cgpaMax;?> , 10<sup>th</sup> Percent from
        <?php echo $tenthMin." - ".$tenthMax;?> , 12<sup>th</sup> Percent from <?php echo $twelthMin." - ".$twelthMax;?>  and 
        Bearing Maximum <?php echo $backlogs;?> backlogs.</b>
        </div>
         <div class="table-responsive">
           <table id="datatables" class="dataTable table table-striped table-condensed table-hover">
<thead>
                <tr>
                  <th>Name</th>
                  <th>Reg no.</th>
                 <th>Department</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>CGPA</th>
                 <th>10th %</th>
                 <th>12th %</th>
                  <th>Arrear History</th>
                  <th>Standing Arrears</th>
                  <th>Job</th>
                  <th>Actions</th>
                </tr>
              </thead>
<tbody>
   
<?php
while ($fetch=mysql_fetch_array($fetchQuery)) {
  ?>

              
                <tr>
                  <td><?php echo $fetch['NAME'];?></td>
                  <td><?php echo $fetch['REGNO'];?></td>
          
                  <td><?php echo $fetch['SPECIALIZATION'];?></td>
                 <td><?php echo $fetch['EMAIL'];?></td>
                 <td><?php echo $fetch['PHONE'];?></td>
                 <td><?php echo $fetch['CGPA_TILL'];?></td>
                 <td><?php echo $fetch['10_PERCENT'];?></td>
                 <td><?php echo $fetch['12_PERCENT'];?></td>
                 <td><?php echo $fetch['ARREARS_HISTORY'];?></td>
                 <td><?php echo $fetch['STANDING_ARREARS'];?></td>
                 <td><?php  if ($fetch['PLACED']=='1'){
                         ?> <span class="label label-success"><i class="fa fa-check"></i></span><?php
                        }else{
                      ?>   <span class="label label-success"><i class="fa fa-times"></i></span><?php
                        }
                      ?></td>
<td>
<a href="#"><button class="btn btn-primary btn-xs" title="Edit User"><i class="fa fa-edit"></i></button></a>
<!--<a href="#" onclick="return confirm('Are you sure?');"><button class="btn btn-danger btn-xs" title="Delete User"><i class="fa fa-trash"></i></button></a>-->
</td>
                 
                 
                </tr>
          
            
  <?php

}
    ?>
              </tbody>
            </table>
          </div>
          <?php
}else{
	?>
<script type="text/javascript">
	window.location.href="search.php";
</script>
	<?php
}

?>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1422076482081">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1422076482081" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>

