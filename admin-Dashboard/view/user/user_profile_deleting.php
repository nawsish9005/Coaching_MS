<?php
session_start();
require_once('../includes/db_session_chk.php');

$data_delete_hampering = "No";
$image_delete_hampering = "No";
$error_msg = "";
$id = mysqli_real_escape_string($con, stripslashes(trim($_POST['id']))); 

$select_sql_statement = "SELECT * FROM `user_login` WHERE id = $id";
$result_sql_statement = mysqli_query($con, $select_sql_statement);
$row_sql_statement = mysqli_fetch_assoc($result_sql_statement);
$image_src_of_id = $row_sql_statement["image_src"];
$image_src_loc_of_id = "../../build/user_pic/".$row_sql_statement["image_src"];

mysqli_query($con, "BEGIN");
mysqli_query($con, "START TRANSACTION") or die(mysqli_error($con));

$delete_sql_statement = "DELETE FROM `user_login` 
						  WHERE id = '$id'";

mysqli_query($con, $delete_sql_statement) or die(mysqli_error($con));

if(mysqli_affected_rows($con) <> 1)
{
	$data_delete_hampering = "Yes";
}
else
{
	if($image_src_of_id != "default.png")
	{
		if(!unlink($image_src_loc_of_id))
		{
			$image_delete_hampering = "Yes";
		    $error_msg = "Sorry, there was an unknown error deleting your image file!";
		}
	}
}

if($data_delete_hampering == "No" && $image_delete_hampering == "Yes")
{
	mysqli_query($con, "COMMIT");
	echo "User profile is deleted. ".$error_msg;
}
else if($data_delete_hampering == "No" && $image_delete_hampering == "No")
{
	mysqli_query($con, "COMMIT");
	echo "User profile is deleted successfully.";
}
else
{
	mysqli_query($con, "ROLLBACK");
	echo "User profile delete is failed!";
}

$obj->disconnection();
?>
