<?php
error_reporting(0);
require_once('../includes/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

date_default_timezone_set("Asia/Dhaka");

if(!(isset($_SESSION['edfms_first_name']) && isset($_SESSION['edfms_user_id']) && isset($_SESSION['edfms_password'])))
{
    header('Location: ../includes/logout.php');
}
else
{
	/********** Session variable saved in other variable **********/
	$edfms_logged_id 			= $_SESSION['edfms_id'];
	$edfms_logged_user_id 		= $_SESSION['edfms_user_id'];
    $edfms_logged_user_password = $_SESSION['edfms_password'];
    $edfms_logged_first_name 	= $_SESSION['edfms_first_name'];
    $edfms_logged_last_name 	= $_SESSION['edfms_last_name'];
    $edfms_logged_middle_name 	= $_SESSION['edfms_middle_name'];
    $edfms_logged_user_type 	= $_SESSION['edfms_user_type'];
    $edfms_logged_status 		= $_SESSION['edfms_status'];

	$sql_for_session_privilege = "SELECT * 
									FROM user_login 
								   WHERE user_id = '$edfms_logged_user_id' 
								     AND password = '$edfms_logged_user_password' 
								     AND status = 'Active'";
    $res_for_session_privilege = mysqli_query($con, $sql_for_session_privilege) or die(mysqli_error($con));

	if(mysqli_num_rows($res_for_session_privilege) < 1)
	{
	   	header('Location: ../includes/logout.php');
	}
}
?>