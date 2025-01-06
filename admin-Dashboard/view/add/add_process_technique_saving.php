<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$process = mysqli_real_escape_string($con, stripslashes(trim($_POST['process'])));

	if (($process == '') || (empty($process)) || is_null($process)) 
	{
	   echo "Input Process Name";
	   exit();
	}

	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `process_technique_or_program_type` WHERE `process_technique_name` = '$process'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "Process Name Already Exists";
	   exit();
	}

	else
	{ 
	 	
		$insert_sql_statement = "INSERT INTO `process_technique_or_program_type` 
                             ( 
                              `process_technique_name`
                             ) 
                        VALUES 
                             ( 
                              '$process'
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