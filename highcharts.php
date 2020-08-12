<html>
	<head>
		<meta charset="utf-8" />
		<title>Highcharts</title>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data-2012-2022.min.js"></script>   
	</head>
	<body>
		<div id="container"></div>
	</body>
	<style>
		#container {
		   min-width: 310px;
		   max-width: 800px;
		   height: 400px;
		   margin: 0 auto
		}
	</style>
	<script type="text/javascript">
	var arr = <?php  
  
		$username="root";  
		$password="rit123XYZ";//use your password  
		$database="sensor";  
		  
		$con = new mysqli("localhost", "root", "rit123XYZ", "sensor") or die ( "Unable to make it happen Cap'n");  
		  
		$query = "SELECT humidity, temperature FROM sensordata";  
		$result = $con->query($query);
		while ($row = mysqli_fetch_array($result))  
		{  
			$humidity = $row["humidity"];
			$temperature = $row["temperature"];
			$data[] = [$humidity, $temperature];
		}  
		
		$json = json_encode($data, JSON_NUMERIC_CHECK);
		echo $json;
		$con -> close();  
	?>;	
	
	//read Timestamnp
	$(function () {
		$('#container').highcharts({
			title: {
				text: 'Temperature vs Time',
			},
			xAxis: {
				title: {
					text: 'Humidity'
				},
			},
			yAxis: {
				title: {
					text: 'Temperature'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
			},
			tooltip: {
				valueSuffix: '°C'
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0
			},
			series: [{
				name: 'Temperature °C',
				data: arr,
			}]
		});
	});
	</script>
</html>
