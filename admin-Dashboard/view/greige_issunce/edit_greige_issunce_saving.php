<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$greige_issunce_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['greige_issunce_id'])));
	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

	$custom_date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$received_quantity = mysqli_real_escape_string($con, stripslashes(trim($_POST['received_quantity'])));
	$yarn_count_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp'])));
	$yarn_count_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft'])));
	$thread_epi = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi'])));
	$thread_ppi = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi'])));
	$gsm = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_count_warp'])));

	$fiber_total_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester'])));
	$fiber_total_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton'])));
	$fiber_total_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired'])));
	$fiber_total_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth'])));

	$fiber_warp_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester'])));
	$fiber_warp_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton'])));
	$fiber_warp_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired'])));
	$fiber_warp_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth'])));
  
	$fiber_weft_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester'])));
	$fiber_weft_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton'])));
	$fiber_weft_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired'])));
	$fiber_weft_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth'])));

	$width = mysqli_real_escape_string($con, stripslashes(trim($_POST['width'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));
	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));

	$previous_active = 0;
	$new_active = 1;

	if (($greige_issunce_id == '') || (empty($greige_issunce_id)) || is_null($greige_issunce_id) || ($pp_no_id == '') || (empty($pp_no_id)) || is_null($pp_no_id) || ($pp_details_id == '') 
		|| (empty($pp_details_id)) || is_null($pp_details_id) 
		|| ($custom_date == '') || (empty($custom_date)) || is_null($custom_date) || ($received_quantity == '') || (empty($received_quantity))
		|| is_null($received_quantity) || ($yarn_count_warp == '') || (empty($yarn_count_warp)) || is_null($yarn_count_warp) || 
		($yarn_count_weft == '') || (empty($yarn_count_weft)) || is_null($yarn_count_weft) || ($thread_epi == '') ||
		(empty($thread_epi)) || is_null($thread_epi) || ($thread_ppi == '') || (empty($thread_ppi)) || is_null($thread_ppi) 
		|| ($gsm == '') || (empty($gsm)) || is_null($gsm) || ($width == '') || (empty($width)) || is_null($width) ) 
	{
	   echo "No data found";
	}

	else
	{

		$another_update_sql_statement = "UPDATE `greige_receiving_process_info` 
								    SET `active`= '$previous_active',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `greige_issunce_id` = '$greige_issunce_id'
								  	AND `pp_no_id` = '$pp_no_id'
								  	AND `pp_details_id` = '$pp_details_id'";

		mysqli_query($con, $another_update_sql_statement) or die(mysqli_error($con));

	    $insert_sql_statement = "INSERT INTO `greige_receiving_process_info` 
                                 ( 
                                  `greige_issunce_id`,
                                  `pp_no_id`, 
                                  `pp_details_id`, 
                                  `custom_date`,
                                  `received_quantity`,
                                  `yarn_warp`,
                                  `yarn_weft`,
                                  `thread_epi`,
                                  `thread_ppi`,
                                  `gsm`,
                                  `fiber_total_polyester`,
                                  `fiber_total_cotton`,
                                  `fiber_total_thired`,
                                  `fiber_total_fourth`,
                                  `fiber_warp_polyester`,
                                  `fiber_warp_cotton`,
                                  `fiber_warp_thired`,
                                  `fiber_warp_fourth`,
                                  `fiber_weft_polyester`,
                                  `fiber_weft_cotton`,
                                  `fiber_weft_thired`,
                                  `fiber_weft_fourth`,
                                  `width`,
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
                                  '$greige_issunce_id',
                                  '$pp_no_id', 
                                  '$pp_details_id', 
                                  '$custom_date',
                                  '$received_quantity',
                                  '$yarn_count_warp',
                                  '$yarn_count_weft',
                                  '$thread_epi',
                                  '$thread_ppi',
                                  '$gsm',
                                  '$fiber_total_polyester',
                                  '$fiber_total_cotton',
                                  '$fiber_total_thired',
                                  '$fiber_total_fourth',
                                  '$fiber_warp_polyester',
                                  '$fiber_warp_cotton',
                                  '$fiber_warp_thired',
                                  '$fiber_warp_fourth',
                                  '$fiber_weft_polyester',
                                  '$fiber_weft_cotton',
                                  '$fiber_weft_thired',
                                  '$fiber_weft_fourth',
                                  '$width',
                                  '$status',
                                  '$remarks',
                                  '$new_active',
                                  '$edfms_logged_user_id', 
                                  '$edfms_logged_first_name $edfms_logged_last_name', 
                                  NOW(), 
                                  '$edfms_logged_user_id', 
                                  NOW() 
                                 )";

	    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
	    
	    if(mysqli_affected_rows($con) <> 1)
	    {
	        echo $data_insertion_hampering = 'greige_issunce No';
	    }
	    else
	    {
	    	echo $last_id = mysqli_insert_id($con);
	    }
		
	}
?>