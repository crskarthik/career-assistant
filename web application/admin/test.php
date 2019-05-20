  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>

   
 

<?php

$id=$_GET['id'];
if(isset($id))
{

 include 'db_config.php';

	 $extract = mysql_query("SELECT * FROM placement WHERE SNO='$id' ORDER BY SNO ASC");
$padding=0;
$value=$id;

               while($result=mysql_fetch_array($extract))  {
$e=0;
$ne=0;
 $extractDept = mysql_query("SELECT * FROM dept ORDER BY ID ASC");
$deptCount=mysql_num_rows($extractDept);

		$print=explode(",",$result["DEPT"]);
		$printCount=count($print);
	$deptNameListForPlacement=array();
		for ($i=0; $i < $printCount; $i++) { 
			
			$extractDeptName = mysql_query("SELECT * FROM dept WHERE ID = '$print[$i]'");
		 while($extractDeptNameArray=mysql_fetch_array($extractDeptName))  {
		 	$deptNameListForPlacement[$i] = $extractDeptNameArray['DEPT_CODE'];

		 }
			}
				
 				$check = mysql_query("SELECT * FROM ug ORDER BY SNO ASC");
	            while($student=mysql_fetch_array($check))  {
	            
	            	
	            if (in_array($student["SPECIALIZATION"], $deptNameListForPlacement)) {
				
	            	if ($student["10_PERCENT"]>=$result["10_PERCENT"]) {

	            		if ($student["12_PERCENT"]>=$result["12_PERCENT"]) {
	            			
	            			if ($student["ARREARS_HISTORY"]<=$result["ARREAR_COUNT"]) 
	   				 			{
	   				 				if ($student["STANDING_ARREARS"]<=$result["STANDING_COUNT"]) {
	   				 					$EB="true";
	   				 				}
	            					else{
	            					$EB="false";
	            					}
	            				}
	            				else{
	            					$EB="false";
	            				}
	            	}
	            	else{
	            		$EB="false";
	            	}
	            	}
	            	else{
	            	$EB="false";
	            	}
	            }else
	            {
	            	$EB="false";
	            }
	            	if ($EB=="false") {
					$ne=$ne+1;
				}elseif ($EB="true") {
					$e=$e+1;
				}
				
}
				?>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

 <?
ob_start();
			?>	['<?echo "Eligble"; ?>',<? echo $e; ?>],
                               ['<?echo "Not Eligble"; ?>',<? echo $ne; ?>], <?
$items = ob_get_contents();
ob_end_clean();
?> 
 var data<? echo $value;?> = google.visualization.arrayToDataTable([
          ['Eligble', 'Not Eligble'],
         <? echo $items; ?>
        ]);

        var options<? echo $value;?> = {
          title: '<?echo $result['COMPANY_NAME']." "."Eligbility"; ?>',
  colors: ['#00a65a', '#3c8dbc'],


   pieHole: 0.4,
        };

        var chart<? echo $value;?> = new google.visualization.PieChart(document.getElementById('donutchart<? echo $value;?>'));
        chart<? echo $value;?>.draw(data<? echo $value;?>, options<? echo $value;?>);
   



      }
    </script> 
<div class="col-md-4">
<div id="donutchart<? echo $value;?>" ></div>
</div>
<?

}




}
?>
       

  



		
    
 