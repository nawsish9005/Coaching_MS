<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$test_name = mysqli_real_escape_string($con, stripslashes(trim($_POST['test_name'])));

	if (($test_name == '') || (empty($test_name)) || is_null($test_name)) 
	{
	   echo "Input Test  Name";
	   exit();
	}

	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `test_name` WHERE `test_name` = '$test_name'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "Name Already Exists";
	   exit();
	}

	else
	{ 
	 	
		$insert_sql_statement = "INSERT INTO `test_name` 
                             ( 
                              `test_name`
                             ) 
                        VALUES 
                             ( 
                              '$test_name'
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