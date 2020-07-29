<?php
require_once('connection.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


//Creating Array for JSON response
$response = array();
 
 
 // Fire SQL query to get all data from weather
 $query="select * from soil " ;
 $result=mysqli_query($con,$query);


 
// Check for succesfull execution of query and no results found
if (mysqli_num_rows($result) > 0) {
    
	// Storing the returned array in response
    $response["soil"] = array();
 
	// While loop to store all the returned response in variable
    while ($row = mysqli_fetch_array($result)) {
        // temperoary user array
        $soil = array();
        $soil["id"] = $row["id"];
        $soil["soil_value"] = $row["soil_value"];
		

		// Push all the items 
        array_push($response["soil"], $soil);
    }
    // On success
    $response["success"] = 1;
 
    // Show JSON response
    echo json_encode($response);
}	
else 
{
    // If no data is found
	$response["success"] = 0;
    $response["message"] = "No data on weather found";
 
    // Show JSON response
    echo json_encode($response);
}

?>