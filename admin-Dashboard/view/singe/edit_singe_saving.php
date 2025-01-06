<?php
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$singe_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['singe_id'])));

	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['batcher'])));
	$p_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_width'])));
	$p_qty = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_qty'])));
	$m_c_name = mysqli_real_escape_string($con, stripslashes(trim($_POST['m_c_name'])));
	$flame = mysqli_real_escape_string($con, stripslashes(trim($_POST['flame'])));
	$speed = mysqli_real_escape_string($con, stripslashes(trim($_POST['speed'])));
	$temp = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp'])));
	// $singe_quality = mysqli_real_escape_string($con, stripslashes(trim($_POST['singe_quality'])));
	$ph = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph'])));
	$visual_assessment = mysqli_real_escape_string($con, stripslashes(trim($_POST['visual_assessment'])));
	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));
	$complete = 1;
	$previous_active = 0;
	$new_active = 1;

    $insert_pp_details_statement = "UPDATE `singe`
							    SET `active`= '$previous_active',
							   		`modifying_person_id`= '$edfms_logged_user_id',
							   		`modification_time`= NOW()
							  WHERE `route_issue_id` = '$route_issue_id' AND singe_id = '$singe_id' ";
	 mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));


	$insert_pp_details_statement_again = "INSERT INTO `singe`
	                                 (
	                                  `route_issue_id`,
	                                  `date`,
	                                  `batcher`,
	                                  `p_width`,
	                                  `p_qty`,
	                                  `m_c_name`,
	                                  `flame`,
	                                  `speed`,
	                                  `temp`,
	                                  `ph`,
	                                  `visual_assessment`,
	                                  `status`,
	                                  `remarks`,
	                                  `active`,
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
	                                  '$batcher',
	                                  '$p_width',
	                                  '$p_qty',
	                                  '$m_c_name',
	                                  '$flame',
	                                  '$speed',
	                                  '$temp',
	                                  '$ph',
	                                  '$visual_assessment',
	                                  '$status',
	                                  '$remarks',
	                                  '$new_active',
	                                  '$edfms_logged_user_id',
	                                  '$edfms_logged_first_name $edfms_logged_last_name',
	                                  NOW(),
	                                  '$edfms_logged_user_id',
	                                  NOW()
	                                 )";
	mysqli_query($con, $insert_pp_details_statement_again) or die(mysqli_error($con));

    if(mysqli_affected_rows($con) <> 1)
    {
        echo $data_insertion_hampering = 'Not insert new bleaching';
        exit();
    }

    else
    {
    	echo "Save Data Successfully";
    }
?>
