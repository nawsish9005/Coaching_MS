<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$finishing_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['finishing_id'])));

	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$b_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['b_batcher'])));
	$a_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['a_batcher'])));
	$p_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_width'])));
	$p_qty = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_qty'])));
	$s_or_e = mysqli_real_escape_string($con, stripslashes(trim($_POST['s_or_e'])));

	$trf = mysqli_real_escape_string($con, stripslashes(trim($_POST['trf'])));

	$cf_rubbing_dry = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_dry'])));
	$cf_rubbing_wet = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_wet'])));
	$width_and_length_of_fabric = mysqli_real_escape_string($con, stripslashes(trim($_POST['width_and_length_of_fabric'])));
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

	$abrasion_resistance = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance'])));

	$abrasion_resistance_lose = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_lose'])));
	$washing_ph = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph'])));

	$formaldehyde_content = mysqli_real_escape_string($con, stripslashes(trim($_POST['formaldehyde_content'])));
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
	$water_absorption = mysqli_real_escape_string($con, stripslashes(trim($_POST['water_absorption'])));
	$spirality = mysqli_real_escape_string($con, stripslashes(trim($_POST['spirality'])));
	$durable_press = mysqli_real_escape_string($con, stripslashes(trim($_POST['durable_press'])));
	$ironability = mysqli_real_escape_string($con, stripslashes(trim($_POST['ironability'])));
	$cf_artificial_light = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light'])));
	$moisture_content = mysqli_real_escape_string($con, stripslashes(trim($_POST['moisture_content'])));
	$evaporation_rate = mysqli_real_escape_string($con, stripslashes(trim($_POST['evaporation_rate'])));


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

	$abrasion_resistance_thread_break = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_thread_break'])));
	$print_durability = mysqli_real_escape_string($con, stripslashes(trim($_POST['print_durability'])));
	$revolution = mysqli_real_escape_string($con, stripslashes(trim($_POST['revolution'])));

	$seam_resistance_method1_warp_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_value'])));
	$seam_resistance_method1_warp_remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_remarks'])));
	$seam_resistance_method1_weft_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_value'])));
	$seam_resistance_method1_weft_remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_remarks'])));
	$seam_resistance_method2_warp_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_value'])));
	$seam_resistance_method2_warp_remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_remarks'])));
	$seam_resistance_method2_weft_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_value'])));
	$seam_resistance_method2_weft_remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_remarks'])));

	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));

	
	$insert_pp_details_statement = "UPDATE `finishing` 
								    SET `date`= '$date',
								   		`b_batcher`= '$b_batcher',
								   		`a_batcher`= '$a_batcher',
								   		`p_width`= '$p_width',
								   		`p_qty`= '$p_qty',
								   		`s_or_e`= '$s_or_e',


								   		  `cf_rubbing_dry` = '$cf_rubbing_dry',
		                                  `cf_rubbing_wet` = '$cf_rubbing_wet',
		                                  `width_and_length_of_fabric` = '$width_and_length_of_fabric',
		                                  
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
		                                  `abrasion_resistance` = '$abrasion_resistance',

		                                  `abrasion_resistance_lose` = '$abrasion_resistance_lose',
		                                  `washing_ph` = '$washing_ph',
		                                  `formaldehyde_content` = '$formaldehyde_content',
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
		                                  `water_absorption` = '$water_absorption',

		                                  `spirality` = '$spirality',
		                                  `durable_press` = '$durable_press',
		                                  `ironability` = '$ironability',
		                                  `cf_artificial_light` = '$cf_artificial_light',
		                                  `moisture_content` = '$moisture_content',
		                                  `evaporation_rate` = '$evaporation_rate',

		                                  `fiber_total_polyester` = '$fiber_total_polyester',
		                                  `fiber_total_cotton` = '$fiber_total_cotton',
		                                  `fiber_total_thired` = '$fiber_total_thired',
		                                  `fiber_total_fourth` = '$fiber_total_fourth',
		                                  `fiber_warp_polyester` = '$fiber_warp_polyester',
		                                  `fiber_warp_cotton` = '$fiber_warp_cotton',
		                                  `fiber_warp_thired` = '$fiber_warp_thired',
		                                  `fiber_warp_fourth` = '$fiber_warp_fourth',
		                                  `fiber_weft_polyester` = '$fiber_weft_polyester',
		                                  `fiber_weft_cotton` = '$fiber_weft_cotton',
		                                  `fiber_weft_thired` = '$fiber_weft_thired',
		                                  `fiber_weft_fourth` = '$fiber_weft_fourth',

		                                  `abrasion_resistance_thread_break` = '$abrasion_resistance_thread_break',
		                                  `print_durability` = '$print_durability',
		                                  `revolution` = '$revolution',

		                                  `seam_resistance_method1_warp_value` = '$seam_resistance_method1_warp_value',
		                                  `seam_resistance_method1_warp_remarks` = '$seam_resistance_method1_warp_remarks',
		                                  `seam_resistance_method1_weft_value` = '$seam_resistance_method1_weft_value',
		                                  `seam_resistance_method1_weft_remarks` = '$seam_resistance_method1_weft_remarks',
		                                  `seam_resistance_method2_warp_value` = '$seam_resistance_method2_warp_value',
		                                  `seam_resistance_method2_warp_remarks` = '$seam_resistance_method2_warp_remarks',
		                                  `seam_resistance_method2_weft_value` = '$seam_resistance_method2_weft_value',
		                                  `seam_resistance_method2_weft_remarks` = '$seam_resistance_method2_weft_remarks',  


								   		`status`= '$status',
								   		`remarks`= '$remarks',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `route_issue_id` = '$route_issue_id' AND finishing_id='$finishing_id' ";
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