<html>
  <?php
  include("cap.php");
  $emailErr=$Epass=$Ename=$Eage=$Egen=$Euname="";
  if(isset($_POST['submit'])){
    $mail=$_POST['email'];
    $pass=$_POST['password'];
    $u_name=$_POST['uname'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gen=@$_POST['gender'];

    $tmp=$_FILES['att']['tmp_name'];
    $fname=$_FILES['att']['name'];
        
    $ext = pathinfo($fname,PATHINFO_EXTENSION );
    $fn="img-".rand()."-".time().".$ext";
        
    $dest="user/$mail/".$fn;   
    
    if(empty($pass)){
      $Epass="plz enter password";
    }
    if(empty($u_name)){
      $Euname="plz enter username";
    }
    if(empty($name)){
      $Ename="plz enter name";
}
    if(empty($age)){
      $Eage="plz enter age";
    }
    if(empty($gen)){
      $Egen="plz enter gender";
    }
    

    if(empty($mail)){
        $emailErr= "plz enter empty field";
    }
    else{
    if(is_dir("user/".$mail)){
       $emailErr= "already registered";
    
    }
    else{
    if($_POST['cap']==$_POST['capsum'] && $age!='' && $u_name!='' && $name!='' && $gen!='' && $pass!=''){
      
       
       
      
    mkdir("user/".$mail);
    $f=fopen("user/".$mail."/detail.txt","w");
    $data=json_encode(["email"=>"$mail","password"=>"$pass","name"=>$name,"age"=>$age,"gender"=>$gen,"image"=>$dest]);
    fwrite($f,$data);
    // fwrite($f,$name."\n".$pass."\n".$gen."\n".$age."\n");
      
    move_uploaded_file($tmp,$dest);
    header("location:welcome.php?uid=$mail");
    

    

    }
    else{
      $emailErr="Invalid captcha";
    }
    
  }
}
if($emailErr=="" && $Ename=="" && $Euname=="" && $Epass=="" && $Eage=="" && $Egen==""){
  echo "success";
}

}

  ?>
    <head>
      <style>
        .error{
          color:red;
        }
      </style>
    <?php include("head.php") ;?>
    </head>
    <body>
   

   
    <div class="jumbotron bg-info">
  <h1 class="display-4 text-center">Register Panel</h1>
  
</div>
    
    
  <div class="container border border-warning bg-primary" style="width:700px;">
<form method="post" enctype="multipart/form-data">
    <h1>Register</h1>
  
    Email address <span class="error">* <?php echo $emailErr;?></span>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
    User name <span class="error">* <?php echo $Euname;?></span>
    <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
    
    Password <span class="error">* <?php echo $Epass;?></span>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    

    Name <span class="error">* <?php echo $Ename;?></span>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your name" name="name">
    
    Age <span class="error">* <?php echo $Eage;?></span>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Age" name="age">
    
    gender: 

    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="other" >
  <label class="form-check-label" for="inlineRadio3">Others</label>
   
</div>     <span class="error">* <?php echo $Egen;?></span>
<div class="form-group">
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" class="form-control-file"  name="att">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">captha <?php echo $pat; ?></label>
    <input type="text" class="form-control-file"  name="cap">
    <input type="hidden" class="form-control-file"  name="capsum" value="<?php echo $capsum; ?>">
    
  </div>

   
  <button type="submit" class="btn btn-dark" name="submit">submit</button>
  
</form>
</div>
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