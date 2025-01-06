<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$yarn_count_warp_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp_value'])));
	$yarn_count_weft_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft_value'])));
	$yarn_count_warp_ply = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp_ply'])));
	$yarn_count_weft_ply = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft_ply'])));
	$yarn_count_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp_unit'])));
	$yarn_count_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft_unit'])));
	$thread_count_warp_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_count_warp_value'])));
	$thread_count_weft_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_count_weft_value'])));
	$thread_count_warp_insertion = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_count_warp_insertion'])));
	$thread_count_weft_insertion = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_count_weft_insertion'])));
	

	if ( ($yarn_count_warp_value == '') || (empty($yarn_count_warp_value)) || is_null($yarn_count_warp_value) || 
		($yarn_count_weft_value == '') || (empty($yarn_count_weft_value)) || is_null($yarn_count_weft_value) ||
		($thread_count_warp_value == '') || (empty($thread_count_warp_value)) || is_null($thread_count_warp_value) || 
		($thread_count_weft_value == '') || (empty($thread_count_weft_value)) || is_null($thread_count_weft_value) ) 
	{
	   echo "Missing Value";
	   exit();
	}

	//check duplicate
	// $sql_for_duplicate = "SELECT * FROM `construction` WHERE `construction_name` = '$construction'";
	// $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	// $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	// if ($row_for_duplicate >= 1) 
	// {
	//    echo "construction Name Already Exists";
	//    exit();
	// }

	// else
	// { 
	 	
		$insert_sql_statement = "INSERT INTO `construction_for_version` 
                             (  `warp_yarn_count`, 
								`weft_yarn_count`, 
								`no_of_ply_for_warp_yarn`, 
								`no_of_ply_for_weft_yarn`, 
								`uom_of_warp_yarn`, 
								`uom_of_weft_yarn`, 
								`no_of_threads_per_inch_in_warp`, 
								`no_of_threads_per_inch_in_weft`, 
								`warp_insertion`, 
								`weft_insertion`
                              
                             ) 
                        VALUES 
                             ( 
                              '$yarn_count_warp_value',
                              '$yarn_count_weft_value',
                              '$yarn_count_warp_ply',
                              '$yarn_count_weft_ply',
                              '$yarn_count_warp_unit',
                              '$yarn_count_weft_unit',
                              '$thread_count_warp_value',
                              '$thread_count_weft_value',
                              '$thread_count_warp_insertion',
                              '$thread_count_weft_insertion'
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