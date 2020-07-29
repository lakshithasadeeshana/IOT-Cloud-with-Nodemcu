<?php 
require_once('connection.php');
session_start();
    if(isset($_POST['Register']))
    {
       if(empty($_POST['email']) || empty($_POST['password']))
       {
            header("location:register.php?Empty= Please Fill in the Blanks");
       }
       else
       {

           $email = $_POST['email'];
           $pass1 = $_POST['password'];
           $pass = md5($pass1);
          $pass2 = $_POST['password2'];

            if($pass1==$pass2){

             $query="insert into login(email , password) values ('$email', '$pass')";
            mysqli_query($con,$query);
            header("location:index.php");

            }else{
              header("location:register.php?Match= Password Not Match");

            }

            
        
       }
    }
    else
    {
        echo 'Not Register';
    }

?>