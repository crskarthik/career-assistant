<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="IdeasOnline- share your views to explore yourselves">
    <meta name="author" content="IdeasOnline">
    <link rel="shortcut icon" href="mywebsite/img/favicon.jpg">

    <title>Ideas Online | Counts</title>

 

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
  body
  {
     font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(http://fonts.gstatic.com/s/opensans/v10/DXI1ORHCpsQm3Vp6mXoaTfzy0yu4vcvNhe7QLuoE8rU.woff2) format('woff2');
  unicode-range: U+1F00-1FFF;F;

  }
.navbar-static-top {
  margin-bottom:20px;
}

i {
  font-size:18px;
}
  
footer {
  margin-top:20px;
  padding-top:20px;
  padding-bottom:20px;
  background-color:#efefef;
}

.nav>li .count {
  position: absolute;
  bottom: 12px;
  right: 8px;
  font-size: 10px;
  font-weight: normal;
  background: rgba(51,200,51,0.55);
  color: rgba(255,255,255,0.9);
  line-height: 1em;
  padding: 2px 4px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  -ms-border-radius: 10px;
  -o-border-radius: 10px;
  border-radius: 10px;
}
 html, body, #map-canvas { height: 100%; margin: 0px; padding: 50px }
    </style>
	 </head>
    
   
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <body  >
        
       

<?
mysql_select_db("a9455659_DEV",mysql_connect("mysql5.000webhost.com","a9455659_admin","mrsri2013"));

?>
<html>

  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

<? ob_start();


$REGNO="11119A000";


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
     
          title: 'Carrer graphs'
        };

       

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
   



        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  
 
    <div id="chart_div" style="position:center;width:100%;height:100%;"></div>
 </body>
</html>