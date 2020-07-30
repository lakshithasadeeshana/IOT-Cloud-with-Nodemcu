<?php
    session_start();

    

?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!------------------------jquery------------------------>

  <script src="jquery.min.js"></script> 
    
   
   <!-- If you are opening this page from a web hosting server machine, uncomment belwo line -->
   <!--
   <script type="text/javascript">
    document.write([
      "\<script src='",
      ("https:" == document.location.protocol) ? "https://" : "http://",
      "ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js' type='text/javascript'>\<\/script>" 
    ].join(''));
    </script>


<!--------------------------jquery-------------------->


<!-------------------------------navbar---------------------------->

<?php require('navbar.php');  ?>

<!--------------------------------navbar------------------------------>




<div class="row">
          <div class="col-md-3">
                     <div class="list-group">
                         
                         <a href="temperature_dashboard.php" class="list-group-item list-group-item-action">Temperature Table</a>
                         <a href="graph_humidity.php" class="list-group-item list-group-item-action">Humidity Table</a>
                         <a href="#" class="list-group-item list-group-item-action">Soil Mostrue Table</a>
                         <a href="Humidity_prograss" class="list-group-item list-group-item-action">Power Manage</a>
                      
                      
                       
                   </div>
          </div>
          <div class="col-md-9">

<div class="row">

  <!-----firstlayer---------->
  <div class="col-md-3"> <br><br>
            <p  id="temperature">
                <img src = 'temperature.png' height="60px" width="60px" style='vertical-align: middle' /> 00.00
            </p>
            <p  id="humidity">
                <img src = 'humidity.png' height="60px" width="60px" style='vertical-align: middle' /> 00.00
            </p>
            <br></div>
  <div class="col-md-3">
    <br><br>
    <p id="soil_data"></p>
  </div>
  <div class="col-md-3">
    <br>
    <p id="data">
<?php

include("graph_humidity.php")
 ?>

    </p>
  </div>
</div>
<!-----firstlayer---------->


<!-----secondlayer---------->
<div class="row"> 

<div class="col-md-6">
 
  <?php

include("Humidity_prograss.php")
 ?>

</div>  
  
        <div class="col-md-3">
  <p id="data2"><?php

include("soil_graph.php")
 ?>
   
 </p>
  

</div>  
      </div>
<!-----secondlayer---------->





</div> <!---------endrow-------->


              
          
</div><!---------endcol9-------->

</head>
<body>

</body>
<script>
    window.onload = function() {
            loaddata();
            loadsoildata();
        };
    function loaddata(){
        var url = "read_all.php";
        $.getJSON(url, function(data) {
                    var val= data;
                   // console.log(val.weather[0].hum);
                  var humid=(data['weather'][(Object.keys(data['weather']).length)-1]['hum']);
                   var temper=(data['weather'][(Object.keys(data['weather']).length)-1]['temp']);
                   document.getElementById("temperature").innerHTML = "<img src = 'temperature.png' height=\"60px\" width=\"60px\" style='vertical-align: middle' />  " +temper;
                   document.getElementById("humidity").innerHTML = "<img src = 'humidity.png' height=\"60px\" width=\"60px\" style='vertical-align: middle' />  "+humid;
         // console.log(data['weather'][(Object.keys(data['weather']).length)-1]['temp']);
        });
            
        }
function loadsoildata(){
        var url = "read_all_soil.php";
        $.getJSON(url, function(data) {
                    var val= data;
                  //  console.log(data);
                   // console.log(val.weather[0].hum);
                  var soil=(data['soil'][(Object.keys(data['soil']).length)-1]['soil_value']);
                  // var temper=(data['weather'][(Object.keys(data['weather']).length)-1]['temp']);
                  document.getElementById("soil_data").innerHTML ="<p>Soil Sensor Value : </p>" +soil;
                  // document.getElementById("humidity").innerHTML = "<img src = 'humidity.png' height=\"60px\" width=\"60px\" style='vertical-align: middle' />  "+humid;
         // console.log(data['weather'][(Object.keys(data['weather']).length)-1]['temp']);
        });
            
        }



        window.setInterval(function(){
        loaddata();
        loadsoildata();
            }, 5000);
  
  </script>
</html>