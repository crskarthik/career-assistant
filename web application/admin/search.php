
<!DOCTYPE html>
<!-- saved from url=(0045)http://getbootstrap.com/examples/dashboard/?# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="http://getbootstrap.com/favicon.ico">-->
<script src="assets/js/jquery.js"></script>

<!-- The noUiSlider script and stylesheet -->
<!-- Use the files with *.min.* for the minified versions. -->
<link href="assets/css/jquery.nouislider.min.css" rel="stylesheet">

<!-- Use the 'all' version to get all documented features. -->
<!-- Includes wNumb, libLink and the pips add-on -->
<script src="assets/js/jquery.nouislider.all.min.js"></script>
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
            <li><a href="Update.php">Update</a></li>
             <li class="active"><a href="search.php"> <i class="fa fa-filter"></i> Search</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-20 col-md-offset-2 main">
                 <form class="form-horizontal" id="searchForm"method="post" action="searchResults.php">
<fieldset>

<!-- Form Name -->
<h4><i class="fa fa-3x">S</i><i class="fa fa-lg">earch</i><i class="fa fa-filter fa-3x" style="color:#3c8dbc"></i></h4>
<div class="dividerHeading">
                  <h4><span>College Filter</span></h4>
                </div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Degree">Degree</label>
  <div class="col-md-5">
    <select id="Degree" name="Degree" class="form-control">
      <option value="ug">UG</option>
      <option value="pg">PG</option>
    </select>
  </div>
</div>
<!-- Select Basic -->
<!--<div class="form-group">
  <label class="col-md-4 control-label" for="Degree">Degree</label>
  <div class="col-md-5">
     <div class="button-group">
        <button type="button" class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown">Select Branch<span class="caret"></span></button>
<ul class="dropdown-menu">
  <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox"/>&nbsp;Option 1</a></li>
</ul>
  </div>
   </div>
</div>-->
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Dept">Branch</label>
  <div class="col-md-5">
  <select id="Dept" name="Dept" class="form-control">
  <option value="all" selected="true">All Branches</option>
   <?php
include 'db_config.php';
 $extract = mysql_query("SELECT * FROM dept ORDER BY ID ASC");
$deptCount=mysql_num_rows($extract);

$dept = array();
?>

<?php
                while($result=mysql_fetch_array($extract))  {
$dept[] = $result['DEPT_CODE'];
?>
<option name="listDept[]" value="<?php echo $result['DEPT_CODE'];?>" ><?php echo $result['DEPT_CODE'];?>&nbsp;&nbsp;&nbsp;</option>
<?php
}?>
     </select>
  </div>
</div>
<br/>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="batch">Batch</label>
  <div class="col-md-5">
    <select id="batch" name="batch" class="form-control">
    <option value="all" selected="true">All Batches</option>
     <?php

 $batchQuery = mysql_query("SELECT DISTINCT ADMISSION_YEAR FROM ug ");

                while($resultBatch=mysql_fetch_array($batchQuery))  {

?>
<option value="<?php echo $resultBatch['ADMISSION_YEAR'];?>"><?php echo $resultBatch['ADMISSION_YEAR'];?>&nbsp;&nbsp;&nbsp;</option>
<?php
}?>
    
    </select>
  </div>
</div>
<br/>
<br/>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cgpa">CGPA</label>
  <div class="col-md-5">
   <div id="slider-cgpa"></div>
  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Range">Range</label>  
  <div class="col-md-2">
   <input id="slider-cgpa-value-lower"  name="cgpaMin" type="text" placeholder="Minimum" class="form-control input-md"/>
 
  </div>

  <div class="col-md-2">
  <input id="slider-cgpa-value-upper"  name="cgpaMax" type="text" placeholder="Maximum" class="form-control input-md"/>
  
 </div>


<script type="text/javascript">
    $("#slider-cgpa").noUiSlider({
  start: [0, 10],
  step: 1,
  connect: true,
  range: {
    'min': 0,
    'max': 10
  }
});
   
   
$('#slider-cgpa').Link('lower').to($('#slider-cgpa-value-lower'));
$("#slider-cgpa").Link('lower').to('-inline-<div class="tooltip1"></div>', function ( value ) {

  // The tooltip HTML is 'this', so additional
  // markup can be inserted here.
  $(this).html(
    '<strong>Value: </strong>' +
    '<span>' + value + '</span>'
  );
});
$('#slider-cgpa').Link('upper').to($('#slider-cgpa-value-upper'));
$("#slider-cgpa").Link('upper').to('-inline-<div class="tooltip1"></div>', function ( value ) {

  // The tooltip HTML is 'this', so additional
  // markup can be inserted here.
  $(this).html(
    '<strong>Value: </strong>' +
    '<span>' + value + '</span>'
  );
});

    </script> 

</div>
<br>

<div class="dividerHeading">
  <h4><span>Advanced Filter</span></h4>
