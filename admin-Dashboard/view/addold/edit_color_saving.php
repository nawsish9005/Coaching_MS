<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$color = mysqli_real_escape_string($con, stripslashes(trim($_POST['color'])));
	$color_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['color_id'])));

	if (($color == '') || (empty($color)) || is_null($color)) 
	{
	   echo "Input Color Name";
	   exit();
	}

	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `color` WHERE `color_name` = '$color'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "Color Name Already Exists";
	   exit();
	}
	else
	{ 
	 	
		$insert_sql_statement = "UPDATE `color` SET `color_name`='$color' WHERE `color_id`='$color_id'";

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