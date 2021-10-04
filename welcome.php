<html>
    <head>
    <?php include("head.php") ;?>
    </head>
    <body>

        
        

 <div class="jumbotron bg-info">
  <h1 class="display-4 text-center">Welcome user you are successfully registered</h1>
        <h4 class="text-center">Your registered id is <?php echo $_GET['uid'];?></h4>
        <p  class="text-center"> For go to login page <a href="login.php">click here</a> </p>
  
</div>

<?php include("foot.php");?>
    </body>
</html>