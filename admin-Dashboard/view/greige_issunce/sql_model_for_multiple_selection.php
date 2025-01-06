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
		$query = "SELECT DISTINCT design FROM process_program_info WHERE customers = '$query_change' ";
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
		$query = "SELECT DISTINCT version_wise_process_program_info.version FROM version_wise_process_program_info, process_program_info WHERE process_program_info.design = '$query_change' AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id ";
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