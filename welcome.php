<?php
    session_start();

    

?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  

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




<style type="text/css">
  
@import url('https://kit.fontawesome.com/a076d05399.js');

body{
  font-family: 'Roboto', sans-ser;
}

*{
  margin: 0;
  padding: 0;
  list-style: none;
  text-decoration: none;
}

.sidebar{
  position: relative;
  left: 0;

  width: 250px;
  height: 100%;
  background: #696969;
  
}




.sidebar ul a{

  display: block;
  height: 100%;
  width: 100%;
  line-height: 65px;
  font-size: 20px;
  color: white;
  padding-left: 40px;
  box-sizing: border-box;
  border-top: 1px solid rgba(255,255,255,1);
  border-bottom: 1px solid black;
}

ul li:hover a{
  padding-left: 50px;
}

.sidebar ul a i{
  margin-right: 16px;
}

</style>

<div class="back" style="background-color: #37AD70;">

  <!-------------------------------navbar---------------------------->

 <?php require('navbar.php');  ?>

<!--------------------------------navbar------------------------------>


<div class="row">

    <div class="col-md-3">
    <div class="sidebar">
  
    <ul>
      <li><a href="temperature_dashboard.php"><i class="fas fa-sun"></i>Humidity</a></li>
      <li><a href="#"><i class="fas fa-temperature-high"></i>Temperature</a></li>
      <li><a href="#"><i class="fas fa-stream"></i>Soil</a></li>
      <li><a href="#"><i class="fas fa-calender-week"></i>Co2 </a></li>
      
      <li><a href="#"><i class="fas fa-key"></i>Security</a></li>
      <li><a href="#"><i class="fas fa-sliders-h"></i>Setting</a></li>
      <li><a href="#"><i class="fas fa-question-circle"></i>About</a></li>
    </ul>
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
</div>
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