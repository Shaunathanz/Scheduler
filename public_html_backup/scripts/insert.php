<?php
 require_once '../scripts/initialize.php';

$Fullname =  $_REQUEST['Fullname'];
$email = $_REQUEST['email'];
$password =  $_REQUEST['password'];
//$img = $_REQUEST["img"]; TO DO

//name, email, password, img, subject
if (!insert_user($Fullname, $email, $password, '', $_REQUEST["subject"])) {
    echo 'There was an error running query';
} else {
    echo 'Profile created successfully!';
}
header("Refresh: 1.5; URL=../index.php");
?>