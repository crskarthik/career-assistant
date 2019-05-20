<!doctype html>
<?php include 'config.php';
include 'db_config.php';
?>
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
				<h1><img src="img/scsvmv.png" height="25px" width="30px"><b><?php echo $collegeName; ?></b></h1>
				<div data-role="navbar">
					<ul>
						<li><a href="home.php" data-icon="clock" ></a></li>
						<li><a href="profile.php" data-icon="user" class="ui-btn-active"></a></li>
						<li><a href="settings.php" data-icon="gear"></a></li>
						<li><a href="downloads.php" data-icon="arrow-d"></a></li>
						<li><a href="logout.php" data-icon="power"class="external-link"></a></li>
					</ul>
				</div>
			</div>
			<div data-role="content" data-theme="a">
<center><u><h2>Change Form</h2></u></center>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div class="block-grey" data-theme="a">
			  
			  
				
<table class="table table-bordered table-striped ">
<?php
				session_start();
if(isset($_SESSION['username'])&&isset($_POST['requestChange']))
{
include 'db_config.php';	
$fields=array(); 
$fields= $_POST['requestChange'];


for ($i=0; $i <sizeof($fields) ; $i++) { 

if ($fields[$i]=="10_percent") {
	?>
<tr>
<td><b>10th percent</b></td>
<td><input type="text" name="10_percent"></td>
</tr>	<?php
}
if ($fields[$i]=="12_percent") {
	?>
<tr>
<td><b>12th percent</b></td>
<td><input type="text" name="12_percent"></td>
</tr>	<?php
}
if ($fields[$i]=="arrear_history") {
	?>
<tr>
<td><b>Arrears History</b></td>
<td><input type="text" name="arrear_history"></td>
</tr>	<?php
}

if ($fields[$i]=="standing_arrears") {
	?>
<tr>
<td><b>Standing Arrears</b></td>
<td><input type="text" name="standing_arrears"></td>
</tr>	<?php
}
if ($fields[$i]=="cgpa_1_2") {
	?>
<tr>
<td><b>1&2 Sem CGPA</b></td>
<td><input type="text" name="cgpa_1_2"></td>
</tr>	<?php
}
if ($fields[$i]=="cgpa_3") {
	?>
<tr>
<td><b>3 Sem CGPA</b></td>
<td><input type="text" name="cgpa_3"></td>
</tr>	<?php
}
if ($fields[$i]=="cgpa_4") {
	?>
<tr>
<td><b>4 Sem CGPA</b></td>
<td><input type="text" name="cgpa_4"></td>
</tr>	<?php
}
if ($fields[$i]=="cgpa_5") {
	?>
<tr>
<td><b>5 Sem CGPA</b></td>
<td><input type="text" name="cgpa_5"></td>
</tr>	<?php
}
if ($fields[$i]=="cgpa_6") {
	?>
<tr>
<td><b>6 Sem CGPA</b></td>
<td><input type="text" name="cgpa_6"></td>
</tr>	<?php
}
if ($fields[$i]=="cgpa_7") {
	?>
<tr>
<td><b>7 Sem CGPA</b></td>
<td><input type="text" name="cgpa_7"></td>
</tr>	<?php
}
if ($fields[$i]=="cgpa_8") {
	?>
<tr>
<td><b>8 Sem CGPA</b></td>
<td><input type="text" name="cgpa_8"></td>
</tr>	<?php
	}
	if ($fields[$i]=="cgpa_till") {
	?>
<tr>
<td><b>Total CGPA</b></td>
<td><input type="text" name="cgpa_till"></td>
</tr>	<?php
}


?>
<?php
}
# $reg=mysql_query("INSERT INTO `dept` (`DEPT_CODE`) VALUES ('$array[$i]')")or die(mysql_error());
?>
<tr><td colspan="2"><input type="submit" data-theme="e" name="request" value="Request For Change"></td></tr>
</table>
 </div>
<?php
}

		?>		
				

			  
	
				<hr>
				
			</div>
		</div>
	</body>
	
