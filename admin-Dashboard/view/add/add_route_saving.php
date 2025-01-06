<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$route = mysqli_real_escape_string($con, stripslashes(trim($_POST['route'])));

	if (($route == '') || (empty($route)) || is_null($route)) 
	{
	   echo "Input Route Name";
	   exit();
	}

	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `route` WHERE `route_name` = '$route'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "Route Name Already Exists";
	   exit();
	}

	else
	{ 
	 	
		$insert_sql_statement = "INSERT INTO `route` 
                             ( 
                              `route_name`
                             ) 
                        VALUES 
                             ( 
                              '$route'
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