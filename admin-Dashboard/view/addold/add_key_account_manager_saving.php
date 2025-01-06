<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$key_account_manager = mysqli_real_escape_string($con, stripslashes(trim($_POST['key_account_manager'])));
	$department = mysqli_real_escape_string($con, stripslashes(trim($_POST['department'])));
	$designation = mysqli_real_escape_string($con, stripslashes(trim($_POST['designation'])));
	$phone_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['phone_number'])));

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
	 	
		$insert_sql_statement = "INSERT INTO `key_account_manager` 
                             ( 
                              `key_account_manager_name`,
                              `department`,
                              `designation`,
                              `phone_number`
                             ) 
                        VALUES 
                             ( 
                              '$key_account_manager',
                              '$department',
                              '$designation',
                              '$phone_number'
                             )";

	    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
	    
	    if(mysqli_affected_rows($con) <> 1)
	    {
	        echo "Data Not Inserted";
	        exit();
	    }
	    else
	    {
	    	echo "Data Save Successfully";
	    	exit();
	    }
		
	//}
?>