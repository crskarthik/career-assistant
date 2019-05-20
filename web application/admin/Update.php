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
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

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
            <li class="active"><a href="Update.php">Updates</a></li>
             <li><a href="search.php">Search</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <legend>Latest Notifications Published<a href="notifyStudent.php"><button class="btn btn-danger pull-right"><i class="fa fa-plus"></i> Post New</button></a>
           &nbsp;&nbsp;<a href="postDownload.php"><button class="btn btn-success pull-right"><i class="fa fa-upload"></i> Upload File</button></a><br/><br/></legend>
           <?php
           include 'db_config.php'; 
error_reporting(E_ALL^E_NOTICE);
 
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
          
         <ul class="pager">
         <?php 
         if($page>0)
         { $last=$page-2;
          ?>
          <li class="previous"><a href="Update.php?page=<?php echo $last;?> ">&larr;Previous</a></li>
           <?php 
           if($left_rec<=$rec_limit)
         {
          $last=$page-2;
        ?>
<li class="next disabled"><a href="#" disabled>Next&rarr;</a></li>
          
        <?php
        }else
        {?>
          <li class="next"><a href="Update.php?page=<?php echo $page;?>">Next&rarr;</a></li>
          <?php
        }
        }
        if($page==0&&$rec_count>10)
         {?>
       <li class="previous disabled"><a href="#" disabled>&larr;Previous</a></li>
          
        
          <li class="next"><a href="Update.php?page=<?php echo $page;?> ">Next&rarr;</a></li>
         <?php 
        }

echo "</ul>";

         $extract = mysql_query("SELECT * FROM notification_client  ORDER BY ID DESC LIMIT $offset,$rec_limit ")or die(mysql_error());

               
               while($result=mysql_fetch_array($extract))  {

             if ($result['REGNO']==NULL) {


              ?>
              <div class="row">
<div class="panel panel-warning">
  <div class="panel-heading">
<center><?php echo $result["ABOUT"]; ?>
</center>
</div>
<div class="panel panel-body">
 <?php echo $result['NOTIFICATION'];?>
</div>
<div class="panel panel-footer">
  <?php 
  $token=base64_encode($result['TIME']);
$id=base64_encode($result['ID']);

?>
  <a href="update.php?id=<?php echo $id;?>&token=<?php echo $token;?>&request=<?php echo base64_encode("delete"); ?> "><button class="btn btn-danger" onclick="return confirm('Are You Sure to delete the request?');"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</button></a>
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
<?php
if(isset($_GET['id'])&&isset($_GET['token'])&&isset($_GET['request']))
{
  
  $request=base64_decode($_GET['request']);
  $id=base64_decode($_GET['id']);
  $time=base64_decode($_GET['token']);
  if ($request=="delete") {
    
 $query=mysql_query("DELETE FROM notification_client WHERE ID='$id' AND TIME='$time'");
 if ($query&&isset($_GET['url'])) {
    $url=base64_decode($_GET['url']);
     ?>
  <script type="text/javascript">
  window.location="<?php echo $url; ?>"</script>
  <?php
  }
 elseif($query)
 {
  ?>
  <script type="text/javascript">
  window.location="Update.php"</script>
  <?php
 }
}
}