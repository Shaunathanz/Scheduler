<?php
    require_once 'initialize.php';

    session_start();
    $email = $_POST['email'];
    $name = $_POST['FullName'];
    //password here
    $user['name'] = $name;
    $user['email'] = $email;
    $user['password'] = $_SESSION['activeUser']['password'];
    $user['img'] = $_SESSION['activeUser']['img'];
    $user['id'] = $_SESSION['activeUser']['id'];
    update_user($user);
    echo "Profile updated!";
    header("Refresh: 1; URL=logout.php");
    //$db->query($sql);
?>