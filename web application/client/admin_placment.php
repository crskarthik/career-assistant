<!doctype html>
<?php include 'config.php';?>
<html>
	<head>
	
	<title><?php echo $collegeName; ?></title>
	<script type="text/javascript">
	function updateTextInput (val) {
document.getElementById('textInput1').value=val;
	}
	function updateTextInput1 (val) {
document.getElementById('textInput2').value=val;
	}</script>
</head>
<body>

<center><h2>Admin Placement Update</h2></center>
<form action="admin_placment.php" method="POST">
	<input type="text" name="company_name" class="form-control"id="company_name" placeholder="Company Name">
	<br><input type="text" name="job_desc" class="form-control"id="job_desc" placeholder="Job Description">
	<br><input type="radio" name="campus"class="form-control" value="0">ON CAMPUS
	<br>
	<br><input type="radio" name="campus" class="form-control"value="1">OFF CAMPUS
	<br>Tenth Marks (0 to 100) 0<input type="range" class="form-control"min="0" data-theme="c" max="100" name="10_percent" id="10_percent" onchange="updateTextInput(this.value);">100
	<input type="text" id="textInput1" class="form-control" value="" disabled="true">
	<br>Twelth Marks (0 to 100) 0<input type="range" class="form-control"min="2" max="100" data-theme="e"name="12_percent" id="12_percent" onchange="updateTextInput1(this.value);">100
	<input type="text" id="textInput2" class="form-control" value="" disabled="true">
	<br><input type="text" name="arrear_count" class="form-control"id="arrear_count" placeholder="ARREAR HISTORY">
	<br><input type="text" name="standing_arrears" class="form-control"id="standing_arrears" placeholder="STANDING ARREARS">
	<br><input type="checkbox" name="cse" id="cse" class="form-control"value="1">CSE
	<br><input type="checkbox" name="ece" id="ece" class="form-control"value="1">ECE
	<br><input type="checkbox" name="eee" id="eee" class="form-control"value="1">EEE
	<br><input type="checkbox" name="civil" id="civil" class="form-control"value="1">CIVIL&S.E
	<br><input type="checkbox" name="eie" id="eie" class="form-control"value="1">EIE
	<br><input type="checkbox" name="it" id="it" class="form-control"value="1">IT
	<br><input type="checkbox" name="mech" id="mech" class="form-control"value="1">MECH
	<br><input type="checkbox" name="bca" id="bca" class="form-control"value="1">BCA
	<br><input type="date" name="date"class="form-control" id="date">DATE OF INTERVIEW
	<br><input type="date" name="deadline"class="form-control" id="deadline">DATE OF INTERVIEW
	<br><input type="submit" name="submit" id="submit" value="UPLOAD">


</form>

</body>
</html>
<?php
include 'db_config.php';

if(isset($_POST['submit']))
{

$company_name=$_POST['company_name'];
$job_desc=$_POST['job_desc'];
$campus=$_POST['campus'];
$t_percent=$_POST['10_percent'];
$tw_percent=$_POST['12_percent'];
$arrear_count=$_POST['arrear_count'];
$standing_arrears=$_POST['standing_arrears'];

$date=$_POST['date'];
$deadline=$_POST['deadline'];
date_default_timezone_set('Asia/Kolkata');
$userdate = date('Y-m-d',time());
$status="1";
if (isset($_POST['cse'])) {
	$cse='1';
}
else
{
	$cse='0';
}

if (isset($_POST['ece'])) {
	$ece='1';
}
else
{
	$ece='0';
}

if (isset($_POST['eee'])) {
	$eee='1';
}
else
{
	$eee='0';
}

if (isset($_POST['civil'])){
	$civil='1';
}
else
{
	$civil='0';
}

if (isset($_POST['eie'])) {
	$eie='1';
}
else
{
	$eie='0';
}

if (isset($_POST['it'])) {
	$it='1';
}
else
{
	$it='0';
}

if (isset($_POST['mech'])) {
	$mech='1';
}
else
{
	$mech='0';
}
if (isset($_POST['bca'])) {
	$bca='1';
}
else
{
	$bca='0';
}
$reg=mysql_query("INSERT INTO `placement` (`COMPANY_NAME`, `JOB_DESCRIPTION`, `OFF_ON`, `10_PERCENT`, `12_PERCENT`, `ARREAR_COUNT`, `STANDING_COUNT`, `CSE`, `ECE`, `EEE`, `CIVIL_SE`, `EIE`, `IT`, `MECH`, `BCA`, `DATE`,`DEADLINE`,`STATUS`,`ENTRY_DATE`)
 VALUES ('$company_name', '$job_desc', '$campus', '$t_percent', '$tw_percent', '$arrear_count', '$standing_arrears', '$cse', '$ece', '$eee', '$civil', '$eie', '$it', '$mech', '$bca', '$date','$deadline','$status','$userdate')");

	if($reg)
	{
	echo "success";
	}
	else
	{
	echo "failed";
	}
}

?>