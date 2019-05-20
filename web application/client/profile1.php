<? session_start(); ?>
<!doctype html>
<?php 
include 'config.php';
include 'db_config.php';
$REGNO=$_SESSION['username'];
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
				<div data-role="navbar">
					<ul>
						<li><a href="home.php" data-icon="clock" ></a></li>
						<li><a href="profile.php" data-icon="user" class="ui-btn-active"></a></li>
						<li><a href="settings.php" data-icon="gear"></a></li>
						<li><a href="credits1.html" data-icon="arrow-d"></a></li>
						<li><a href="logout.php" data-icon="power"class="external-link"></a></li>
					</ul>
				</div>
			</div>
			<div data-role="content" data-theme="a">
<center><u><h2>Profile</h2></u></center>
<?php
				
if(isset($_SESSION['username']))
{
include 'db_config.php';	
?>
				<div data-role="collapsible" data-theme="a">
			  <h1>My Profile</h1>
			  
				<div class="block-blue">
				

			<?php
			
$REGNO=$_SESSION['username'];

				 $result = mysql_query("SELECT * FROM ug WHERE REGNO = '$REGNO'");

                if (mysql_num_rows($result) > 0) {
$result = mysql_fetch_array($result);

        
            ?>
<center>
<table class="table table-bordered">
		<tr>
		<td><center><b>Name</b></center></td>
		<td><?php echo $result["NAME"];?></td>
		</tr>
		<tr>
		<td><center><b>Reg No.</b></center></td>
		<td><?php echo $result["REGNO"];?></td>
		</tr>
		<tr>
		<td><center><b>D.O.B</b></center></td>
		<td><?php echo $result["DOB"];?></td>
		</tr>
		<tr>
		<td><center><b>Father Name</b></center></td>
		<td><?php echo $result["FATHER_NAME"];?></td>
		</tr>
		<tr>
		<td><center><b>Mother Name</b></center></td>
		<td><?php echo $result["MOTHER_NAME"];?></td>
		</tr>
		<tr>
		<td><center><b>CGPA</b></center></td>
		<td><?php echo $result["CGPA_TILL"];?></td>
		</tr>
	
</table>
</center>
          
			
				</div>
				</div>

<div data-role="collapsible" data-theme="a">
<h1>CGPA - Percentage</h1>
<div class="block-blue">
	<label>Enter Your CGPA</label>
		
		<input type="text"   class="form-control" placeholder="CGPA OUT OF 10" name="cgpa" id="cgpa" aria-describedby="cgpa" onchange="calculateCgpa()" required>
			<h3><span class="label label-success" id="divCgpa">Your Percent:</span></h3>
</div>
</div>
<div data-role="collapsible" data-theme="a">
<h1>Percentage - CGPA</h1>
<div class="block-grey">
	<label>Enter Your Percent</label>
		
		<input type="text"   class="form-control" placeholder="Percent out of 100" name="percent" id="percent" aria-describedby="percent" onchange="calculatePercent()" required>
			<h3><span class="label label-success" id="divPercent"></span></h3>
</div>
</div>
<div class="dividerHeading">
									<h4><span>Academics</span></h4>
								</div>
			  
  <div class="block-grey">
<form name="requestChange" action="requestChange.php" method="post">
<center>
<table class="table table-bordered">
<tr>
<th><center>Specification</center></th>
<th><center>Score/Value</center></th>
<th><center>Actions</center></th>

</tr>
		<tr>
		<td><center><b>Course</b></center></td>
		<td><?php echo $result["COURSE"];?></td>

		</tr>
		<tr>
		<td><center><b>Specialization</b></center></td>
		<td><?php echo $result["SPECIALIZATION"];?></td>
		</tr>
		<tr>
		<td><center><b>10<sup>th</sup> %</b></center></td>
		<td><?php echo $result["10_PERCENT"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="10_percent"/></td>
		</tr>
		<tr>
		<td><center><b>12<sup>th</sup> %</b></center></td>
		<td><?php echo $result["12_PERCENT"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="12_percent"/></td>
		
		</tr>
		<tr>
		<td><center><b>Arrears History</b></center></td>
		<td><?php echo $result["ARREARS_HISTORY"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="arrear_history"/></td>
		
		</tr>
		<tr>
		<td><center><b>Standing Arrears</b></center></td>
		<td><?php echo $result["STANDING_ARREARS"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="standing_arrears"/></td>
		
		</tr>
		<tr >
		<td colspan="3"><center><b>CGPA SEM</b></center></td>
		</tr>
		<?php if ($result["CGPA_SEM_1_2"]!=null) {?>
		<tr>
		<td><center><b>1&2</b></center></td>
		<td><?php echo $result["CGPA_SEM_1_2"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="cgpa_1_2"/>
		</td>
		</tr>
		<?php } 
		if ($result["CGPA_SEM_3"]!=null) {?>
		<tr>
		<td><center><b>3</b></center></td>
		<td><?php echo $result["CGPA_SEM_3"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="cgpa_3"/></td>
		</tr>
		<?php } 
		 if ($result["CGPA_SEM_4"]!=null) {?>
		<tr>
		<td><center><b>4</b></center></td>
		<td><?php echo $result["CGPA_SEM_4"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="cgpa_4"/></td>
		</tr>
		<?php } 
		 if ($result["CGPA_SEM_5"]!=null) {?>
		<tr>
		<td><center><b>5</b></center></td>
		<td><?php echo $result["CGPA_SEM_5"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="cgpa_5"/></td>
		</tr>
		<?php }
		 if ($result["CGPA_SEM_6"]!=null) {?>
		<tr>
		<td><center><b>6</b></center></td>
		<td><?php echo $result["CGPA_SEM_6"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="cgpa_6"/></td>
		</tr>
		<?php }
		 if ($result["CGPA_SEM_7"]!=null) {?>
		<td><center><b>7</b></center></td>
		<td><?php echo $result["CGPA_SEM_7"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="cgpa_7"/></td>
		</tr>
		<?php }
		if ($result["CGPA_SEM_8"]!=null) {?>
		<td><center><b>8</b></center></td>
		<td><?php echo $result["CGPA_SEM_8"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="cgpa_8"/></td>
		</tr>
		<?php }?>


		<tr>
		<td><center><b>TOTAL CGPA</b></center></td>
		<td><?php echo $result["CGPA_TILL"];?></td>
		<td><input type="checkbox" name="requestChange[]" value="cgpa_till"/></td>
		</tr>
	<tr><td colspan="3"><input type="submit" data-theme="e" name="submit" value="Change"></td></tr>
</table>
</center>
 </div>
<div class="block-grey">
<div id="chart_div" style="position:center;width:100%;height:100%;"></div>
</div>
             <?php
                   
                
               
}
else{
	?>
	<script type="text/javascript">

	</script>
	<?php
}
		?>		
				

			   
<?php
}
else{
	?>
	<script type="text/javascript">

	</script>
	<?php 

}?>

<?php
$notifications_query=mysql_query("SELECT * FROM notification_client WHERE REGNO='$REGNO' AND FLAG=1 ORDER BY ID DESC");
					if (mysql_num_rows($notifications_query)>0) {
				$notifications=mysql_fetch_array($notifications_query);
						
					?>
		 <div class="modal fade" id="myModal"  role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel"><center>Notification</center></h4>
                    </div>
                <div class="modal-body">
                    <center>
                   <h3 class="media-heading"><?php echo $notifications['NOTIFICATION'];?></h3>
                   
                    </center>
                    
                </div>
                <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
	</body>

<script type="text/javascript">
 $(window).load(function(){
        $('#myModal').modal('show');
    });</script>
					
					<?php

				mysql_query("UPDATE notification_client SET FLAG=0 WHERE REGNO='$REGNO'");	
				}?>

</body>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

<? ob_start();





$output=array();
$output[30]="1&2 Sem"; 
$output[31]="3 Sem";
$output[32]="4 Sem";
$output[33]="5 Sem";
$output[34]="6 Sem";
$output[35]="7 Sem";
$output[36]="8 Sem"; 
           

$sql2 = mysql_query("SELECT * FROM ug WHERE REGNO='$REGNO' ");
$row2=mysql_fetch_array($sql2);
for($i=30;$i<36;$i++)
{
                 
?>
												['<? echo $output[$i]; ?>',<? echo $row2[$i]; ?>],
										
<?
}
$items = ob_get_contents();
ob_end_clean();
?> 
 var data = google.visualization.arrayToDataTable([
          ['SEM', 'CGPA'],
         <? echo $items; ?>
        ]);

        var options = {
     
          title: 'Unique Hits Analyser Line Graph @ IdeasOnline.tk'
        };

       

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
   



        chart.draw(data, options);
   }
    </script>

<script type="text/javascript">

function calculateCgpa() {
    var percent=null;
    var cgpa = $("#cgpa").val();
    cgpa=cgpa.replace(/\s/g,'');
  if (cgpa!='') {

					if (cgpa<=10.0&&cgpa>=4.5)
					{
								if (cgpa>=4.5&&cgpa<=6.49) {
									num=50+10*(cgpa-4.5)/2.0;
									 var percent=num.toFixed(2);
						        $("#divCgpa").html(percent+"%");
						    }
						    if (cgpa>=6.5&&cgpa<=8.24) {
						    num=60+15*(cgpa-6.5)/1.75;
						     var percent=num.toFixed(2);
						     $("#divCgpa").html(percent+"%");
						    }
						    if (cgpa>=8.25&&cgpa<=10.0) {
						    num=75+25*(cgpa-8.25)/1.75;
						     var percent=num.toFixed(2);
						     $("#divCgpa").html(percent+"%");
						    }
				    }
				    else if (cgpa<4.5&&cgpa>=0) {
				    $("#divCgpa").html("Not considered for convertion..<br/>Very Low!!");
				    }
				    else if(cgpa>10)
				    {
				     $("#divCgpa").html("CGPA will be in between 0-10");
				    }
					 else 
				    
				    {
				        $("#divCgpa").html("Invalid CGPA");
				    }
    }
    else if(cgpa=='')
    {
	 $("#divCgpa").html("Waiting for your CGPA");
   }
    
}
function calculatePercent () {
	var percent=$("#percent").val();
    var cgpa = null;
    percent=percent.replace(/\s/g,'');
  if (percent!='') {

					if (percent<=100&&percent>=50)
					{
								if (percent>=50&&percent<60) {
									num=((2*(percent-50))/10)+4.5;
									 var cgpa=num.toFixed(2);
						        $("#divPercent").html(cgpa);
						    }
						    if (percent>=60&&percent<75) {
						    num=((1.75*(percent-60))/15)+6.5;
						     var cgpa=num.toFixed(2);
						     $("#divPercent").html(cgpa);
						    }
						    if (percent>=75&&percent<=100) {
						    num=((1.75*(percent-75))/25)+8.25;
						     var cgpa=num.toFixed(2);
						     $("#divPercent").html(cgpa);
						    }
				    }
				    else if (percent<50&&percent>=0) {
				    $("#divPercent").html("Not considered for convertion..<br/>Very Low!!");
				    }
				    else if(percent>100)
				    {
				     $("#divPercent").html("Percent will be in between 0-100");	
				    }
					 else 
				    
				    {
				        $("#divPercent").html("Invalid Percent");
				    }
    }
    else if(percent=='')
    {
	 $("#divPercent").html("Waiting for your Percent");
   	}
    	
}


$(document).ready(function () {
   $("#cgpa").keyup(calculateCgpa);
   $("#percent").keyup(calculatePercent);
});
	</script>
</html>