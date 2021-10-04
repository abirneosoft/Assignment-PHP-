<html>
<?php
    $error="";    
    if(isset($_POST['submit'])){
     $get_email=$_POST['email'];
     $get_pass=$_POST['password'];
      if(!empty($get_email) && !empty($get_pass)){

     if(is_dir("user/$get_email")){
         $f=fopen("user/$get_email/detail.txt","r");
        //  fgets($f);//1st 
        // $filepass=trim(fgets($f));//2nd
// print_r(fgets($f));
        $data=json_decode(fgets($f));
        $email=$data->email;
        $password=$data->password;

         if($get_email==$email and $get_pass==$password){
            echo "login success";
            session_start();
            $_SESSION['sid']=$email;
            
            if(!empty($_POST['rem'])){
              setcookie("email",$email,time()+3600);
              setcookie("pass",$password,time()+3600);
            }
            header("Location: dashboard.php");
            
         }
         else{
           $error="not register Mail id and password";
         }
     }
    }
     else {
      $error= "plz enter correct email and password";
     }
     
    }
    ?>
    <head>
      <script>
       function cook(){
         
           if("<?php echo $_COOKIE['email'];?>" !=undefined){
            if(document.getElementById("email").value=="<?php echo $_COOKIE['email'];?>"){
              document.getElementById("password").value="<?php echo $_COOKIE['pass']?>";
            }
            else{
              document.getElementById("password").value="";
            }
          }
        }
      </script>
    <?php include("head.php") ;?>
    
      <style>
        .error{
          color:red;
        }
      </style>
    </head>
    <body>

    <div class="jumbotron bg-info">
  <h1 class="display-4 text-center">Login Panel</h1>
  
</div>
    
  <div class="container border border-warning bg-secondary" style="width:700px;">
<form method="post">
    <h1>Login </h1><span class="error">* <?php echo $error;?></span> <br>
  
    Email address
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" onchange="cook()">
    
  
    Password
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
 
    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rem">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Login</button>
  <a href="register.php" class="">New User?</a>
</form>
</div>
<br><br><br><br>





<div class="footer-copyright">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 text-center bg-dark text-white ">
<p>Copyright  © 2021. All rights reserved.</p>
</div>
</div>
</div>
</div>
  

<?php include("foot.php");?>
    </body>
</html>