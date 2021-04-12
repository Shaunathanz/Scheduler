<?php


require_once 'initialize.php';


$Fullname = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = $_POST['subject'];
$password = $_POST['comment'];
$password = $_POST['gender'];

$sql = "INSERT INTO tutor ($Fullname, $email, $Password, $subject, $comment, $gender)
    VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["password"]."','".$_POST["subject"]."','".$_POST["comment"]."','".$_POST["gender"]."')";


?>