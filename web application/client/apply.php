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
				<h1><b><?php echo $collegeName; ?></b></h1>
				
			</div>
			<div data-role="content" data-theme="a">
			
			
				<?php
	   				 					
				$regNo=base64_decode($_GET['id']);
				$companyName=base64_decode($_GET['key']);
				$companyId=base64_decode($_GET['token']);
				echo $regNo.".".$companyName.".".$companyId;
				$execute=mysql_query("SELECT * FROM placement WHERE  SNO='$companyId' AND COMPANY_NAME='$companyName'")or die(mysql_error());
				if (mysql_num_rows($execute)>0) {
					
				while($result=mysql_fetch_array($execute))
				{
				$applied=$result['APPLIED'];
				$tempApplied=explode(",", $result['APPLIED']);
				if (in_array($regNo,$tempApplied)) {
					echo "already applied";

				}else
				{
					if($applied!=null)
					{
					$applied.=",".$regNo;
					}
					else{
						$applied=$regNo;
					}
					echo $applied;
					mysql_query("UPDATE placement SET APPLIED='$applied' WHERE SNO='$companyId' AND COMPANY_NAME='$companyName'")or die(mysql_error());
				}
				?>
				<script type="text/javascript">
				window.location="home.php"
				</script>
				<?php
				}
			}
				?>
				
			</div>
		</div>
	</body>
</html>













