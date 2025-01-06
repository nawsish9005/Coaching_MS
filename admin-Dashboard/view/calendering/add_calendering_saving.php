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
	$machine = mysqli_real_escape_string($con, stripslashes(trim($_POST['machine'])));
	$face_back = mysqli_real_escape_string($con, stripslashes(trim($_POST['face_back'])));
	
	$trf = mysqli_real_escape_string($con, stripslashes(trim($_POST['trf'])));

	$cf_rubbing_dry = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_dry'])));
	$cf_rubbing_wet = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_wet'])));
	$wash_dry_warp_before_iron = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_before_iron'])));
	$wash_dry_weft_before_iron = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_before_iron'])));
	$wash_dry_warp_after_iron = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_after_iron'])));
	$wash_dry_weft_after_iron = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_after_iron'])));

	$dry_cleaning_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_warp'])));
	$dry_cleaning_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_weft'])));

	$yarn_count_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp'])));
	$yarn_count_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft'])));

	$number_thread_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_warp'])));
	$number_thread_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_weft'])));

	$mass_per_unit_per_area = mysqli_real_escape_string($con, stripslashes(trim($_POST['mass_per_unit_per_area'])));

	$surface_pilling = mysqli_real_escape_string($con, stripslashes(trim($_POST['surface_pilling'])));

	$tensile_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp'])));
	$tensile_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft'])));

	$tear_force_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp'])));
	$tear_force_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft'])));

	$seam_strength_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_warp'])));
	$seam_strength_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_weft'])));




	$seam_resistance_method1_warp_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_value'])));
	$seam_resistance_method1_warp_remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_remarks'])));
	$seam_resistance_method1_weft_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_value'])));
	$seam_resistance_method1_weft_remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_remarks'])));
	$seam_resistance_method2_warp_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_value'])));
	$seam_resistance_method2_warp_remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_remarks'])));
	$seam_resistance_method2_weft_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_value'])));
	$seam_resistance_method2_weft_remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_remarks'])));

	$hand_feel = mysqli_real_escape_string($con, stripslashes(trim($_POST['hand_feel'])));
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

		$insert_pp_details_statement = "INSERT INTO `calendering`
		                                 (
		                                  `route_issue_id`,
		                                  `date`,
		                                  `b_batcher`,
		                                  `a_batcher`,
		                                  `p_width`,
		                                  `p_qty`,
		                                  `s_or_e`,
		                                  `machine`,
		                                  `face_back`,

		                                  `cf_rubbing_dry`,
		                                  `cf_rubbing_wet`,


		                                  `wash_dry_warp_before_iron`,
		                                  `wash_dry_weft_before_iron`,
		                                  `wash_dry_warp_after_iron`,
		                                  `wash_dry_weft_after_iron`,
		                                  `dry_cleaning_warp`,
		                                  `dry_cleaning_weft`,
		                                  `yarn_count_warp`,
		                                  `yarn_count_weft`,
		                                  `number_thread_warp`,
		                                  `number_thread_weft`,
		                                  `mass_per_unit_per_area`,

		                                  `surface_pilling`,
		                                  `tensile_warp`,
		                                  `tensile_weft`,
		                                  `tear_force_warp`,
		                                  `tear_force_weft`,
		                                  `seam_strength_warp`,
		                                  `seam_strength_weft`,
		                                



		                                  `seam_resistance_method1_warp_value`,
		                                  `seam_resistance_method1_warp_remarks`,
		                                  `seam_resistance_method1_weft_value`,
		                                  `seam_resistance_method1_weft_remarks`,
		                                  `seam_resistance_method2_warp_value`,
		                                  `seam_resistance_method2_warp_remarks`,
		                                  `seam_resistance_method2_weft_value`,
		                                  `seam_resistance_method2_weft_remarks`,

		                                  `hand_feel`,
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
		                                  '$machine',
		                                  '$face_back',

		                                  '$cf_rubbing_dry',
		                                  '$cf_rubbing_wet',


		                                  '$wash_dry_warp_before_iron',
		                                  '$wash_dry_weft_before_iron',
		                                  '$wash_dry_warp_after_iron',
		                                  '$wash_dry_weft_after_iron',
		                                  '$dry_cleaning_warp',
		                                  '$dry_cleaning_weft',
		                                  '$yarn_count_warp',
		                                  '$yarn_count_weft',
		                                  '$number_thread_warp',
		                                  '$number_thread_weft',
		                                  '$mass_per_unit_per_area',

		                                  '$surface_pilling',
		                                  '$tensile_warp',
		                                  '$tensile_weft',
		                                  '$tear_force_warp',
		                                  '$tear_force_weft',
		                                  '$seam_strength_warp',
		                                  '$seam_strength_weft',





		                                  '$seam_resistance_method1_warp_value',
		                                  '$seam_resistance_method1_warp_remarks',
		                                  '$seam_resistance_method1_weft_value',
		                                  '$seam_resistance_method1_weft_remarks',
		                                  '$seam_resistance_method2_warp_value',
		                                  '$seam_resistance_method2_warp_remarks',
		                                  '$seam_resistance_method2_weft_value',
		                                  '$seam_resistance_method2_weft_remarks',

		                                  '$hand_feel',
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
