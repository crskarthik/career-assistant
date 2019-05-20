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
				
			</div>
			<div data-role="content" data-theme="a">
			<center><h2><u>Reset Password</u></h2></center>
<?php
if(!isset($_SESSION['username']))
{
include 'db_config.php';
	if (isset($_POST["REGNO"])&&isset($_POST["EMAIL"])) 
	{
	    $REGNO = $_POST['REGNO'];
	    $EMAIL = $_POST['EMAIL'];

	       $result = mysql_query("SELECT * FROM ug WHERE REGNO = '$REGNO' AND EMAIL='$EMAIL'");

	    if (!empty($result))
	     {
	        // check for empty result
	                if (mysql_num_rows($result) > 0)
	                 {
		       $result_edit = mysql_query("SELECT * FROM stu_login WHERE Uname = '$REGNO'");

		       //mail()
		       ?>
		       <h2>Password mailed to registered Email in the database</h2>
		       <?php

					}
		}
	}
}
?>

				<hr>
				
				<center><img src="img/<?php echo $collegeName; ?>.png" />
								
				<h3>Placement,<br>
				Student Profile<br>
				Attendence</h3></center>
			</div>
		</div>
	</body>
</html>




























