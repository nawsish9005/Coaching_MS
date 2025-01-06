<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");
// if(isset($_POST["action"]))
// {
//  $output = '';
//  if($_POST["action"] == "pp_no_id_model")
//  {
//   $query_change = $_POST["query"];
//   $query = "SELECT version, pp_no_id, pp_id FROM pp_details WHERE pp_no_id = '$query_change' AND active = '1'  GROUP BY version";
//   $result = mysqli_query($con, $query);
//   $output .= '<option value="" selected="selected">Select PP Version</option>';
//   while($row = mysqli_fetch_array($result))
//   {
//    $output .= '<option value="'.$row["pp_id"].'">'.$row["version"].'</option>';
//   }
//  }
//  echo $output;
// }



if(isset($_POST["action"]))
{
	$output = '';

	if($_POST["action"] == "customers_model")
	{
		$query_change = $_POST["query"]; 
		$query = "SELECT DISTINCT design FROM pp WHERE customers = '$query_change' ";
		$result = mysqli_query($con, $query);
		$output .= '<option value="" selected="selected">Select Design</option>';
		while($row = mysqli_fetch_array($result))
		{
		$output .= '<option value="'.$row["design"].'">'.$row["design"].'</option>';
		}
	}

	if($_POST["action"] == "design_id")
	{
		$query_change = $_POST["query"];
		$query = "SELECT pp_details.* FROM pp_details, pp WHERE pp.design = '$query_change' AND pp.pp_id = pp_details.pp_no_id ";
		$result = mysqli_query($con, $query);
		$output .= '<option value="">Select Version</option>';
		while($row = mysqli_fetch_array($result))
		{
			  $pp_color = $row['color'];

	          $color_sql = "SELECT * FROM color WHERE color_id = '$pp_color' ";
	          $color_res = mysqli_query($con, $color_sql) or die(mysqli_error($con));
	          $color_row = mysqli_fetch_assoc($color_res);
	          
			$output .= '<option value="'.$row["pp_id"].'">'.'Version:'.$row["version"].', Color:'.$color_row["color_name"].', Width:'.$row["gray_width"].'</option>';
		}
	}
	echo $output;
}
?>