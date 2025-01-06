<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");
if(isset($_POST["greige_standard_id"]))
{
 	$greige_standard_id = $_POST["greige_standard_id"];
 	$sql = "SELECT * FROM gray_variable WHERE gray_variable_id = '$greige_standard_id' AND active = '1' ";
 	$res = mysqli_query($con, $sql);
 	//$row = mysqli_fetch_assoc($res);
 	$row = mysqli_fetch_array($res);

 	//while($row = mysqli_fetch_array($res))
	// {
	//   $data["gray_variable_id"] = $row["gray_variable_id"];
	//   $data["pp_no_id"] = $row["pp_no_id"];
	//   $data["pp_details_id"] = $row["pp_details_id"];
	//   $data["yarn_warp_cond1"] = $row["yarn_warp_cond1"];
	//   $data["yarn_warp_value1"] = $row["yarn_warp_value1"];
	// }

    echo json_encode($row);
}
?>