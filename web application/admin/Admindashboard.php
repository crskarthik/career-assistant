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
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
 <link rel="stylesheet" href="assets/morris/morris.css">
<script src="assets/morris/jquery.min.js"></script>
 <script src="assets/morris/raphael-min.js"></script>
 <script src="assets/morris/morris.min.js"></script>
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
          
      
<div class="row ">
 <div class="col-md-4">
<div class="thumbnail">
<legend><center><h4>Pre-Assessment Stats</h4></center></legend>
 <div id="donutchart"></div>
 </div></div>
 <div class="col-md-4">
<div class="thumbnail">
<legend><center><h4>Placement Stats</h4></center></legend>
 <div id="donutchart1"></div>
 </div></div>
 
 <div class="col-md-4">
<div class="thumbnail">
<legend><center><h4>Placed Stats</h4></center></legend>
 <div id="donutchart2"></div>
 </div></div>
 </div>
      <div class="row">
<div class="col-md-8">
<div class="panel panel-warning">
  <div class="panel-body">
          <legend><h4><center>Companies List</center></h4></legend>
         <table id="datatables" class="dataTable table table-striped table-condensed table-hover">
<thead>
                <tr>
                  <th>COMPANY NAME</th>
                  <th>INTERVIEW DATE</th>
                
                  <th>Eligible</th>
                  <th>ACTIONS</th>
                  <th>STATS</th>
                  <th>UPDATED ON</th>
                </tr>
              </thead>
<tbody>
<?php
include 'db_config.php';
 $extract = mysql_query("SELECT * FROM placement ORDER BY SNO DESC");

               
               while($result=mysql_fetch_array($extract))  {
                          $rawdate=strtotime($result["DATE"]);
        $date=date("d-M-Y",$rawdate);
                         $rawdate2=strtotime($result["ENTRY_DATE"]);
        $date2=date("d-M-Y",$rawdate2); 
                          
                          $path="test?id=".$result['SNO'];
$key=base64_encode($result['COMPANY_NAME']);
                          $pathResults="results.php?id=".$result['SNO']."&key=".$key;
                          $driveDetails="drive.php?id=".$result['SNO']."&key=".$key."&token=".base64_encode($result["ENTRY_DATE"]);
                          $editPlacement="editPlacement.php?id=".$result['SNO']."&key=".$key."&token=".base64_encode($result["ENTRY_DATE"]);
                          $deletePlacement="deletePlacement.php?id=".$result['SNO']."&key=".$key."&token=".base64_encode($result["ENTRY_DATE"]);
?>
              
              
                <tr>
                  <td><?php echo $result['COMPANY_NAME'];?></td>
                  <td><?php echo $date;?></td>
          
                  <td><a href="<?php echo $pathResults;?>">List</a>
</td>
                 <td>
<a href="<?php echo $editPlacement;?>"><button class="btn btn-primary btn-xs" title="Edit User"><i class="fa fa-edit"></i></button></a>
<a href="<?php echo $deletePlacement;?>" onclick="return confirm('Are you sure?');"><button class="btn btn-danger btn-xs" title="Delete User"><i class="fa fa-trash"></i></button></a>
</td>
                 
                   <td><a href="<?php echo $driveDetails;?>"><button class="btn btn-primary btn-xs" title="Edit User"><i class="fa fa-eye"></i></button></a>
</td>
                   <td><?php echo $date2;?></td>
                </tr>
          
   <?php }?>              
              </tbody>
            </table>
          </div>
          </div></div>
        <div class="col-md-4">
  <legend><div class="row"><div class="col-md-7"> Notifications</div>
  <div class="col-md-5">
  <a href="notifyStudent.php">
  <button class="btn btn-danger btn-block">
  <i class="fa fa-plus"></i> Post New</button>
  </a>
  </div>
  </div>
  </legend>
           <?php
      
error_reporting(E_ALL^E_NOTICE);
 
$rec_limit=1;
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
          <li class="previous"><a href="Admindashboard.php?page=<?php echo $last;?> ">&larr;Previous</a></li>
           <?php 
           if($left_rec<=$rec_limit)
         {
          $last=$page-2;
        ?>
<li class="next disabled"><a href="#" disabled>Next&rarr;</a></li>
          
        <?php
        }else
        {?>
          <li class="next"><a href="Admindashboard.php?page=<?php echo $page;?>">Next&rarr;</a></li>
          <?php
        }
        }
        if($page==0&&$rec_count>10)
         {?>
       <li class="previous disabled"><a href="#" disabled>&larr;Previous</a></li>
          
        
          <li class="next"><a href="Admindashboard.php?page=<?php echo $page;?> ">Next&rarr;</a></li>
         <?php 
        }

