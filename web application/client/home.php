<?php session_start();
 include 'config.php';
include 'db_config.php';?>
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
				<h1><b><?php echo $collegeName; ?></b></h1>
				<div data-role="navbar">
					<ul>
						<li><a href="home.php" data-icon="clock" class="ui-btn-active"></a></li>
						<li><a href="profile.php" data-icon="user"></a></li>
						<li><a href="settings.php" data-icon="gear"></a></li>
						<li><a href="downloads.php" data-icon="arrow-d"></a></li>
						<li><a href="logout.php" data-icon="power"class="external-link"></a></li>
					</ul>
				</div>
			</div>
			<div data-role="content" data-theme="a">

<a href="news.php" data-role="button" data-icon="arrow-l" data-iconpos="right" class="ui-link ui-btn ui-icon-arrow-r ui-btn-icon-right ui-shadow ui-corner-all" role="button">News & Updates

 <?php 
 			if(isset($_SESSION['username']))
{
$regno=$_SESSION['username'];	
error_reporting(E_ALL^E_NOTICE);
 
 $extract = mysql_query("SELECT * FROM notification_client  ORDER BY ID DESC ")or die(mysql_error());

               
               while($result=mysql_fetch_array($extract))  {
	
             if (trim($result['REGNO'])==$regno||$result['REGNO']==NULL) {
             	
             
 			  $rawdate=strtotime($result["TIME"]);
 			  $date=date("d-M-Y",$rawdate);
             
 			  date_default_timezone_set('Asia/Kolkata');
			  $userdate = date('d-M-Y', time());
			  
			  $entry=strtotime($date);
			  $notificationTill = strtotime('+3 day', $entry);
			  $notificationTill = date('d-M-Y',$notificationTill);
			if ($notificationTill>=$userdate) { 
			$new=$new+1;
             if($new>1){$tag="enabled";}else{$tag="disable";} 
         }
         }


            } if ($tag=="enabled") {?>
            	<span class="label label-default"><?php echo $new;?> New Notifications</span><?php
            }?></a> <center><u><h2>Notifications</h2></u></center>
				<?php
	
$rec_limit=5;
         $rec_count=$notifications_count;
if (isset($_GET['page'])) {
  $page=$_GET['page']+1;
  $offset=$rec_limit*$page;
}
else
{
  $page=0;
  $offset=0;
}
$left_rec=$rec_count-($page * $rec_limit);
?>
          
         <ul class="pager">
         <?php 
         if($page>0)
         { $last=$page-2;
          ?>
          <li class="previous"><a href="home.php?page=<?php echo $last;?> ">&larr;Previous</a></li>
           <?php 
           if($left_rec<=$rec_limit)
         {
          $last=$page-2;
        ?>
<li class="next disabled"><a href="#" disabled>Next&rarr;</a></li>
          
        <?php
        }else
        {?>
          <li class="next"><a href="home.php?page=<?php echo $page;?>">Next&rarr;</a></li>
          <?php
        }
        }
        if($page==0&&$rec_count>10)
         {?>
       <li class="previous disabled"><a href="#" disabled>&larr;Previous</a></li>
          
        
          <li class="next"><a href="home.php?page=<?php echo $page;?> ">Next&rarr;</a></li>
         <?php 
        }

echo "</ul>";

$REGNO=$_SESSION['username'];

				 $extract = mysql_query("SELECT * FROM placement ORDER BY SNO DESC LIMIT $offset,$rec_limit ");

               
               while($result=mysql_fetch_array($extract))  {


        
           
             
 			  $rawdate=strtotime($result["DATE"]);
 			  $date=date("d-M-Y",$rawdate);
              $rawdead=strtotime($result["DEADLINE"]);
 			  $dead=date("d-M-Y",$rawdead);
 			  $rawentry=strtotime($result["ENTRY_DATE"]);
 			  $entry=date("d-M-Y",$rawentry);
 			  $entry=strtotime($entry);
 			  date_default_timezone_set('Asia/Kolkata');
			  $userdate = date('d-M-Y', time());
			  $userdate=strtotime($userdate);
			  
			  $entry = strtotime("+7 day", $entry);
              ?>
<div data-role="collapsible" data-theme="a">
<h1><center><?php echo $result["COMPANY_NAME"]; ?>
 <?php if ($entry>=$userdate) {?>
             	<span class="label label-default">New!!</span>
             	
            <?php }?></center></h1>
			 
<div class="block-blue">

<table class="table table-bordered">
<tr>
<th colspan="2"><center>Job Specifications and Requirements</center></th>
</tr>
		<tr>
		<td><center><b>NAME</b></center></td>
		<td><?php 
		$companyId=$result['SNO'];
		$companyName=$result["COMPANY_NAME"]; echo $companyName;?></td>
		</tr>
		<tr>
		<td><center><b>JOB DESC</b></center></td>
		<td><?php echo $result["JOB_DESCRIPTION"];?></td>
		</tr>
		<tr>
		<td><center><b>LOCATION</b></center></td>
		<td><?php 
				if ($result["OFF_ON"]=='0') {
					
					echo "ON CAMPUS";
									}
				if ($result["OFF_ON"]=='1') {
					
					echo "OFF CAMPUS";
					
				}
			?>
		</td>
		</tr>
		<tr>
		<td><center><b>10<sup>th</sup> Percent</b></center></td>
		<td><?php $t_percent=$result["10_PERCENT"];
		echo $t_percent;?>%</td>
		</tr>
		<tr>
		<td><center><b>12<sup>th</sup> Percent</b></center></td>
		<td><?php $tw_percent=$result["12_PERCENT"];
		echo $tw_percent;?>%</td>
		</tr>
		<tr>
		<td><center><b>ARREAR HISTORY</b></center></td>
		<td><?php $arrear_count=$result["ARREAR_COUNT"];
		echo $arrear_count;?></td>
		</tr>
		<tr>
		<td><center><b>STANDING ARREARS</b></center></td>
		<td><?php $standing_count=$result["STANDING_COUNT"];
		echo $standing_count;?></td>
		</tr>
		<tr>
		<td><center><b>DEPT</b></center></td>
		<td><?php 

		$dep=$result["DEPT"];
		if($result['CAN_APPLY']==TRUE)
		{
			$apply=true;
			$applied=$result['APPLIED'];
				$tempApplied=explode(",", $result['APPLIED']);
		}elseif ($result['CAN_APPLY']==FALSE) {
			$apply=false;
		}

		 $extractDept = mysql_query("SELECT * FROM dept ORDER BY ID ASC");
$deptCount=mysql_num_rows($extractDept);

		$print=explode(",",$dep);
		$printCount=count($print);
	$deptNameListForPlacement=array();
		for ($i=0; $i < $printCount; $i++) { 
			
			$extractDeptName = mysql_query("SELECT * FROM dept WHERE ID = '$print[$i]'");
		 while($extractDeptNameArray=mysql_fetch_array($extractDeptName))  {
		 	$deptNameListForPlacement[$i] = $extractDeptNameArray['DEPT_CODE'];
echo $deptNameListForPlacement[$i]."<br/>" ;
		 }
			}
							
		
			

		
			?>
		</td>
		</tr>
		<tr>
		<td><center><b>ARE YOU ELIGABLE ??</b></center></td>
		<td><?php 

				 $check = mysql_query("SELECT * FROM ug WHERE REGNO = '$REGNO'");
                 if (mysql_num_rows($check) > 0) {
   				 	$check = mysql_fetch_array($check);
   				 	
				
				if (in_array($check["SPECIALIZATION"], $deptNameListForPlacement)) {
					$eligability="true";
					 	if ($check["10_PERCENT"]>=$t_percent)
	   				 	{
	   				 		$eligability="true";
	   				 		if ($check["12_PERCENT"]>=$tw_percent) 
	   				 		{
	   				 			$eligability="true";
	   				 			if ($check["ARREARS_HISTORY"]<=$arrear_count) 
	   				 			{
	   				 				$eligability="true";
	   				 				if ($check["STANDING_ARREARS"]<=$standing_count) 
	   				 				{
	   				 					$eligability="true";
	   				 					echo "<b>ELIGALBE</b>";

	   				 				} else {
	   				 					$eligability="false";
	   				 					echo "<b>NOT ELIGALBE<br>you have more Standing Arrears count as per job requirments</b>";
	   				 				}
	   				 				
	   				 			} else {
	   				 				$eligability="false";
	   				 				echo "<b>NOT ELIGALBE<br>you have more Arrears than the requirments of the job</b>";
	   				 			}
	   				 			
	   				 		} else {
	   				 			$eligability="false";
	   				 			echo "<b>NOT ELIGALBE<br>12<sup>th</sup>% Did not met the requirments of the job</b>";
	   				 		}
	   				 		
	   				 	}else
	   				 	{
	   				 		$eligability="false";
	   				 		echo "<b>NOT ELIGABLE<br>10<sup>th</sup> % Did not met the requirments of this job</b>";
	   				 	}
   				 	}
   				 	
				else{
					$eligability="false";
					
					echo "<b>NOT ELIGALBE<br> Not For Your Department</b>";
   				 	}

   				}




		?></td>
		</tr>

		<tr>
		<td><center><b>Deadline</b></center></td>
		<td><b><?php $deadline=$result["DEADLINE"];
		echo $dead;?><b><?php
		if ($eligability=="true"&&$userdate>=$dead) {
		?>
		<span class="label label-success">Hurry..!!</span></td>
		<?php } ?>
		</tr>
		<tr>
		<td><center><b>DATE OF INTERVIEW</b></center></td>
		<td><strong><?php echo $date;?></strong></td>
		</tr>
		<tr>
		<td>
		<center><b>Application Status</b></center>
		</td>
		<td><?php
		if($apply==true){

									if (in_array($REGNO,$tempApplied)) {
										echo "<br><b>Applied</b>";
									}else{
	   				 					?>
	   				 					<a href="apply.php?id=<?php 
	   				 					echo base64_encode($REGNO);
	   				 					echo "&key=".base64_encode($companyName)."&token=".base64_encode($companyId);?>">
	   				 					<button class="btn btn-block" data-theme="c" >Apply</button></a>
	   				 					<?php
	   				 				}
	   				 					}
	   	elseif($apply==false)
	   	{
	   		echo "Not Available";
	   	}
		?>
		</td>
		</tr>
		
</table>

 </div>
				</div>


             <?php 
                   
           
}

	
		
}
else{
	?>
	<script type="text/javascript">
window.location.href="login.php"
	</script>
	<?php } ?>	</div>
				</div>
				<hr>
				
				<center><img src="img/<?php echo $collegeName; ?>.png" />
								
				<h3>Placement,<br>
				Student Profile<br>
				Attendence</h3></center>
			</div>
		</div>
	</body>
</html>
