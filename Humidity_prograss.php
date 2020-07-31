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
      <div class="container ">
        <div class="row align-items-center">
         
            <div
              class="round"
              data-value="0.8"
              data-size="160"
              data-thickness="4"
            >
              <strong></strong>
            </div>
          
          
        </div>
      </div>
   
    </div>
   
   

    <script>
       var  prograssvalue;

      window.onload = function() {
            loaddatatoprogress();
            
        };
     



    function loaddatatoprogress(){
        var url = "read_all.php";
        $.getJSON(url, function(data) {
                    var val= data;
                  
                  var humid=(data['weather'][(Object.keys(data['weather']).length)-1]['hum']);
                 
                 return prograssvalue = humid/100;
                // console.log(humid);
         
        });
            
        }

        function CircleBar(e) {
           loaddatatoprogress();
    $(e)
     .circleProgress({ fill: { color: "#00EAFF" } })
     .on("circle-animation-progress", function(_event, _progress, stepValue) {
      $(this)
        .find("strong")
        .text(String(parseInt(100 * prograssvalue)) + "%");
    });
}
CircleBar(".round");

         window.setInterval(function(){
        loaddata();
       
            }, 5000);

    </script>

  </body>
</html>