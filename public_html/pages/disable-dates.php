<?php
require_once '../scripts/initialize.php';
$tutorid = $_REQUEST['tutorid'];
$disable_dates = $_REQUEST['disable_dates'];
$sql = "UPDATE tutor SET disable_dates='".$disable_dates."' WHERE id='".$tutorid."' ";
$result = mysqli_query($db, $sql);
echo "sucess";
die();


?>