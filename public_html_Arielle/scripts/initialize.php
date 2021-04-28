<?php
  require_once('functions.php');
  require_once('database.php');
  require_once('query_functions.php');
  require_once('validation_functions.php');

  $db = db_connect();
  $errors = array();
  $config = array();
?>
