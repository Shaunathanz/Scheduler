<?php

$conn = mysqli_connect("localhost", "root", "", "scheduler");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)
$Fullname =  $_REQUEST['Fullname'];
$email = $_REQUEST['email'];
$password =  $_REQUEST['password'];
$subject = $_REQUEST['subject'];
$gender = $_REQUEST['gender'];
$comment = $_REQUEST['comment'];


// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO tutor  VALUES ('','$Fullname', '$email','$password','$subject','$comment','$gender','')";

if(mysqli_query($conn, $sql)){
    echo "<h3>data stored in a database successfully."
    . " Please browse your localhost php my admin"
    . " to view the updated data</h3>";

    echo nl2br("\n$Fullname\n $email\n " . "$password\n $subject\n $comment \n $gender");
} else{
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>