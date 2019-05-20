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
				<h1><?php echo $collegeName; ?></h1>
				
			</div>
			<div data-role="content" data-theme="a">
<br>
<br>
<br><center><u><h2>Login</h2></u></center>	
			<div class="jumbotron">
		<div class="container">
		<form class="ui-form"action="check.php" method="POST">
		
		<input type="text" class="ui-form-control" placeholder="Username" name="Uname" id="Uname">
		<br>
		<br>
		
		<input type="password" class="ui-form-control" placeholder="Password" name="Upass" id="Upass">
		
		<br>
		<br>
		<br>
		<input type="submit" data-theme="d" class="ui-btn ui-btn-d ui-shadow ui-corner-all btn-success" name="Login" value="Login" id="login">
		</form>
				<hr>
				
				<center><img src="img/<?php echo $collegeName; ?>.png" />
								
				<h3>Placement,<br>
				Student Profile<br>
				Attendence</h3></center>
			</div>
		</div>
	</body>
</html>
