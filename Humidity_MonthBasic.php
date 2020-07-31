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
AVG(hum) as monthavg FROM weather GROUP BY MONTH(date_time)";

$result = $con->query($query);

while($data = mysqli_fetch_array($result)){

  
  $mavg = $data['monthavg'];
  $mname = $data['mname'];
    

  
	?>
	['<?php echo $mname; ?>', <?php echo $mavg; ?> ],

<?php } ?>

        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 400, height: 240, legend: 'bottom', title: 'Humidity Chart'});
      }
    </script>
  </head>

  <body>
  	<div class="container">
     

  <div id="chart_div"></div>

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
    <?php while($row = $result ->fetch_object()): ?>
    <tr>
     

      <td><?php echo $row->mname;?></td>

      <td><?php echo $row->monthavg;?></td>


    <?php endwhile; ?>
     
    </tr>

  </tbody>
</table>


    </div>


      
  
    </div>
  </body>
</html>