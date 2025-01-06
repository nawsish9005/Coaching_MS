<?php
session_start();
require_once('../includes/db_session_chk.php');

$res = "";
$color_id = $_POST['color_id'];
$version_id = $_POST['version_id'];

// ". if($row['color_id'] == $color_id) {echo 'selected';} ."

$sql = "SELECT * FROM color";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($result)) 
{
	if ($row['color_id'] == $color_id) 
	{
		$res .= "<option selected value='". $row['color_id'] ."'>";    
		$res .= $row['color_name'];    
		$res .= "</option>"; 
	}
	$res .= "<option value='". $row['color_id'] ."'>";    
	$res .= $row['color_name'];    
	$res .= "</option>";  
}

//echo $res;

$process = "";

$sql = "SELECT * FROM process";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));


while($row = mysqli_fetch_assoc($result)) 
{
  $process .= "<option value='".$row['process_id']."'>";    
  $process .= $row['process_name'];    
  $process .= "</option>";    
}

//for construction 
$construction = "";

$construction_sql = "SELECT * FROM construction";
$construction_result = mysqli_query($con, $construction_sql) or die(mysqli_error($con));


while($construction_row = mysqli_fetch_assoc($construction_result)) 
{

	  $yarn_count_warp_total = "";
      $yarn_count_weft_total = "";
      $thread_count_warp_insertion_total = "";
      $yarn_count_warp_total = "";

      $yarn_count_warp_ply = $construction_row['yarn_count_warp_ply'];
      $yarn_count_weft_ply = $construction_row['yarn_count_weft_ply'];
      $thread_count_warp_insertion = $construction_row['thread_count_warp_insertion'];
      $thread_count_weft_insertion = $construction_row['thread_count_weft_insertion'];

      if ($yarn_count_warp_ply == '1') 
      {
          $yarn_count_warp_total = $construction_row['yarn_count_warp_value'].".";
      }

      else
      {
          $yarn_count_warp_total = $construction_row['yarn_count_warp_value']."^".$construction_row['yarn_count_warp_ply'].".";
      }

      if ($yarn_count_weft_ply == '1') 
      {
          $yarn_count_weft_total = $construction_row['yarn_count_weft_value']."/";
      }

      else
      {
          $yarn_count_weft_total = $construction_row['yarn_count_weft_value']."^".$construction_row['yarn_count_weft_ply']."/";
      }



      if ($thread_count_warp_insertion == '1') 
      {
          $thread_count_warp_insertion_total = $construction_row['thread_count_warp_value'].".";
      }

      else
      {
          $thread_count_warp_insertion_total = $construction_row['thread_count_warp_value']."(".$construction_row['thread_count_warp_insertion'].").";
      }

      if ($thread_count_weft_insertion == '1') 
      {
          $thread_count_weft_insertion_total = $construction_row['thread_count_weft_value'];
      }

      else
      {
          $thread_count_weft_insertion_total = $construction_row['thread_count_weft_value']."(".$construction_row['thread_count_weft_insertion'].")";
      }

      $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;
      //$display = $construction_row['construction_id'];
	 $construction .= "<option value='".$construction_row['construction_id']."'>";    
	 $construction .= $display;    
	 $construction .= "</option>";    
}


//for version

$version = "";

$sql = "SELECT * FROM version";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($result)) 
{
	if ($row['version_id'] == $version_id) 
	{
		$version .= "<option selected value='". $row['version_id'] ."'>";    
		$version .= $row['version_name'];    
		$version .= "</option>"; 
	}
	$version .= "<option value='". $row['version_id'] ."'>";    
	$version .= $row['version_name'];    
	$version .= "</option>";  
}


//echo $process;

$final_result[] = array("color" => $res, "process" => $process, "construction" => $construction, "version" => $version);
// encoding array to json format
echo json_encode($final_result);


?>