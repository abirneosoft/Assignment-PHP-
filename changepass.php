

<!DOCTYPE html>

<?php
    $curErr=$corErr="";

    $fo=fopen("user/".$email."/detail.txt","r");
    $data=json_decode(fgets($fo));
       

    
    $mail=$data->email;
    $password=$data->password;
    $name=$data->name;
    $age=$data->age;
    $gen=$data->gender;
    $image=$data->image;
    
    if(isset($_POST['sub'])){
        $cr=$_POST['currentPassword'];
        $np=$_POST['newPassword'];
        $cp=$_POST['confirmPassword'];
        if(empty($cr) or empty($np) or empty($cp)){
            $curErr="plz enter valid password";
        }
        else{
            if($password!=$cr){
                $curErr="plz enter confirm password";
            }else{
        
            if($np==$cp){
               $corErr="changes success";
                @unlink("'user/'.$email.'/detail.txt'");
               $f=fopen("user/".$email."/detail.txt","w");
               $data=json_encode(["email"=>"$mail","password"=>"$np","name"=>$name,"age"=>$age,"gender"=>$gen,"image"=>$image]);
               
               fwrite($f,$data);
              header("location:dashboard.php");
              
            //  fwrite($f,$u1."\n".$np."\n".$g."\n".$a."\n");
            }
        }
        }

    }
?>
<html>
<head>
<title>Password Change</title>
<style>
    .required{
        color:red;
    }
</style>
</head>
<body>
<h3 align="center">CHANGE PASSWORD</h3><span id="currentPassword" class="required">* <?php echo $corErr;?></span>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="" align="center">
Current Password:<br>
<input type="password" name="currentPassword" id="cp"><span id="currentPassword" class="required">* <?php echo $curErr;?></span>
<br>
New Password:<br>
<input type="password" name="newPassword" id="np"><span id="newPassword" class="required">* <?php echo $curErr;?></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword" id="cp1"><span id="confirmPassword" class="required">* <?php echo $curErr;?></span>
<br><br>
<input type="submit" name="sub">
</form>
<br>
<br>
</body>
</html>