echo "</ul>";


         $extract = mysql_query("SELECT * FROM notification_client WHERE REGNO IS NULL ORDER BY ID DESC LIMIT $offset,$rec_limit ")or die(mysql_error());

               
               while($result=mysql_fetch_array($extract))  {

             if ($result['REGNO']==NULL) {


              ?>
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
$url=base64_encode("Admindashboard.php");
?>
  <a href="update.php?id=<?php echo $id;?>&token=<?php echo $token;?>&request=<?php echo base64_encode("delete"); ?>&url=<?php echo $url;?> ">
  <button class="btn btn-danger btn-block" onclick="return confirm('Are You Sure to delete the request?');"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</button></a>
  
</div>
      

           
  <?php
    
}
}
?>
     </div>
        </div>
        </div>
        
          
<?php
   $extract = mysql_query("SELECT * FROM configurations");


               while($result=mysql_fetch_array($extract))  {
$e=0;
$ne=0;
$p=0;
$np=0;


        
        $check = mysql_query("SELECT * FROM ug ORDER BY SNO ASC");
              while($student=mysql_fetch_array($check))  {
              
              if ($student['PLACED']!=NULL) {
                  $p=$p+1;
                }  
                elseif($student['PLACED']==NULL){
                  $np=$np+1;
                }
            
        
                if ($student["10_PERCENT"]>=$result["MIN_TENTH"]) {

                  if ($student["12_PERCENT"]>=$result["MIN_TWELTH"]) {
                    
                    
                    
                      $EB="true";
                     
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
        
}}

        ?>

 
<script type="text/javascript">
  Morris.Donut({
  element: 'donutchart',
  data: [
    {label: "Eligible", value: <?php echo $e;?>},

    {label: "Not-Eligible", value: <?php echo $ne;?>}
    
  ],
  resize:'true',
  colors: ['#00a65a', '#3c8dbc']


});
  Morris.Donut({
  element: 'donutchart1',
  data: [
    {label: "Placed", value: <?php echo $p;?>},

    {label: "Not-Placed", value: <?php echo $np;?>}
    
  ],
  resize:'true',
  colors: ['#00a65a', '#3c8dbc']


});
  Morris.Donut({
  element: 'donutchart2',
  data: [
  <?php 
  $query=mysql_query("SELECT PLACED_COMPANY, COUNT(PLACED_COMPANY) AS NumberOfplaced FROM ug WHERE PLACED_COMPANY IS NOT NULL GROUP BY PLACED_COMPANY");
$count=mysql_num_rows($query);
while($result=mysql_fetch_array($query))
{
$NumberOfplaced=$result['NumberOfplaced'];
$placedCompany=$result['PLACED_COMPANY'];
    ?>
    {label: "<?php echo $placedCompany;?>", value: <?php echo $NumberOfplaced;?>},

    
   <?php }?>
  ],
  resize:'true'


});
    </script> 


        
            
<?php
 $extract1 = mysql_query("SELECT * FROM placement ORDER BY SNO DESC");
   while($result1=mysql_fetch_array($extract1))  { 
 $id=$result1['SNO'];
$_GET['id']=$id;
?>
        <!-- Modal -->
    <div class="modal fade" id="myModal<?php echo $result1['SNO'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $result1['SNO'];?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<div class="row">
                     <center><h4 class="modal-title" id="myModalLabel"><?php echo $result1['COMPANY_NAME'];?></h4></center>
                    </div>
</div>
                <div class="modal-body">
                 <div class="row">
 <div class="col-md-4"><?include 'test.php';?></div>
                  <div class="col-md-offset-2 col-md-5"><center>
  <table class="table">
<tr>
<th>Job Description</th>
<td><?php echo $result1['JOB_DESCRIPTION'];?></td>
</tr>
<tr>
<th>Location</th>
<td><?php if($result1['OFF_ON']=='0'){ echo "ON CAMPUS";}elseif($result1['OFF_ON']=='1'){ echo "OFF CAMPUS";}?></td>
</tr>
</table>
                  </center>
                  </div>
               
  </div>
</div>
<div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }?>

</div>

          


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1422076482081">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1422076482081" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>         