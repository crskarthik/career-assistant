<html>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<label>New Dept Name</label>
<input type="text" id="newDeptName" name="newDeptName">
<input type="submit" id="submit" name="submit" value="Submit">
</form>
</html>
<?php
function newDeptName(dept)
{
echo $dept;
}
if (isset($_POST['submit'])) {
	$deptName=$_POST['newDeptName'];
	newDeptName($deptName);
}
?>