<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$process_name = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_name'])));

	if (($process_name == '') || (empty($process_name)) || is_null($process_name)) 
	{
	   echo "Input process_name Name";
	   exit();
	}

	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `process_name` WHERE `process_name` = '$process_name'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "process_name Name Already Exists";
	   exit();
	}

	else
	{ 
	 	
		$insert_sql_statement = "INSERT INTO `process_name` 
                             ( 
                              `process_name`
                             ) 
                        VALUES 
                             ( 
                              '$process_name'
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
		
	}
?>