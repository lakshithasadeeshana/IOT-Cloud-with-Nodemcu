<?php
include('connection.php');
?>



<html>
  <head>
    <script type="text/javascript" src="jsapi.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Soil'],

<?php
$query = "select * from soil";

$res = mysqli_query($con , $query);

while($data = mysqli_fetch_array($res)){

	$soil = $data['soil_value'];
	$id = $data['id'];

	?>
	['<?php echo $id; ?>', <?php echo $soil; ?> ],

<?php
}
//echo ("," +$hum);

?>

        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data, {width: 400, height: 240, legend: 'bottom', title: 'Soil Data Chart'});
      }
    </script>
  </head>

  <body>
    <div id="chart_div2"></div>
  </body>
</html>