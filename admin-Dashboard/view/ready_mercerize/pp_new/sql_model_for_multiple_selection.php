<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");

if(isset($_POST["action"]))
{
	$output = '';

	if($_POST["action"] == "customers_model_for_multiple_selection")
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

	if($_POST["action"] == "design_id_for_multiple_selection")
	{
		$query_change = $_POST["query"];
		$query = "SELECT DISTINCT pp_details.version FROM pp_details, pp WHERE pp.design = '$query_change' AND pp.pp_id = pp_details.pp_no_id ";
		$result = mysqli_query($con, $query);
		$output .= '<option value="">Select Version</option>';
		while($row = mysqli_fetch_array($result))
		{
		$output .= '<option value="'.$row["version"].'">'.$row["version"].'</option>';
		}
	}
	echo $output;
}
?>