</html>
<?php 
if(isset($_SESSION['username'])&&isset($_POST['request']))
{

$a=null;
$b=null;
$c=null;
$d=null;
$e=null;
$f=null;
$g=null;
$h=null;
$i=null;
$j=null;
$k=null;
$l=null;
		
	$REGNO=$_SESSION['username'];
	$query="UPDATE ug SET ";
	$notification="Change made for following details <br>";
	
	if (isset($_POST['10_percent'])&&$_POST['10_percent']!=0) {
		$value=mysql_escape_string($_POST['10_percent']);
		$a=$value;
		$query.="10_PERCENT='".$value."',";
		$notification.="10th percent = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET 10_PERCENT='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['12_percent'])&&$_POST['12_percent']!=0) {
		$value=mysql_escape_string($_POST['12_percent']);
		$b=$value;
		$query.="12_PERCENT='".$value."',";
		$notification.="12th percent = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET 12_PERCENT='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['arrear_history'])&&$_POST['arrear_history']!=0) {
		$value=mysql_escape_string($_POST['arrear_history']);
		$c=$value;
		$query.="ARREARS_HISTORY='".$value."',";
		$notification.="ARREAR HISTORY = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET ARREARS_HISTORY='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['standing_arrears'])&&$_POST['arrear_history']!=0) {
		$value=mysql_escape_string($_POST['standing_arrears']);
		$d=$value;
		$query.="STANDING_ARREARS='".$value."',";
		$notification.="STANDING_ARREARS = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET STANDING_ARREARS='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['cgpa_1_2'])&&$_POST['cgpa_1_2']!=0) {
		$value=mysql_escape_string($_POST['cgpa_1_2']);
		$e=$value;
		$query.="CGPA_SEM_1_2='".$value."',";
		$notification.="1&2 Sem CGPA= ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET CGPA_SEM_1&2='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['cgpa_3'])&&$_POST['cgpa_3']!=0) {
		$value=$_POST['cgpa_3'];
		$f=$value;
		$query.="CGPA_SEM_3='".$value."',";
		$notification.="3rd Sem CGPA = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET CGPA_SEM_3='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['cgpa_4'])&&$_POST['cgpa_4']!=0) {
		$value=mysql_escape_string($_POST['cgpa_4']);
		$g=$value;
		$query.="CGPA_SEM_4='".$value."',";
		$notification.="4th Sem CGPA  = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET CGPA_SEM_4='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['cgpa_5'])&&$_POST['cgpa_5']!=0) {
		$value=mysql_escape_string($_POST['cgpa_5']);
		$h=$value;
		$query.="CGPA_SEM_5='".$value."',";
		$notification.="5th Sem CGPA  = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET CGPA_SEM_5='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['cgpa_6'])&&$_POST['cgpa_6']!=0) {
		$value=mysql_escape_string($_POST['cgpa_6']);
		$i=$value;
		$query.="CGPA_SEM_6='".$value."',";
		$notification.="6th Sem CGPA  = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET CGPA_SEM_6='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['cgpa_7'])&&$_POST['cgpa_7']!=0) {
		$value=mysql_escape_string($_POST['cgpa_7']);
		$j=$value;
		$query.="CGPA_SEM_7='".$value."',";
		$notification.="7th Sem CGPA  = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET CGPA_SEM_7='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['cgpa_8'])&&$_POST['cgpa_8']!=0) {
		$value=mysql_escape_string($_POST['cgpa_8']);
		$k=$value;
		$query.="CGPA_SEM_8='".$value."',";
		$notification.="8th Sem CGPA  = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET CGPA_SEM_8='$value'WHERE UNAME = '$REGNO'");
	  
	}
	if (isset($_POST['cgpa_till'])&&$_POST['cgpa_till']!=0) {
		$value=mysql_escape_string($_POST['cgpa_till']);
		$l=$value;
		$query.="CGPA_TILL='".$value."',";
		$notification.="Total CGPA  = ".$value."<br>";
		#$result = mysql_query("UPDATE ug SET CGPA_TILL='$value'WHERE UNAME = '$REGNO'");
	  
	}
	$check=substr($query,-1);
	
	if ($check==',') {
		$query=rtrim($query,",");
	}
	$query.=" WHERE REGNO='$REGNO'";
	$query=addslashes($query);
	$flag="1";
	
	if ($a!=null||$b!=null||$l!=null||$c!=null||$d!=null||$e!=null||$f!=null||$g!=null||$h!=null||$i!=null||$j!=null||$k!=null) {
$result = mysql_query("INSERT INTO notification_admin (`NOTIFICATION`, `REQUEST_QUERY`, `APPROVAL_FLAG`,`REGNO`) VALUES('$notification','$query','$flag','$REGNO')");
if($result)
	{
		?><h3><span class="label label-success" id="Tag">Your Changes are Successfully recorded.<br> Wait for the Administrator Approval</span></h3><?php
	}
	else
	{
		?><h3><span class="label label-danger" id="Tag">Some Error Occured. Contact Administrator</span></h3><?php
	}
}	
else{
	?>
	<script type="text/javascript">
window.location.href="profile.php";
	</script>
	<?php
}  
}else{
	?>
	<script type="text/javascript">
window.location.href="profile.php";
	</script>
	<?php
}