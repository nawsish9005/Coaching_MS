<?php
session_start();
require_once('../includes/db_session_chk.php');

$res = "";

$sql = "SELECT * FROM color ORDER BY color_id";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));


while($row = mysqli_fetch_assoc($result)) 
{
  $res .= "<option value='".$row['color_id']."'>";    
  $res .= $row['color_name'];    
  $res .= "</option>";    
}

echo $res;
?>



// $process = "";

// $sql = "SELECT * FROM process";
// $result = mysqli_query($con, $sql) or die(mysqli_error($con));


// while($row = mysqli_fetch_assoc($result)) 
// {
//   $process .= "<option value='".$row['process_id']."'>";    
//   $process .= $row['process_name'];    
//   $process .= "</option>";    
// }

// echo $process;

// $users_arr[] = array("color" => $color, "process" => $process);
// // encoding array to json format
//  echo json_encode($users_arr);