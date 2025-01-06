<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$washing_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_id'])));

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

	
	$insert_pp_details_statement = "UPDATE `finishing` 
								    SET `date`= '$date',
								   		`b_batcher`= '$b_batcher',
								   		`a_batcher`= '$a_batcher',
								   		`p_width`= '$p_width',
								   		`p_qty`= '$p_qty',
								   		`s_or_e`= '$s_or_e',
								   		`machine`= '$machine',
								   		`machine_temp`= '$machine_temp',
								   		`trf`= '$trf',


								   		  `cf_rubbing_dry` = '$cf_rubbing_dry',
		                                  `cf_rubbing_wet` = '$cf_rubbing_wet',

		                                  
		                                  `washing_ph` = '$washing_ph',

		                                  `cf_dry_cleaning_c_change` = '$cf_dry_cleaning_c_change',
		                                  `cf_dry_cleaning_staining` = '$cf_dry_cleaning_staining',
		                                  `cf_washing_c_change` = '$cf_washing_c_change',
		                                  `cf_washing_staining` = '$cf_washing_staining',
		                                  `cf_perspiration_acis_c_change` = '$cf_perspiration_acis_c_change',
		                                  `cf_perspiration_acis_staining` = '$cf_perspiration_acis_staining',
		                                  `cf_perspiration_alkali_c_change` = '$cf_perspiration_alkali_c_change',
		                                  `cf_perspiration_alkali_staining` = '$cf_perspiration_alkali_staining',

		                                  `cf_water_c_change` = '$cf_water_c_change',
		                                  `cf_water_staining` = '$cf_water_staining',

		                                  `cf_water_sotting_staining` = '$cf_water_sotting_staining',
		                                  `cf_water_wetting_staining` = '$cf_water_wetting_staining',
		                                  `cf_hyd_reactive_dyes_c_change` = '$cf_hyd_reactive_dyes_c_change',
		                                  `cf_hyd_reactive_dyes_staining` = '$cf_hyd_reactive_dyes_staining',
		                                  `cf_oidative_damage_c_change` = '$cf_oidative_damage_c_change',
		                                  `cf_phenolic_staining` = '$cf_phenolic_staining',
		                                  `cf_pvc_migration_staining` = '$cf_pvc_migration_staining',
		                                  `cf_saliva_c_change` = '$cf_saliva_c_change',
		                                  `cf_saliva_staining` = '$cf_saliva_staining',
		                                  `cf_chlorinated_water_c_change` = '$cf_chlorinated_water_c_change',
		                                  `cf_chlorinated_water_staining` = '$cf_chlorinated_water_staining',
		                                  `cf_cholorine_bleach_c_change` = '$cf_cholorine_bleach_c_change',
		                                  `cf_cholorine_bleach_staining` = '$cf_cholorine_bleach_staining',
		                                  `cf_peroxide_bleach_c_change` = '$cf_peroxide_bleach_c_change',
		                                  `cross_staining` = '$cross_staining',

								   		`status`= '$status',
								   		`remarks`= '$remarks',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `route_issue_id` = '$route_issue_id' AND washing_id='$washing_id' ";
	mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));

    if(mysqli_affected_rows($con) <> 1)
    {
        echo $data_insertion_hampering = 'Not insert new washing';
        exit();
    }

    else
    {
    	echo "Update Data Successfully";
    }
?>