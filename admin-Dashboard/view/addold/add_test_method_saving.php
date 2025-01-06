<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$testname = mysqli_real_escape_string($con, stripslashes(trim($_POST['testname'])));
	$name_ID = mysqli_real_escape_string($con, stripslashes(trim($_POST['testmethod'])));
	$Lab = mysqli_real_escape_string($con, stripslashes(trim($_POST['Lab'])));
	if (($testname == '') || (empty($testname)) || is_null($testname)) 
	{
	   echo "Input Name";
	   exit();
	}

	//check duplicate
	$sql_for_duplicate = "SELECT `testmethod`, `testName` FROM `savetestnames` WHERE `testmethod` = '$name_ID'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "Test Method & Test Name Already Exists";
	   exit();
	}

	else
	{ 	 	
		$insert_sql_statement = "INSERT INTO `savetestnames` 
                             ( `TestName`,
                             `testmethod`,
                             `criteria`
                             ) 
                        VALUES 
                             ('$testname',
                      		'$name_ID',                 
                              '$Lab'                      
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