<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$curing_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['curing_id'])));

	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$b_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['b_batcher'])));
	$a_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['a_batcher'])));
	$p_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_width'])));
	$p_qty = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_qty'])));
	$s_or_e = mysqli_real_escape_string($con, stripslashes(trim($_POST['s_or_e'])));
	$total_quantity = mysqli_real_escape_string($con, stripslashes(trim($_POST['total_quantity'])));
	$time = mysqli_real_escape_string($con, stripslashes(trim($_POST['time'])));
	$temp = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp'])));

	$rubbing_dry = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry'])));
	$rubbing_wet = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet'])));

	$wash_dry_warp_before_iron = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_before_iron'])));
	$wash_dry_weft_before_iron = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_before_iron'])));
	$wash_dry_warp_after_iron = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_after_iron'])));
	$wash_dry_weft_after_iron = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_after_iron'])));

	$tensile_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp'])));
	$tensile_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft'])));

	$tear_force_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp'])));
	$tear_force_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft'])));

	$washing_ph = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph'])));
	$pilling = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling'])));

	$yarn_count_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp'])));
	$yarn_count_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft'])));
	$thread_epi = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi'])));
	$thread_ppi = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi'])));
	$gsm = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_count_warp'])));

	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));

	
	$insert_pp_details_statement = "UPDATE `curing` 
								    SET `date`= '$date',
								   		`b_batcher`= '$b_batcher',
								   		`a_batcher`= '$a_batcher',
								   		`p_width`= '$p_width',
								   		`p_qty`= '$p_qty',
								   		`s_or_e`= '$s_or_e',
								   		`total_quantity`= '$total_quantity',
								   		`time`= '$time',
								   		`temp`= '$temp',

								   		  `wash_dry_warp_before_iron`= '$wash_dry_warp_before_iron',
		                                  `wash_dry_weft_before_iron`= '$wash_dry_weft_before_iron',
		                                  `wash_dry_warp_after_iron`= '$wash_dry_warp_after_iron',
		                                  `wash_dry_weft_after_iron`= '$wash_dry_weft_after_iron',

		                                  `tensile_warp`= '$tensile_warp',
		                                  `tensile_weft`= '$tensile_weft',
		                                  `tear_force_warp`= '$tear_force_warp',
		                                  `tear_force_weft`= '$tear_force_weft',

		                                  `washing_ph`= '$washing_ph',
		                                  `pilling`= '$pilling',

		                                  `yarn_count_warp`= '$yarn_count_warp',
		                                  `yarn_count_weft`= '$yarn_count_weft',
		                                  `thread_epi`= '$thread_epi',
		                                  `thread_ppi`= '$thread_ppi',
		                                  `gsm`= '$gsm',


								   		`rubbing_wet`= '$rubbing_wet',
								   		`rubbing_dry`= '$rubbing_dry',


								   		`status`= '$status',
								   		`remarks`= '$remarks',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `route_issue_id` = '$route_issue_id' AND curing_id = '$curing_id' ";
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