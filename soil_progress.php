<!DOCTYPE html>
<html lang="en">
  <head>
    
   
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.min.js"></script>
  </head>
  <body>
    <!-- Container containing all the elements -->
    <div class="circleBar">
     
     
    
      
      <!-- Container for circular progress bar -->
    
        <div class="row align-items-center">
         
            <div
              class="round"
              data-value="0.2"
              data-size="160"
              data-thickness="4"
            >
              <strong></strong>
            </div>
          
          
        </div>
      </div>
   
  
   
   

    <script>
       var  prograssvaluesoil;

      window.onload = function() {
            loadSoilProgress();
            
        };
     



    function loadSoilProgress(){
        var url = "read_all_soil.php";
        $.getJSON(url, function(data) {
                    var val= data;
                  
                  var soil=(data['soil'][(Object.keys(data['soil']).length)-1]['soil_value']);
                 
                return prograssvaluesoil = soil/1000;
                //console.log(soil);
         
        });
            
        }

        function CircleBar(e) {
            loadSoilProgress();
    $(e)
     .circleProgress({ fill: { color: "#54EADF" } })
     .on("circle-animation-progress", function(_event, _progress, stepValue) {
      $(this)
        .find("strong")
        .text(String(parseInt(100 * prograssvaluesoil)) + "%");
    });
}
CircleBar(".round");

         window.setInterval(function(){
       loadSoilProgress();
       
            }, 5000);

    </script>

  </body>
</html>