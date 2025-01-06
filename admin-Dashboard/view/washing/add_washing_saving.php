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
	$machine_temp = mysqli_real_escape_string($con, stripslashes(trim($_POST['machine_temp'])));
	
	$trf = mysqli_real_escape_string($con, stripslashes(trim($_POST['trf'])));

	$cf_rubbing_dry = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_dry'])));
	$cf_rubbing_wet = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_wet'])));


	$washing_ph = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph'])));

	$cf_dry_cleaning_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_c_change'])));

	$cf_dry_cleaning_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_staining'])));
	$cf_washing_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_c_change'])));

	$cf_washing_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_staining'])));
	$cf_perspiration_acis_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_c_change'])));

	$cf_perspiration_acis_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_staining'])));
	$cf_perspiration_alkali_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_c_change'])));

	$cf_perspiration_alkali_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_staining'])));
	$cf_water_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_c_change'])));

	$cf_water_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_staining'])));

	$cf_water_sotting_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_sotting_staining'])));
	$cf_water_wetting_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_wetting_staining'])));
	$cf_hyd_reactive_dyes_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_c_change'])));
	$cf_hyd_reactive_dyes_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_staining'])));
	$cf_oidative_damage_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_oidative_damage_c_change'])));
	$cf_phenolic_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_phenolic_staining'])));
	$cf_pvc_migration_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_pvc_migration_staining'])));
	$cf_saliva_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_c_change'])));
	$cf_saliva_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_staining'])));
	$cf_chlorinated_water_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_c_change'])));
	$cf_chlorinated_water_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_staining'])));
	$cf_cholorine_bleach_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_c_change'])));
	$cf_cholorine_bleach_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_staining'])));
	$cf_peroxide_bleach_c_change = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_c_change'])));
	$cross_staining = mysqli_real_escape_string($con, stripslashes(trim($_POST['cross_staining'])));


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

		$insert_pp_details_statement = "INSERT INTO `washing`
		                                 (
		                                  `route_issue_id`,
		                                  `date`,
		                                  `b_batcher`,
		                                  `a_batcher`,
		                                  `p_width`,
		                                  `p_qty`,
		                                  `s_or_e`,
		                                  `machine`,
		                                  `machine_temp`,
		                                  `trf`,

		                                  `cf_rubbing_dry`,
		                                  `cf_rubbing_wet`,

		                                  `washing_ph`,

		                                  `cf_dry_cleaning_c_change`,
		                                  `cf_dry_cleaning_staining`,
		                                  `cf_washing_c_change`,
		                                  `cf_washing_staining`,
		                                  `cf_perspiration_acis_c_change`,
		                                  `cf_perspiration_acis_staining`,
		                                  `cf_perspiration_alkali_c_change`,
		                                  `cf_perspiration_alkali_staining`,

		                                  `cf_water_c_change`,
		                                  `cf_water_staining`,

		                                  `cf_water_sotting_staining`,
		                                  `cf_water_wetting_staining`,
		                                  `cf_hyd_reactive_dyes_c_change`,
		                                  `cf_hyd_reactive_dyes_staining`,
		                                  `cf_oidative_damage_c_change`,
		                                  `cf_phenolic_staining`,
		                                  `cf_pvc_migration_staining`,
		                                  `cf_saliva_c_change`,
		                                  `cf_saliva_staining`,
		                                  `cf_chlorinated_water_c_change`,
		                                  `cf_chlorinated_water_staining`,
		                                  `cf_cholorine_bleach_c_change`,
		                                  `cf_cholorine_bleach_staining`,
		                                  `cf_peroxide_bleach_c_change`,
		                                  `cross_staining`,

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
		                                  '$machine_temp',
		                                  '$trf',

		                                  '$cf_rubbing_dry',
		                                  '$cf_rubbing_wet',

		                                  '$washing_ph',


		                                  '$cf_dry_cleaning_c_change',
		                                  '$cf_dry_cleaning_staining',
		                                  '$cf_washing_c_change',
		                                  '$cf_washing_staining',
		                                  '$cf_perspiration_acis_c_change',
		                                  '$cf_perspiration_acis_staining',
		                                  '$cf_perspiration_alkali_c_change',
		                                  '$cf_perspiration_alkali_staining',

		                                  '$cf_water_c_change',
		                                  '$cf_water_staining',

		                                  '$cf_water_sotting_staining',
		                                  '$cf_water_wetting_staining',
		                                  '$cf_hyd_reactive_dyes_c_change',
		                                  '$cf_hyd_reactive_dyes_staining',
		                                  '$cf_oidative_damage_c_change',
		                                  '$cf_phenolic_staining',
		                                  '$cf_pvc_migration_staining',
		                                  '$cf_saliva_c_change',
		                                  '$cf_saliva_staining',
		                                  '$cf_chlorinated_water_c_change',
		                                  '$cf_chlorinated_water_staining',
		                                  '$cf_cholorine_bleach_c_change',
		                                  '$cf_cholorine_bleach_staining',
		                                  '$cf_peroxide_bleach_c_change',
		                                  '$cross_staining',

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
