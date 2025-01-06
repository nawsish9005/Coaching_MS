<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$machine = mysqli_real_escape_string($con, stripslashes(trim($_POST['machine'])));
	$machine_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['machine_id'])));
	$route_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_id'])));

	if (($machine == '') || (empty($machine)) || is_null($machine)) 
	{
	   echo "Input Machine Name";
	   exit();
	}

	// //check duplicate
	// $sql_for_duplicate = "SELECT * FROM `machine` WHERE `machine_name` = '$machine'";
	// $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	// $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	// if ($row_for_duplicate >= 1) 
	// {
	//    echo "Machine Name Already Exists";
	//    exit();
	// }

	else
	{ 
	 	
		$insert_sql_statement = "UPDATE `machine` SET `machine_name`='$machine', `route_id`='$route_id' WHERE `machine_id`='$machine_id'";

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
		
	}
?>