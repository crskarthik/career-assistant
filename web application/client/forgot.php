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
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline">
				<h1><b><?php echo $collegeName; ?></b></h1>
				
			</div>
			<div data-role="content" data-theme="a">
			<center><h2><u>Reset Password</u></h2></center>
<div class="jumbotron">
		<div class="container">
		<form class="form"action="fp.php" method="POST">
		
		<input type="text" class="form-control" data-role="text" data-theme="input"placeholder="Username" name="REGNO" id="REGNO" required>
		<br>
		<br>
		
		<input type="email" class="form-control" data-role="text" data-theme="input" placeholder="Email" name="EMAIL" id="EMAIL" required>
		
		<br>
		<br>
		<br>
		<input type="submit" data-theme="d" class="ui-btn ui-btn-d ui-shadow ui-corner-all btn-success" name="fp" value="Submit" id="FP">
		</form>
		<br>
		<br>
		<br>
		<a href="login.php"><button data-theme="b" class="ui-btn ui-btn-b ui-shadow ui-corner-all btn-success" >Login</button></a>
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













