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
$query = "SELECT  DAY(date_time) as dname,
sum(hum) as total, AVG(hum) as humavg FROM weather GROUP BY DAY(date_time)";

$result = $con->query($query);

//echo($number_of_results);

while($data = mysqli_fetch_array($result)){

	$hum = $data['total'];
	$avg = $data['humavg'];
	$id = $data['dname'];
    
	?>
	['<?php echo $id; ?>', <?php echo $avg; ?> ],

<?php

}
//echo ("," +$hum);

?>

        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_divday'));
        chart.draw(data, {width: 400, height: 240, legend: 'bottom', title: 'Humidity Chart'});
      }
    </script>
  </head>

  <body>
  	<div class="container">
    

  <div id="chart_divday"></div>

    <div class="table">
      
     <br> <br>  
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
      <td><?php echo $avg;?></td>

     
     
    </tr>

  </tbody>
</table>


    </div>


      
  
    </div>
  </body>
</html>