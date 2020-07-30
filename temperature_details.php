<?php
include('connection.php');
?>


	<html>
  <head>
  	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script  src="jsapi.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Humidity'],

<?php
$query = "SELECT MONTHNAME(date_time) as mname,
sum(hum) as total, count(hum) as humcount FROM weather GROUP BY MONTH(date_time)";

$result = $con->query($query);

while($data = mysqli_fetch_array($result)){

	$hum = $data['total'];
	$count = $data['humcount'];
	$id = $data['mname'];

	?>
	['<?php echo $id; ?>', <?php echo $hum/$count; ?> ],

<?php
}
//echo ("," +$hum);

?>

        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 400, height: 240, legend: 'bottom', title: 'Humidity Chart'});
      }
    </script>
  </head>

  <body>
  	<div class="container">
      <div class="col-md-6"> 

  <div id="chart_div"></div>

    <div class="table">
      
     
<table class="table">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Month</th>
      <th scope="col">Average Humidity</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td><?php echo $id;?></td>
      <td><?php echo $hum/$count;?></td>
     
    </tr>

  </tbody>
</table>


    </div>


      </div>
       <div class="col-md-6"> </div>
  
    </div>
  </body>
</html>