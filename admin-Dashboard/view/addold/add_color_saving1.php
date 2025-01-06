<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$color = mysqli_real_escape_string($con, stripslashes(trim($_POST['color'])));

	if (($color == '') || (empty($color)) || is_null($color)) 
	{
	   echo "Input Name";
	   exit();
	}

	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `testnames` WHERE `test_name` = '$color'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "Name Already Exists";
	   exit();
	}

	else
	{ 
	 	
		$insert_sql_statement = "INSERT INTO `testnames` 
                             ( 
                              `test_name`
                             ) 
                        VALUES 
                             ( 
                              '$color'
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