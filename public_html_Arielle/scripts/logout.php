<?php
    require_once 'initialize.php';

    session_start();
    $_SESSION["activeUser"] = array();
    echo "You have logged out successfully!";
    header("Refresh: 1.5; URL=../index.php");
?>