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
            header("Refresh: 2; URL=../index.php");
        } else {
            echo "Login sucess!";
            session_start();
            $row = $result->fetch_assoc(); //can be used in while loop if resut is multiple tuples
            $_SESSION["name"] = $row["name"];
            header("Refresh: 2; URL=../pages/tutor-home.php");
        }
    } else {
        echo "Please enter a valid email address!";
        header("Refresh: 2; URL=../index.php");
    }
?>