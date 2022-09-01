<?php
$to_email = "hasib.aman8@gmail.com";
$subject = "Simple Email test via PHP";
$body = "Hi, this is a test email send form php to in 2022";
$header = "From: hasib.aman7@gmail.com";

if(mail($to_email,$subject,$body,$header)){
    echo "Email sent to $to_eamil Successfuly...!";
}else{
    echo "email sending failed";
}

?>