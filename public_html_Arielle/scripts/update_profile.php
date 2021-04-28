<?php
    require_once 'initialize.php';

    session_start();
    $email = $_POST['email'];
    $name = $_POST['FullName'];
    //password here
    //$sql = "UPDATE Tutor SET name = " . $name . ", email = " . $email . " WHERE Tutor.name = " . $_SESSION['activeUser']['name'] . " AND Tutor.email = " . $_SESSION['activeUser']['email'];;
    $user['name'] = $name;
    $user['email'] = $email;
    $user['phone'] = $_POST['phone'];
    $user['password'] = $_SESSION['activeUser']['password'];
    $user['img'] = $_SESSION['activeUser']['img'];
    $user['id'] = $_SESSION['activeUser']['id'];
    update_user($user,$_FILES);
	
    echo "Profile updated!";
    header("Refresh: 1; URL=logout.php");
    //$db->query($sql);
?>