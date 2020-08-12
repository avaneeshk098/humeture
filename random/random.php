<?php  
  
$username="root";  
$password="rit123XYZ";//use your password  
$database="sensor";  
  
$con = new mysqli("localhost", "root", "rit123XYZ", "sensor") or die ( "Unable to make it happen Cap'n");  
  
$query = "SELECT datetime, temperature, humidity FROM sensordata";  
$result = $con->query($query);
while ($row = $result -> fetch_array())  
{  
  $row["datetime"]*=1000;
	$dateTemp[]=['x' => $row["datetime"], 'y' => $row["temperature"]];
  $humDate[]=['x'=> $row["datetime"], 'y' => $row["humidity"]];
}
$con -> close();  
?>  
  
<!DOCTYPE html>  
<html>  
<head>  
<title>HighChart</title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>  
<script src="https://code.highcharts.com/highcharts.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data-2012-2022.min.js"></script>  
  
</head>  
<body>  
  
<script type="text/javascript">  
$(function () {  
  
$('#container').highcharts({  
chart: {  
type: "line"
},  
time: {  
timezone: 'Asia/Kolkata'
},  
title: {  
text: 'Temperature vs Time'  
},  
xAxis: {  
title: {  
text: 'Time'  
},  
type: 'datetime',  
},  
yAxis: {  
title: {  
text: 'Temperature'  
},  
}, 
tooltip: {
				valueSuffix: '°C'
			},
visible: true,
series: [{  
  type: "line",
  name: 'Celcius',  
  data: <?php echo json_encode($dateTemp, JSON_NUMERIC_CHECK);?>  
}]  
});  
});  

$(function () {  
  
$('#container1').highcharts({  
chart: {  
type: "line"
},  
time: {  
timezone: 'Asia/Kolkata'
},  
title: {  
text: 'Humidity vs Time'  
},  
xAxis: {  
title: {  
text: 'Time'  
},  
type: 'datetime',  
},  
yAxis: {  
title: {  
text: 'Humidity'  
},  
}, 
tooltip: {
  valueSuffix: '%'
},
visible: true,
series: [{  
  type: "line",
  name: 'Percentage',  
  data: <?php echo json_encode($humDate, JSON_NUMERIC_CHECK);?>  
}]  
});  
});
  
</script>  
<script src="charts/js/highcharts.js"></script>  
<script src="charts/js/modules/exporting.js"></script>  
  
<div class="container">  
<br/>  
<h2 class="text-center">Temperature and Humidity Dashboard</h2>  
<div class="row">  
<div class="col-md-10 col-md-offset-1">  
<div class="panel panel-default">  
<div class="panel-heading">Dashboard</div>  
<div class="panel-body">  
<div id="container"></div>  
</div>  
</div>  
</div>  
</div>  
<div class="row">  
<div class="col-md-10 col-md-offset-1">  
<div class="panel panel-default">  
<div class="panel-heading">Dashboard</div>  
<div class="panel-body">   
<div id="container1"></div>
</div>  
</div>  
</div>  
</div>  
</div>  
  
</body>  
</html>  
