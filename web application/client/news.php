<?php session_start();
include 'config.php';?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title><?php echo $collegeName; ?></title>
		<link rel="stylesheet" href="themes/Bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap2.css">
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.4.0.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
		<script src="js/jquery-1.8.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.0.min.js"></script>
		
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline">
				<h1><b><?php echo $collegeName; ?></b></h1>
				<div data-role="navbar">
					<ul>
						<li><a href="home.php" data-icon="clock" class="ui-btn-active"></a></li>
						<li><a href="profile.php" data-icon="user"></a></li>
						<li><a href="settings.php" data-icon="gear"></a></li>
						<li><a href="downloads.php" data-icon="arrow-d"></a></li>
						<li><a href="logout.php" data-icon="power"class="external-link"></a></li>
					</ul>
				</div>
			</div>
			<div data-role="content" data-theme="a">

<a href="home.php" data-role="button" data-icon="arrow-l" data-iconpos="left" class="ui-link ui-btn ui-icon-arrow-l ui-btn-icon-left ui-shadow ui-corner-all" role="button">Home</a>	
<center><u><h2>Notifications</h2></u></center>

<?php
				
if(isset($_SESSION['username']))
{
include 'db_config.php';	
error_reporting(E_ALL^E_NOTICE);
 $regno=$_SESSION['username'];
$rec_limit=8;
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
          <li class="previous"><a href="news.php?page=<?php echo $last;?> ">&larr;Previous</a></li>
           <?php 
           if($left_rec<=$rec_limit)
         {
          $last=$page-2;
        ?>
<li class="next disabled"><a href="#" disabled>Next&rarr;</a></li>
          
        <?php
        }else
        {?>
          <li class="next"><a href="news.php?page=<?php echo $page;?>">Next&rarr;</a></li>
          <?php
        }
        }
        if($page==0&&$rec_count>10)
         {?>
       <li class="previous disabled"><a href="#" disabled>&larr;Previous</a></li>
          
        
          <li class="next"><a href="news.php?page=<?php echo $page;?> ">Next&rarr;</a></li>
         <?php 
        }

echo "</ul>";

$REGNO=$_SESSION['username'];

				 $extract = mysql_query("SELECT * FROM notification_client  ORDER BY ID DESC LIMIT $offset,$rec_limit ")or die(mysql_error());

               
               while($result=mysql_fetch_array($extract))  {

               	$resultRegno=trim($result['REGNO']);
               	          		
 			  $rawdate=strtotime($result["TIME"]);
 			  $date=date("d-M-Y",$rawdate);
             
 			  date_default_timezone_set('Asia/Kolkata');
			  $userdate = date('d-M-Y', time());
			  
			  $entry=strtotime($date);
			  $notificationTill = strtotime('+3 day', $entry);
			  $notificationTill = date('d-M-Y',$notificationTill);
   if ($resultRegno==$REGNO||$resultRegno==NULL) {
             	
             
              ?>
<div data-role="collapsible" data-theme="a">
<h1><center><?php echo $result["ABOUT"]; ?>
 <?php if ($notificationTill>=$userdate) { ?>
             	
             	<span class="label label-default">New!!</span>
             	
            <?php } ?></center></h1>
			 
<div class="block-blue">
<?php echo $result['NOTIFICATION'];?>

        </div>
        </div>
       

           
	<?php
		
}
}
}
else{
	?>
	<script type="text/javascript">
window.location.href="login.php"
	</script>
	<?php } ?>	</div>
				</div>
				<hr>
				
				<center><img src="img/<?php echo $collegeName; ?>.png" />
								
				<h3>Placement,<br>
				Student Profile<br>
				Attendence</h3></center>
			</div>
		</div>
	</body>
</html>
