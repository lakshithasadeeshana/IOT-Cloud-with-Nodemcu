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

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> 
    
   
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


</head>
<body> 


</body>
<script>
    window.onload = function() {
            loaddata();
           
        };
    function loaddata(){
        var url = "read_all.php";
        $.getJSON(url, function(data) {
                    var val= data;
                    console.log(val);
                  //var humid=(data['weather'][(Object.keys(data['weather']).length)-1]['hum']);
                  // var temper=(data['weather'][(Object.keys(data['weather']).length)-1]['temp']);
                  // document.getElementById("temperature").innerHTML = "<img src = 'temperature.png' height=\"60px\" width=\"60px\" style='vertical-align: middle' />  " +temper;
                  // document.getElementById("humidity").innerHTML = "<img src = 'humidity.png' height=\"60px\" width=\"60px\" style='vertical-align: middle' />  "+humid;
          //console.log(data['weather'][(Object.keys(data['weather']).length)-1]['temp']);
        });
            
        }




        
  
  </script>
</html>