<?php
 require_once 'db.php';
 $displayname=$_POST["name"];
 $email=$_POST["email"];
 $password=$_POST["password"];
 $password_conf=$_POST["pass_conf"];
 $submit=$_POST["do-redister"];

 if($password !=$password_conf){
    echo"wrong";
 }
 else{
  echo "wrong";
    
 }

 $register=mysqli_query($db,"INSERT INTO user(display-name,email,password) VALUES(' $displayname',' $email','$password')");
   if(register){
    echo"done";
   }else{
    echo"failed";
   }
 ?>
