<?php session_start();
include 'config.php';?>
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
						<li><a href="home.php" data-icon="clock" ></a></li>
						<li><a href="profile.php" data-icon="user" ></a></li>
						<li><a href="settings.php" data-icon="gear" class="ui-btn-active"></a></li>
						<li><a href="downloads.php" data-icon="arrow-d"></a></li>
						<li><a href="logout.php" data-icon="power"class="external-link"></a></li>
					</ul>
				</div>
			</div>
			<div data-role="content" data-theme="a" onload="checkPasswordMatch()">
<br>
<br>
<br><center><u><h2>Settings</h2></u></center>	
			<?php
		
if(isset($_SESSION['username']))
{
include 'db_config.php';
$REGNO=$_SESSION['username'];

if(isset($_POST['update'])&&isset($_POST['UnewPass'])&&isset($_POST['UnewPass1']))
{
	$UnewPass=$_POST['UnewPass'];
	$UnewPass1=$_POST['UnewPass1'];
	$REGNO=$_SESSION['username'];
if ($UnewPass==$UnewPass1) {
	  $result = mysql_query("UPDATE stu_login SET UPASS='$UnewPass'WHERE UNAME = '$REGNO'");
	  ?>
<div class="alert alert-success">
	<p>Changes done Successfully</p>
</div>
	  <?php
} else {?>
	<div class="alert alert-danger">
	<p>Passwords Didn't Match</p>
</div>
<?php
}

	
}
?>
	<div data-role="collapsible" data-theme="a">
			  <h1>Change Password</h1>
			  <div class="block-grey">
			 <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div class="input-group">
		<span class="input-group-addon" id="password">Password</span>
		<input type="password"   class="form-control" placeholder="New Password" name="UnewPass" id="UnewPass" aria-describedby="NewPassword" required>
		</div>
		<br>
		<div class="input-group">
		<span class="input-group-addon" id="password">Re-Type</span>
		<input type="password"   class="form-control" placeholder="Re-Type Password" name="UnewPass1" id="UnewPass1" aria-describedby="ConfirmPassword" onchange="checkPasswordMatch()" required>
		
		</div>
		
		
		<span class="label label-success"  id="divCheckPasswordMatch"></span>
		<input type="submit" data-theme="e" name="update" value="Update" >
		
			 </form>
			   
			   </div>
    </div>
<div data-role="collapsible" data-theme="a">
			  <h1>location</h1>
			  <div class="block-grey">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.72956038554!2d79.728566!3d12.860736000000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52c20d805eb7bd%3A0x489fbef75f724222!2sSri+Chandrasekharendra+Saraswathi+Viswa+Mahavidyalaya!5e0!3m2!1sen!2sin!4v1415338326250"  frameborder="0" style="border:0"></iframe>   </div>
    </div>
<?php
}
else
{
	?>
	<script type="text/javascript">
	window.location.href="index.php?message=invalidsurfing"</script>
	<?php
}
?>
				<hr>
				
				<center><img src="img/scsvmv.png" />
								
				<h3>Placement,<br>
				Student Profile<br>
				Attendence</h3></center>
			</div>
		</div>
		<script type="text/javascript">

function checkPasswordMatch() {
    var password = $("#UnewPass").val();
    var confirmPassword = $("#UnewPass1").val();
  
    	 if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
        $("#divCheckPasswordMatch").html("Proceed.");
}


$(document).ready(function () {
   $("#UnewPass1").keyup(checkPasswordMatch);
});
	</script>
	</body>
</html>
