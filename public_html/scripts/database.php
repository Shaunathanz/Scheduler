<?php

  function db_connect() {
    require_once('db_credentials.php');
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME); //XAMPP DEFAULT
    if(!confirm_db_connect()) {
      $connection = mysqli_connect(DB_SERVER2, DB_USER2, DB_PASS2, DB_NAME2); //Shaun <-> Jason
    }
    confirm_db_connect();
    return $connection;
  }

  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      return false;
    }
    return true;
  }
?>
