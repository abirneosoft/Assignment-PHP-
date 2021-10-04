
<html>
    <head>
  
   </style>
    </head>
    <body >
    <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
    <a class="navbar-brand" href="#">Welcome :<?php echo $sid;?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home </a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link " href="register.php">Register</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link " href="?con=changepass">Change Password</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="logout.php">Logout</a>
      </li>

    </ul>
  </div>
</nav>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-50" src="image/a-01.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-50" src="image/background.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-50" src="image/background1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

       
  
    </body>
    
</html>