<?php
include('connection.php');
?>



<html>
  <head>
    <script type="text/javascript" src="jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Humidity'],

<?php
$query = "select * from weather";

$res = mysqli_query($con , $query);

while($data = mysqli_fetch_array($res)){

	$hum = $data['hum'];
	$id = $data['id'];

	?>
	['<?php echo $id; ?>', <?php echo $hum; ?> ],

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
    <div id="chart_div"></div>
  </body>
</html>