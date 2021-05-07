<?php
require_once '../scripts/initialize.php';
$_id = $_GET['id'];
$_status = $_GET['status'];
$sql = "UPDATE appointment SET status='".$_status."' WHERE id='".$_id."' ";
$result = mysqli_query($db, $sql);
echo "sucess";
die();


?>