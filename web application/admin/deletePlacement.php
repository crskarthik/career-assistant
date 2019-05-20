<?php
include "db_config.php";
$id=$_GET['id'];
$key=base64_decode($_GET['key']);
$token=base64_decode($_GET['token']);
$data=mysql_query("SELECT * FROM placement WHERE SNO='$id' AND ENTRY_DATE='$token'");
if (mysql_num_rows($data)>0) {
	$delete=mysql_query("DELETE FROM placement WHERE SNO='$id' AND COMPANY_NAME='$key'");
if ($delete) {
  ?>
<script type="text/javascript">
  alert("Drive successfully deleted !");
  window.location="Admindashboard.php";
</script>
  <?php
}
else
{
  ?>
 <script type="text/javascript">
  alert("Some Error Occured. Please Contact Administrator!");
  window.location="Admindashboard.php";
</script> 
<?php
}
}
	
?>