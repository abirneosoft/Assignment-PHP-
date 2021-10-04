


<div class="list-group">

<?php

$email=$_SESSION['sid'];
if(is_dir("user/$email")){
  $file = fopen("user/$email/detail.txt","r");
  $data=json_decode(fgets($file));

echo $data->name."<br>";

 
}
$fo=fopen("user/".$email."/detail.txt","r");
$data=json_decode(fgets($fo));
   


$mail=$data->email;
$password=$data->password;
$name=$data->name;
$age=$data->age;
$gen=$data->gender;

?>
<?php
    if(isset($_POST['sub'])){
        $tmp=@$_FILES['att']['tmp_name'];
        $fname=@$_FILES['att']['name'];
        
        $ext = pathinfo($fname,PATHINFO_EXTENSION );
        $fn="img-".rand()."-".time().".$ext";
        if(!empty($tmp)){
            $dest="user/$email/$fn";
            if(move_uploaded_file($tmp,$dest))
            {
                echo "upload success";
                @unlink("'user/'.$email.'/detail.txt'");
                $f=fopen("user/".$email."/detail.txt","w");
                $data1=json_encode(["email"=>"$mail","password"=>"$password","name"=>$name,"age"=>$age,"gender"=>$gen,"image"=>$dest]);
                
                fwrite($f,$data1);
                header("location:dashboard.php");
                
            }
            else{
                echo "upload error";
            }
        }
        
      else{
        echo "plz  attach File";
    }
}




?>
<img src="<?php echo $data->image;?>" alt="">

</div>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleFormControlFile1">Change Image</label>
    <input type="file" class="form-control-file"  name="att"><button name="sub">Submit</button>
  </div>

</form>

  