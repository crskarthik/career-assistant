<!DOCTYPE html>
<?php
include 'db_config.php';
?>
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
             <li><a href="notification.php" class="active">Notifications  &nbsp;&nbsp;&nbsp;
             <?php 
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
$rec_limit=10;
         $rec_count=$notifications_count;
if (isset($_GET['page'])) {
  $page=$_GET['page']+1;
  $offset=$rec_limit*$page;
}
else
{
  $page=0;
  $offset=0;
}
$left_rec=$rec_count-($page * $rec_limit);
?>
          <h1 class="page-header">Pending Approvals</h1>
         <ul class="pager">
         <?php 
         if($page>0)
         { $last=$page-2;
          ?>
          <li class="previous"><a href="notification.php?page=<?php echo $last;?> ">&larr;Previous</a></li>
           <?php 
           if($left_rec<=$rec_limit)
         {
          $last=$page-2;
        ?>
<li class="next disabled"><a href="#" disabled>Next&rarr;</a></li>
          
        <?php
        }else
        {?>
          <li class="next"><a href="notification.php?page=<?php echo $page;?>">Next&rarr;</a></li>
          <?php
        }
        }
        if($page==0&&$rec_count>10)
         {?>
       <li class="previous disabled"><a href="#" disabled>&larr;Previous</a></li>
          
        
          <li class="next"><a href="notification.php?page=<?php echo $page;?> ">Next&rarr;</a></li>
         <?php 
        }

echo "</ul>";


 $notifications_query = mysql_query("SELECT * FROM notification_admin ORDER BY ID ASC LIMIT $offset,$rec_limit ");

               if (mysql_num_rows($notifications_query) > 0) {
while($notifications=mysql_fetch_array($notifications_query))  {
  
  ?>

<div class="row">
<div class="panel panel-warning">
  <div class="panel-heading">
  <center> Request From <b><?php $regNo=$notifications['REGNO']; echo $regNo; ?></b></center>
  </div>
  <div class="panel-body">
  <b><?php echo $notifications['NOTIFICATION']; ?></b>
  </div>
  <div class="panel-footer">
<?php $token=base64_encode($notifications['TIME']);
$id=$notifications['ID'];
$ticket=base64_encode($regNo);
?>
<a href="requestProcess.php?id=<?php echo $id;?>&token=<?php echo $token;?>&request=<?php echo base64_encode("approve"); ?> "> <button class="btn btn-primary" onclick="return confirm('The Changes Will be done Permanently,Are You sure to make change?');"><span class="glyphicon glyphicon-ok"></span>&nbsp;Approve</button></a>
   <a href="requestProcess.php?id=<?php echo $id;?>&token=<?php echo $token;?>&request=<?php echo base64_encode("delete"); ?>&ticket=<?php echo $ticket;?> "><button class="btn btn-danger" onclick="return confirm('Are You Sure to delete the request?');"><span class="glyphicon glyphicon-remove"></span>&nbsp;Decline</button></a>
  
  </div>
  
</div>
</div>
<?php
}
}
 ?>        
        </div>
      </div>
    </div>
<script type="text/javascript">
  
  $(.'button').click(function() {
    $.ajax({
      type: "POST",
      url: "change.php",
      data: {name: "john"}
    }).done(function(msg)
{ alert("data modifies:" +msg);});
   });
   

</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Dashboard Template for Bootstrap_files/jquery.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1422076482081">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1422076482081" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>