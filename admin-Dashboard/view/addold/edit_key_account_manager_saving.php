<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$key_account_manager = mysqli_real_escape_string($con, stripslashes(trim($_POST['key_account_manager'])));
	$designation = mysqli_real_escape_string($con, stripslashes(trim($_POST['designation'])));
	$department = mysqli_real_escape_string($con, stripslashes(trim($_POST['department'])));
	$phone_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['phone_number'])));
	$key_account_manager_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['key_account_manager_id'])));

	if (($key_account_manager == '') || (empty($key_account_manager)) || is_null($key_account_manager)) 
	{
	   echo "Input Key Account Manager Name";
	   exit();
	}

	//check duplicate
	// $sql_for_duplicate = "SELECT * FROM `key_account_manager` WHERE `key_account_manager_name` = '$key_account_manager'";
	// $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	// $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	// if ($row_for_duplicate >= 1) 
	// {
	//    echo "Key Account Manager Name Already Exists";
	//    exit();
	// }
	// else
	// { 
	 	
		$insert_sql_statement = "UPDATE `key_account_manager` SET `key_account_manager_name`='$key_account_manager', `designation`='$designation', `department`='$department', `phone_number` = '$phone_number' WHERE `key_account_manager_id`='$key_account_manager_id'";

	    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
	    
	    if(mysqli_affected_rows($con) <> 1)
	    {
	        echo "Data Not Inserted";
	        exit();
	    }
	    else
	    {
	    	echo "Update Successfully";
	    	exit();
	    }
		
	//}
?>