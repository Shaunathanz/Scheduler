<?php

$conn = mysqli_connect("localhost", "ics325sp2115", "7544", "ics325sp2115");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)
$Fullname =  $_REQUEST['Fullname'];
$email = $_REQUEST['email'];
$password =  $_REQUEST['password'];



// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO tutor  VALUES (NULL,'$Fullname', '$email','$password','')";

if(mysqli_query($conn, $sql)){
    header("Refresh: 2; URL=../index.php");
}

// Close connection
mysqli_close($conn);

?>