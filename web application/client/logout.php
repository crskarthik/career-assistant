
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
			<div data-role="hea<?php echo $collegeName; ?>der" data-position="inline">
				<CENTER><h1><b><?php echo $collegeName; ?></b></h1></CENTER>
				
			</div>
			<div data-role="content" data-theme="a">
				
				<center><img src="img/scsvmv_large.png" width="160" height="150" />
						<h1><?php 

						session_destroy();
						echo "logout";?></h1>	
						<script type="text/javascript">
window.location.href="../index.php";
						</script>	
				<h3>Placement,<br>
				Student Profile<br>
				Attendence</h3></center>
				<div class="ui-block"><a href="login.php" class="external-link">
				<button data-theme="d" class="ui-btn ui-btn-d ui-shadow ui-corner-all">Continue..</button>
				</a></div>
				<!--<a data-role="button" data-icon="star"><center>Sponsors</center></a>-->
				<br>
				<hr>
				<br>
				<!-- <div class="ui-block"><center>Mobile App done by <a href="http://www.verifnews.org/" class="external-link">www.verifnews.org</a>
				and Developed by SCSVMV University, Kanchipuram, Tamil Nadu.
				</center>
				</div>-->
			</div>
		</div>
	</body>
</html>