</div>
<br/>
<br/>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tenth">10<sup>th</sup> Percent</label>
  <div class="col-md-5">
   <div id="slider-tenth"></div>
  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Range">Range</label>  
  <div class="col-md-2">
   <input id="slider-tenth-value-lower" name="tenthMin" type="text" placeholder="Minimum" class="form-control input-md"/>
 
  </div>

  <div class="col-md-2">
  <input id="slider-tenth-value-upper" name="tenthMax" type="text" placeholder="Maximum" class="form-control input-md"/>
  
 </div>


<script type="text/javascript">
    $("#slider-tenth").noUiSlider({
  start: [0, 100],
  step: 1,
  connect: true,
  range: {
    'min': 0,
    'max': 100
  }
});
   
   
$('#slider-tenth').Link('lower').to($('#slider-tenth-value-lower'));
$("#slider-tenth").Link('lower').to('-inline-<div class="tooltip1"></div>', function ( value ) {

  // The tooltip HTML is 'this', so additional
  // markup can be inserted here.
  $(this).html(
    '<strong>Value: </strong>' +
    '<span>' + value + '</span>'
  );
});
$('#slider-tenth').Link('upper').to($('#slider-tenth-value-upper'));
$("#slider-tenth").Link('upper').to('-inline-<div class="tooltip1"></div>', function ( value ) {

  // The tooltip HTML is 'this', so additional
  // markup can be inserted here.
  $(this).html(
    '<strong>Value: </strong>' +
    '<span>' + value + '</span>'
  );
});

    </script> 

</div>
<br/>
<br/>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="twelth">12<sup>th</sup> Percent</label>
  <div class="col-md-5">
   <div id="slider-twelth"></div>
  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Range">Range</label>  
  <div class="col-md-2">
   <input id="slider-twelth-value-lower" name="twelthMin" type="text" placeholder="Minimum" class="form-control input-md"/>
 
  </div>

  <div class="col-md-2">
  <input id="slider-twelth-value-upper" name="twelthMax" type="text" placeholder="Maximum" class="form-control input-md"/>
  
 </div>


<script type="text/javascript">
    $("#slider-twelth").noUiSlider({
  start: [0, 100],
  step: 1,
  connect: true,
  range: {
    'min': 0,
    'max': 100
  }
});
   
   
$('#slider-twelth').Link('lower').to($('#slider-twelth-value-lower'));
$("#slider-twelth").Link('lower').to('-inline-<div class="tooltip1"></div>', function ( value ) {

  // The tooltip HTML is 'this', so additional
  // markup can be inserted here.
  $(this).html(
    '<strong>Value: </strong>' +
    '<span>' + value + '</span>'
  );
});
$('#slider-twelth').Link('upper').to($('#slider-twelth-value-upper'));
$("#slider-twelth").Link('upper').to('-inline-<div class="tooltip1"></div>', function ( value ) {

  // The tooltip HTML is 'this', so additional
  // markup can be inserted here.
  $(this).html(
    '<strong>Value: </strong>' +
    '<span>' + value + '</span>'
  );
});

    </script> 

</div>
<br/>
<br/>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="backlogs">Backlogs</label>
  <div class="col-md-5">
   <div id="slider-backlogs"></div>
  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Range">Number Of Backlogs</label>  
  <div class="col-md-2">
   <input id="slider-backlogs-value-lower" name="backlogs" type="text" placeholder="Backlogs" class="form-control input-md"/>
 
  </div>

  


<script type="text/javascript">
    $("#slider-backlogs").noUiSlider({
  start: 0,
  step: 1,
  range: {
    'min': 0,
    'max': 50
  }
});
   
   
$('#slider-backlogs').Link('lower').to($('#slider-backlogs-value-lower'));
$("#slider-backlogs").Link('lower').to('-inline-<div class="tooltip1"></div>', function ( value ) {

  // The tooltip HTML is 'this', so additional
  // markup can be inserted here.
  $(this).html(
    '<strong>Value: </strong>' +
    '<span>' + value + '</span>'
  );
});

    </script> 

</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="batch">Job Status</label>
  <div class="col-md-5">
    <select id="batch" name="jobStatus" class="form-control">
    <option value="placedAll" selected="true">All</option>
    
<option value="placed">Placed</option>
<option value="notPlaced">Not Placed</option>

    
    </select>
  </div>
</div>
<div class="dividerHeading"><h4><span>Search</span></h4></div>
<!-- Button (Double) -->
<div class="form-group">
  
  <div class="col-md-12">
   <div class="col-md-5">
    <button id="search" name="search" class="btn btn-primary btn-lg btn-block" value="submit">
    <b>Search</b>&nbsp;<i class="fa fa-search"></i></button>
   </div>
   <div class="col-md-2">
    </div>
    <div class="col-md-5">
    
    <button id="clear" name="clear" onclick="clear()"class="btn btn-block btn-lg btn-danger">Reset&nbsp;<i class="fa fa-close"></i></button>
   <script>
function clear() {
    document.getElementById("searchForm").reset();
}
</script>
    </div>
  </div>
</div>
</fieldset>
</form>
  

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
