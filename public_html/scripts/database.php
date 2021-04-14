<?php

  function db_connect() {
    try {
      require_once('db_credentials.php');
      $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    } catch (Exception $e) {
      require_once('db_credentials2.php');
      $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    } finally {
      confirm_db_connect();
      return $connection;
    }
  }

  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }
?>
