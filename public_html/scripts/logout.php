<?php
    require_once 'initialize.php';

    session_start();
    $_SESSION["activeUser"] = array();
    echo "You have logged out successfully!";
    header("Refresh: 2; URL=../index.php");
?>