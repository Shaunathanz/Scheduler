<?php
    require_once 'initialize.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    if(has_valid_email_format($_POST['email'])) {
        $sql = "SELECT * FROM Tutor WHERE email='$email' AND password='$password'";
        $result = $db->query($sql);
        if (!$result) {
            die ('There was an error running query[' . $connection->error . ']');
        } else if ($result->num_rows == 0) {
            echo "Invalid username/password combination!";
            header("Refresh: 1.5; URL=../index.php");
        } else {
            echo "Login sucess!";
            session_start();
            $_SESSION["activeUser"] = $result->fetch_assoc();
            header("Refresh: 1.5; URL=../pages/tutor-home.php");
        }
    } else {
        echo "Please enter a valid email address!";
        header("Refresh: 1.5; URL=../index.php");
    }
?>