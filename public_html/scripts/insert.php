<?php
 require_once '../scripts/initialize.php';

 // Taking all 5 values from the form data(input)
$Fullname =  $_REQUEST['Fullname'];
$email = $_REQUEST['email'];
$password =  $_REQUEST['password'];

//$sql = "INSERT INTO tutor  VALUES (NULL,'$Fullname', '$email','$password','')";
if (!insert_user($Fullname, $email, $password, '')){
    echo 'There was an error running query';
} else {
    echo 'Profile created successfully!';
}
header("Refresh: 1.5; URL=../index.php");
?>