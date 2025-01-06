<?php
session_start();
require_once('../includes/db_session_chk.php');

$password_change_hampering = "No";
$id 			= 	mysqli_real_escape_string($con, stripslashes(trim($_POST['pass_id'])));

$select_sql_statement = "SELECT * FROM `user_login` WHERE id = $id";
$result_sql_statement = mysqli_query($con, $select_sql_statement);
$row_sql_statement = mysqli_fetch_assoc($result_sql_statement);
$password_of_id = $row_sql_statement["password"];

$old_password	=	md5(mysqli_real_escape_string($con, trim($_POST['old_password'])));
$new_password	=	md5(mysqli_real_escape_string($con, trim($_POST['new_password'])));

mysqli_query($con, "BEGIN");
mysqli_query($con, "START TRANSACTION") or die(mysqli_error($con));

if($password_of_id == $old_password)
{
	$update_sql_statement = "UPDATE `user_login` 
								SET `password` = '$new_password',
							 	   	`modifying_person_id` = '$edfms_logged_user_id',
							 	   	`modification_time` = NOW()
							  WHERE id = '$id'";

	mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

	if(mysqli_affected_rows($con) <> 1)
	{
		$password_change_hampering = "Yes";
	}
}
else
{
	$password_change_hampering = "Yes";
}

if($password_change_hampering == "No")
{
	mysqli_query($con, "COMMIT");
	echo "Password is changed successfully.";
}
else
{
	mysqli_query($con, "ROLLBACK");
	echo "Password Change is failed!";
}

$obj->disconnection();
?>
