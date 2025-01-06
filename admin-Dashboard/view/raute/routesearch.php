<?php
session_start();
require_once('../includes/db_session_chk.php');

$res = "";

$sql = "SELECT * FROM route ORDER BY route_name";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));


while($row = mysqli_fetch_assoc($result)) 
{
  $res .= "<option value='".$row['route_id']."'>";    
  $res .= $row['route_name'];    
  $res .= "</option>";    
}

echo $res;
?>