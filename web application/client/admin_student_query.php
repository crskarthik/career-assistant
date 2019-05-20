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

<center><h2>Admin Student Query</h2></center>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<br>Tenth Marks (0 to 100) 0<input type="range" class="form-control"min="0" data-theme="c" max="100" name="10_percent" id="10_percent" onchange="updateTextInput(this.value);">100
	<input type="text" id="textInput1" class="form-control" value="" disabled="true">
	<br>Twelth Marks (0 to 100) 0<input type="range" class="form-control"min="2" max="100" data-theme="e"name="12_percent" id="12_percent" onchange="updateTextInput1(this.value);">100
	<input type="text" id="textInput2" class="form-control" value="" disabled="true">
	<br><input type="text" name="arrear_count" class="form-control"id="arrear_count" placeholder="ARREAR HISTORY">
	<br><input type="text" name="standing_arrears" class="form-control"id="standing_arrears" placeholder="STANDING ARREARS">
	<br><input type="checkbox" name="dept[]" id="cse" class="form-control"value="CSE">CSE
	<br><input type="checkbox" name="dept[]" id="ece" class="form-control"value="ECE">ECE
	<br><input type="checkbox" name="dept[]" id="eee" class="form-control"value="EEE">EEE
	<br><input type="checkbox" name="dept[]" id="civil" class="form-control"value="CIVIL_SE">CIVIL&S.E
	<br><input type="checkbox" name="dept[]" id="eie" class="form-control"value="EIE">EIE
	<br><input type="checkbox" name="dept[]" id="it" class="form-control"value="IT">IT
	<br><input type="checkbox" name="dept[]" id="mech" class="form-control"value="MECH">MECH
	<br><input type="checkbox" name="dept[]" id="bca" class="form-control"value="BCA">BCA
	
	<br><input type="submit" name="submit" id="submit" value="Search">

</form>

</body>
</html>
<?php
include 'db_config.php';

if(isset($_POST['submit']))
{

$t_percent=$_POST['10_percent'];

$tw_percent=$_POST['12_percent'];
$arrear_count=$_POST['arrear_count'];
$standing_arrears=$_POST['standing_arrears'];
echo $t_percent." ".$tw_percent." ".$arrear_count." ".$standing_arrears." ";
$depts=$_POST['dept'];
$conditions=array();
$sql="SELECT * FROM UG ";
foreach ($depts as $key => $n) {
 $conditions[]="`SPECIALIZATION` LIKE '%".$n."%'";
 }

if (count($conditions)>0) {
	$sql .="WHERE" . implode('OR',$conditions);
}
$query=mysql_query($sql);
$res=mysql_fetch_array($query)or die(mysql_error());
while ($res) {
	?>
<tr><td><?php echo $res['10_percent']; ?></td></tr>
<tr><td><?php echo $res['12_percent']; ?></td></tr>
<tr><td><?php echo $res['ARREARS_HISTORY']; ?></td></tr>
<tr><td><?php echo $res['STANDING_ARREARS']; ?></td></tr>
<tr><td><?php echo $res['SPECIALIZATION']; ?></td></tr>
	<?php
}
}

?>