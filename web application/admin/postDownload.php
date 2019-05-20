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
   <link href="assets/tableTools/css/jquery.dataTables.css" rel='stylesheet' type='text/css' />
<link href="assets/tableTools/css/dataTables.tableTools.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

<script src="assets/tableTools/js/jquery.js" type="text/javascript"></script>
<script src="assets/tableTools/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="assets/tableTools/js/dataTables.tableTools.js" type="text/javascript"></script>

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


<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('#datatables').DataTable( {
        dom: 'T<"clear">lfrtip',
        tableTools: {
            "sSwfPath": "assets/tableTools/swf/copy_csv_xls_pdf.swf"
        }
    } );
} );
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
         <legend>Upload New File</legend>
      <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" role="form">    
 <div class="form-group"> 
      <label for="download Name" class="col-sm-3 control-label"><h4>File Description:</h4></label>       
    <div class="col-sm-8">  
     <div id="content">        
  <input type="text" class="form-control" name="description">       
    </div> 
    </div>  
    </div>    
 <div class="form-group"> 
      <label for="Notifcation" class="col-sm-3 control-label"><h4>Choose File:</h4></label>       
    <div class="col-sm-8">          
   <div id="content">
       <span class="btn btn-danger  btn-file">
    <i class="fa fa-upload "></i>&nbsp;&nbsp;&nbsp;Upload  <input type="file" class="form-control" name="file" id="file">  </span>

    </div>         
    </div>   
    </div>
    <br/>
    <div class="col-md-offset-3 col-md-5">    
<button class="btn btn-block btn-primary" name="upload" value="submit"> Publish Download</button>
</div>
</form>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1422076482081">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1422076482081" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>
<?php
if (isset($_POST['upload'])&&$_POST['upload']=="submit") {
  
$file=$_FILES['file']['name'];
if ($file) {
$target="../downloads/";
$target=$target.basename($file);
move_uploaded_file($_FILES['file']['tmp_name'],$target);
$description=$_POST['description'];
$query="INSERT INTO downloads (NAME,SOURCE) VALUES('$description','$target')";
$status=mysql_query($query);
if ($status) {
  ?>
<script type="text/javascript">
  alert("File uploaded Succesfully!!");
</script>
  <?php
}
}else
{
 echo "Problem Occured";
}
}
?>