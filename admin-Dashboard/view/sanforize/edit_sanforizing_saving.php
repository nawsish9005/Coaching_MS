<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$sanforizing_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['sanforizing_id'])));

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

	
	$insert_pp_details_statement = "UPDATE `sanforizing` 
								    SET `date`= '$date',
								   		`b_batcher`= '$b_batcher',
								   		`a_batcher`= '$a_batcher',
								   		`p_width`= '$p_width',
								   		`p_qty`= '$p_qty',
								   		`s_or_e`= '$s_or_e',

								   		`machine`= '$machine',
								   		`face_back`= '$face_back',

								   		  `cf_rubbing_dry` = '$cf_rubbing_dry',
		                                  `cf_rubbing_wet` = '$cf_rubbing_wet',
		                                  
		                                  `wash_dry_warp_before_iron` = '$wash_dry_warp_before_iron',
		                                  `wash_dry_weft_before_iron` = '$wash_dry_weft_before_iron',
		                                  `wash_dry_warp_after_iron` = '$wash_dry_warp_after_iron',
		                                  `wash_dry_weft_after_iron` = '$wash_dry_weft_after_iron',
		                                  `dry_cleaning_warp` = '$dry_cleaning_warp',
		                                  `dry_cleaning_weft` = '$dry_cleaning_weft',
		                                  `yarn_count_warp` = '$yarn_count_warp',
		                                  `yarn_count_weft` = '$yarn_count_weft',
		                                  `number_thread_warp` = '$number_thread_warp',
		                                  `number_thread_weft` = '$number_thread_weft',
		                                  `mass_per_unit_per_area` = '$mass_per_unit_per_area',



		                                  `surface_pilling` = '$surface_pilling',
		                                  `tensile_warp` = '$tensile_warp',
		                                  `tensile_weft` = '$tensile_weft',
		                                  `tear_force_warp` = '$tear_force_warp',
		                                  `tear_force_weft` = '$tear_force_weft',
		                                  `seam_strength_warp` = '$seam_strength_warp',
		                                  `seam_strength_weft` = '$seam_strength_weft',
		                                 

		                                  `durable_press` = '$durable_press',
		                                  `ironability` = '$ironability',


		                                  `seam_resistance_method1_warp_value` = '$seam_resistance_method1_warp_value',
		                                  `seam_resistance_method1_warp_remarks` = '$seam_resistance_method1_warp_remarks',
		                                  `seam_resistance_method1_weft_value` = '$seam_resistance_method1_weft_value',
		                                  `seam_resistance_method1_weft_remarks` = '$seam_resistance_method1_weft_remarks',
		                                  `seam_resistance_method2_warp_value` = '$seam_resistance_method2_warp_value',
		                                  `seam_resistance_method2_warp_remarks` = '$seam_resistance_method2_warp_remarks',
		                                  `seam_resistance_method2_weft_value` = '$seam_resistance_method2_weft_value',
		                                  `seam_resistance_method2_weft_remarks` = '$seam_resistance_method2_weft_remarks',  

								   		`hand_feel`= '$hand_feel',

								   		`status`= '$status',
								   		`remarks`= '$remarks',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `route_issue_id` = '$route_issue_id' AND sanforizing_id='$sanforizing_id' ";
	mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));

    if(mysqli_affected_rows($con) <> 1)
    {
        echo $data_insertion_hampering = 'Not insert new bleaching';
        exit();
    }

    else
    {
    	echo "Update Data Successfully";
    }
?>