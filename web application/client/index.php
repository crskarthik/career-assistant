<!doctype html>
<?php include 'config.php';?>
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
		<script type="text/javascript"> setTimeout("location.href='login.php';",5000);</script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline">
				<h1><b><?php echo $collegeName; ?></b></h1>
				
			</div>
			<div data-role="content" data-theme="a">
				 <?php
if(isset($_GET['message']))
{
	$message=$_GET['message'];
	if($message=="wrong")

{ ?>
	<center><div class="alert alert-success"><h3>Invalid Details</h3></div></center>
<?php
}
elseif($message=="missing")
{
	?>
	<center><div class="alert alert-success"><h3>Missing Fields</h3></div></center>
<?php
}
else
{?>
	<center><div class="alert alert-success"><h3>Nice Try.... Buddy... But we are ahead</h3></div></center>
<?php
}
}



?>
				<center><img src="img/scsvmv_large.png" width="160" height="150" />
								
				<h3>Placement,<br>
				Student Profile<br>
				Attendence</h3></center>
				<div class="ui-block"><a href="login.php">
				<button data-theme="d" class="ui-btn ui-btn-d ui-shadow ui-corner-all btn-success">Continue..</button>
				</a></div>
				<!--<a data-role="button" data-icon="star"><center>Sponsors</center></a>-->
				<br>
				<hr>
				<br>
				<!-- <div class="ui-block"><center>Mobile App done by <a href="http://www.verifnews.org/" class="external-link">www.verifnews.org</a>
				and Developed by <?php echo $collegeName; ?> University, Kanchipuram, Tamil Nadu.
				</center>
				</div>-->
			</div>
		</div>
		
	</body>
</html>
