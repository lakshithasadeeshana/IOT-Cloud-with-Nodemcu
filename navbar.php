

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Document</a>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php
if(isset($_SESSION['User']))
    {
        echo ' ' . $_SESSION['User'].'';
       
    }
    else
    {
        header("location:index.php");
    }

?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php?logout"> <?php
if(isset($_SESSION['User']))
    {
       
        echo 'Logout';
    }
    else
    {
        header("location:index.php");
    }?>
        

    </a>
        </div>
    
    </ul>
   
     
     <a href="logout.php?logout" > <button class="btn btn-outline-success my-2 my-sm-0" type="submit">


     <?php   if(isset($_SESSION['User']))
    {
       
        echo 'Logout';
    }
    else
    {
        header("location:index.php");
    }?>
      </a>  

    </button>
    
  </div>
</nav>
<br>