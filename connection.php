<?php

    $con=mysqli_connect('localhost','root','','naturalfarm');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>