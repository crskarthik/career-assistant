<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>SCSVMV</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap_default.css">
		<link rel="stylesheet" href="css/Bootstrap.css">
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.4.0.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
		<script src="js/jquery-1.8.2.min.js"></script>
		
<style type="text/css">
	.myheader{
		background-color: black;
		position: top;
	}
	.h_1{
		font-size: 1em;
min-height: 1.1em;
text-align: center;
display: block;
margin: 0 30%;
padding: .7em 0;
text-overflow: ellipsis;
overflow: hidden;
white-space: nowrap;
outline: 0!important;
line-height: 1.3;
font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
font-weight: bold;
color: #ffffff /*{a-bar-color}*/;
text-shadow: 0 /*{a-bar-shadow-x}*/ 0 /*{a-bar-shadow-y}*/ 0 /*{a-bar-shadow-radius}*/ #000000 /*{a-bar-shadow-color}*/;
	}
</style>
	</head>
	<body>
	<div class="myheader"><center><p class="h_1">SCSVMV</h1></center></div>
	<br/>
	<br/>
	<center><h2>Login</h2></center>
		<div class="jumbotron">
		<div class="container">
		<form class="form"action="check.php" method="POST">
		
		<input type="text" class="form-control" placeholder="Username" name="Uname" id="Uname">
		<br>
		<br>
		
		<input type="password" class="form-control" placeholder="Password" name="Upass" id="Upass">
		<br>
		<br>
		<br>
		<input type="submit" class="btn btn-large form-control  btn-success"name="Login" value="Login" id="login">
		</form>
		</div>
		</div>
	</body>
</html>
