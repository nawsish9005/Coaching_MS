<?php
session_start();
require_once('../includes/db_session_chk.php');

$route_serial = $_POST['serial'];

$sql = "SELECT * FROM process_name WHERE process_id = '$route_serial' ";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

$res .= "<option value='".$row['process_id']."'>";    
$res .= $row['process_name'];    
$res .= "</option>";    

echo $res;
?>