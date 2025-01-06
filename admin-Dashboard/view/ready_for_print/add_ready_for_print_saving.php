<?php
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$b_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['b_batcher'])));
	$a_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['a_batcher'])));
	$p_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_width'])));
	$p_qty = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_qty'])));
	$s_or_e = mysqli_real_escape_string($con, stripslashes(trim($_POST['s_or_e'])));

	$whiteness_left = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_left'])));
	$whiteness_center = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_center'])));
	$whiteness_right = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_right'])));

	$bowing_and_skew = mysqli_real_escape_string($con, stripslashes(trim($_POST['bowing_and_skew'])));

	// if (strpos($pilling, '-') !== false) 
	// {
	//     $test = explode("-",$pilling);
	// 	$pilling = ($test[0] + $test[1])/2;
	// }
	
	$ph_left = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_left'])));
	$ph_center = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_center'])));
	$ph_right = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_right'])));

	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));
	$complete = 1;

	// if($_POST['route_issue_id'] && $_POST['custom_date'] && $_POST['b_batcher'] && $_POST['a_batcher'] && $_POST['p_width'] && $_POST['p_qty'] && $_POST['s_or_e'] && $_POST['absorbency'] && $_POST['size'] && $_POST['whiteness'] && $_POST['pilling'] && $_POST['ph'] && $_POST['status'] && $_POST['remarks'])
	// {

		//echo "all data receive";
		$insert_sql_statement = "UPDATE `route_issue`
					    SET `complete` = '$complete',
					   		`modifying_person_id`= '$edfms_logged_user_id',
					   		`modification_time`= NOW()
					  WHERE `route_issue_id` = '$route_issue_id'";

	    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));

		$insert_pp_details_statement = "INSERT INTO `ready_for_print`
		                                 (
		                                  `route_issue_id`,
		                                  `date`,
		                                  `b_batcher`,
		                                  `a_batcher`,
		                                  `p_width`,
		                                  `p_qty`,
		                                  `s_or_e`,
		                                  `whiteness_left`,
		                                  `whiteness_center`,
		                                  `whiteness_right`,
		                                  `bowing_and_skew`,
		                                  `ph_left`,
		                                  `ph_center`,
		                                  `ph_right`,
		                                  `status`,
		                                  `remarks`,
		                                  `recording_person_id`,
		                                  `recording_person_name`,
		                                  `recording_time`,
		                                  `modifying_person_id`,
		                                  `modification_time`
		                                 )
		                            VALUES
		                                 (
		                                  '$route_issue_id',
		                                  '$date',
		                                  '$b_batcher',
		                                  '$a_batcher',
		                                  '$p_width',
		                                  '$p_qty',
		                                  '$s_or_e',
		                                  '$whiteness_left',
		                                  '$whiteness_center',
		                                  '$whiteness_right',
		                                  '$bowing_and_skew',
		                                  '$ph_left',
		                                  '$ph_center',
		                                  '$ph_right',
		                                  '$status',
		                                  '$remarks',
		                                  '$edfms_logged_user_id',
		                                  '$edfms_logged_first_name $edfms_logged_last_name',
		                                  NOW(),
		                                  '$edfms_logged_user_id',
		                                  NOW()
		                                 )";
		mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));

	    if(mysqli_affected_rows($con) <> 1)
	    {
	        echo $data_insertion_hampering = 'Not insert new bleaching';
	        exit();
	    }

	    else
	    {
	    	echo "Save Data Successfully";
	    }

	//}
?>
