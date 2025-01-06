<?php
session_start();
require_once('../includes/db_session_chk.php');

$route_serial = $_POST['serial'];

$sql = "SELECT * FROM route WHERE route_id = '$route_serial' ";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

$res .= "<option value='".$row['route_id']."'>";    
$res .= $row['route_name'];    
$res .= "</option>";    

echo $res;
?>