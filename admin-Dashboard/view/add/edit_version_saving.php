<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$version = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'])));
	$version_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['version_id'])));

	if (($version == '') || (empty($version)) || is_null($version)) 
	{
	   echo "Input version Name";
	   exit();
	}

	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `version_name` WHERE `version_name` = '$version'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "version Name Already Exists";
	   exit();
	}
	else
	{ 
	 	
		$insert_sql_statement = "UPDATE `version_name` SET `version_name`='$version' WHERE `version_id`='$version_id'";

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