<!DOCTYPE html>
<?php include 'db_config.php';?>
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
    <style type="text/css">
.borderless th, .borderless td { 
     border-top: none !important; 
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
      

        <?php 
    
       $token=md5("visitStudent");
        if ($_GET['token']==$token&&isset($_GET['id'])) {
         $id=base64_decode($_GET['id']);
        
         $extract = mysql_query("SELECT * FROM ug WHERE REGNO='$id' ORDER BY SNO ASC");

               while($result=mysql_fetch_array($extract))  {
                ?>
                
             
                <div class="panel panel-warning">
  <div class="panel-body">
  <div class="row">
  <div class="col-md-3">
  <br/><br/><br/>
  <img src="assets/img/default_profile.jpg" width="220px" height="250px"> </div>
  <div class="col-md-7">
                <table class="table borderless">
                    <tbody>
                      <tr>
                        <td><label>Name</label></td>
                        <td><?php echo $result['NAME'];?></td>
                      </tr>
                       <tr>
                        <td><label>Registration Number</label></td>
                        <td><?php echo $result['REGNO'];?></td>
                      </tr>
                      <tr>
                        <td><label>Father Name</label></td>
                        <td><?php 
                      echo $result['FATHER_NAME'];
                          ?>

                          </td>
                      </tr>
                       <tr>
                        <td><label>Mother Name</label></td>
                        <td><?php 
                      echo $result['MOTHER_NAME'];
                          ?>
                          </td>
                      </tr>
                  
                     <tr>
                        <td><label>Course</label></td>
                        <td><?php 
                      echo $result['COURSE'];
                          ?>

                          </td>
                      </tr>
                      <tr>
                        <td><label>Specialization</label></td>
                        <td><?php 
                      echo $result['SPECIALIZATION'];
                          ?>

                          </td>
                      </tr>
                      <tr>
                        <td><label>Email</label></td>
                        <td><?php  echo $result['EMAIL'];
                      ?></td>
                      </tr>
                        <tr>
                        <td><label>Phone Number</label></td>
                        <td><?php  echo $result['PHONE'];
                      ?></td>
                      </tr>
                       <tr>
                        <td><label>Placed Status</label></td>
                        <td><?php  if ($result['PLACED']=='1'){
                          echo "Placed";
                        }else{
                          echo "Not Placed";
                        }
                      ?></td>
                      </tr>
                       <tr>
                        <td><label>Placed Company</label></td>
                        <td><?php  if ($result['PLACED']=='1'){
                          echo $result['PLACED_COMPANY'];
                        }else{
                          echo "Not Available";
                        }
                      ?></td>
                      </tr>
                    </tbody>
                  </table>
</div>


          <table id="datatables" class="dataTable table table-striped table-condensed table-hover">
    <tr><th>Degree</th>
                   
                    <th>School/University</th>
                    <th>Board</th>
                    <th>Stream</th>
                    <th>Passing Year</th>
                    <th>Percent/Marks</th>
                    </tr>
                     <tr>
                      <td>&nbsp;&nbsp;&nbsp;XII</td>
                      <td><?php echo $result['12_SCHOOL_NAME'];?></td>
                      <td><?php echo $result['12_BOARD'];?></td>
                      <td><?php echo $result['12_STREAM'];?></td>
                      <td><?php echo $result['12_YOP'];?></td>
                      <td><?php echo $result['12_PERCENT'];?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;X</td>
                      <td><?php echo $result['10_SCHOOL_NAME'];?></td>
                      <td><?php echo $result['10_BOARD'];?></td>
                      <td>N/A</td>
                      <td><?php echo $result['10_YOP'];?></td>
                      <td><?php echo $result['10_PERCENT'];?></td>
                    </tr>
                   
                  </table>
                  <br/>
  <table class="table table-striped table-condensed table-hover table-bordered">
  <th colspan="4"><center>CGPA</center></th>
                    <tr>
                    <th rowspan="2"><center>Semister 1&2</center></th>
                      <td rowspan="2">
                        <?php echo $result['CGPA_SEM_1_2'];?>
                      </td>
                       <th><center>Semister 5</center></th>
                      <td>
                        <?php echo $result['CGPA_SEM_5'];?>
                      </td>
                    </tr>
                     <tr>
                    
                       <th><center>Semister 6</center></th>
                      <td>
                        <?php echo $result['CGPA_SEM_6'];?>
                      </td>
                    </tr>
                     <tr>
                    <th><center>Semister 3</center></th>
                    <td>
                        <?php echo $result['CGPA_SEM_3'];?>
                      </td>
                    <th><center>Semister 7</center></th>
                      <td>
                        <?php echo $result['CGPA_SEM_7'];?>
                      </td>
                    </tr>
                     <tr>
                    <th><center>Semister 4</center></th>
                    <td>
                        <?php echo $result['CGPA_SEM_4'];?>
                      </td>
                    <th><center>Semister 8</center></th>
                      <td>
                        <?php echo $result['CGPA_SEM_8'];?>
                      </td>
                    </tr>
                    <tr><th colspan="2"><center>Total CGPA</center></th>
                    <td colspan="2"><?php echo $result['CGPA_TILL'];?></td>
                    </tr>
                  </table>
                
                  </div>   
      </div>
      <div class="panel-footer">
      
      <a href="editStudentProfile.php?id=<?php echo base64_encode($result['REGNO']);?>&token=<?php echo md5("editStudent");?>">
<button class="btn btn-success btn-block" title="Edit User"><i class="fa fa-edit"></i> Edit</button></a>
      </div>
<?php 
                         }}?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1422076482081">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1422076482081" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>