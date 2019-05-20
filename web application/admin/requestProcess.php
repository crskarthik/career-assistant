<?php
$request=base64_decode($_GET['request']);
if (isset($_GET['id'])&&isset($_GET['token'])&&isset($_GET['request'])&&$request=="approve") {
	include 'db_config.php';
	echo "Processing... Please wait";
	$id=$_GET['id'];
	$time=$_GET['token'];
	
	$time=base64_decode($time);
	
	 $approve_request_query = mysql_query("SELECT * FROM notification_admin WHERE ID='$id'AND TIME='$time'");
$count=mysql_num_rows($approve_request_query);
                if ($count == 1) 
                {
                	$approve = mysql_fetch_array($approve_request_query);
                	$approve_query=$approve['REQUEST_QUERY'];
                	$regno=$approve['REGNO'];
                	$requestApproved=$approve['NOTIFICATION'];
                	mysql_query($approve_query);
                	mysql_query("DELETE FROM notification_admin WHERE ID='$id' AND TIME='$time'");
                	$notification_client="Your Change has been approved <br> and Executed";
                	$flag=1;
                	$about="Change Approved";
					mysql_query("INSERT INTO notification_client  (`REGNO`,`NOTIFICATION`,`APPROVED_REQUEST`,`FLAG`,`ABOUT`) VALUES('$regno','$notification_client','$requestApproved','$flag','$about')");
					?>
<script type="text/javascript">
window.location.href="notification.php"
	</script>
					<?php
				}
}
if (isset($_GET['id'])&&isset($_GET['token'])&&isset($_GET['request'])&&$request=="delete") {
	include 'db_config.php';
	echo "Processing... Please wait";
	$id=$_GET['id'];
	$time=$_GET['token'];
	$about="Change Rejected";
	$regno=base64_decode($_GET['ticket']);
	$flag=1;
	$notification_client="Your Change has been Rejected <br> Please Contact <br>Administrator";
                	
	$time=base64_decode($time);
	
	 $delete_request_query = mysql_query("SELECT * FROM notification_admin WHERE ID='$id'AND TIME='$time'");
$count=mysql_num_rows($delete_request_query);
                if ($count == 1) 
                {
                	
                	
                	
                	mysql_query("DELETE FROM notification_admin WHERE ID='$id' AND TIME='$time'");
					mysql_query("INSERT INTO notification_client  (`REGNO`,`NOTIFICATION`,`FLAG`,`ABOUT`) VALUES('$regno','$notification_client','$flag','$about')");
					
					?>
<script type="text/javascript">
window.location.href="notification.php"
	</script>
					<?php
				}
}


?>