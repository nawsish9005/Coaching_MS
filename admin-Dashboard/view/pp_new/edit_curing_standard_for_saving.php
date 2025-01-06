<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
  $pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));
  $curing_standard_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['curing_standard_id'])));

	//for rubbing dry
  $rubbing_dry_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry_cond1'])));
  $rubbing_dry_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry_value1'])));
  $rubbing_dry_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry_value2'])));
  $rubbing_dry_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry_cond2'])));

  //for rubbing wet
  $rubbing_wet_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet_cond1'])));
  $rubbing_wet_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet_value1'])));
  $rubbing_wet_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet_value2'])));
  $rubbing_wet_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet_cond2'])));

  //for yarn warp
  $yarn_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_warp_cond1'])));
  $yarn_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_warp_value1'])));
  $yarn_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_warp_value2'])));
  $yarn_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_warp_cond2'])));

  //for yarn weft
  $yarn_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_weft_cond1'])));
  $yarn_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_weft_value1'])));
  $yarn_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_weft_value2'])));
  $yarn_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_weft_cond2'])));

  //for thread epi
  $thread_epi_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi_cond1'])));
  $thread_epi_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi_value1'])));
  $thread_epi_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi_value2'])));
  $thread_epi_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi_cond2'])));

  //for thread ppi
  $thread_ppi_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi_cond1'])));
  $thread_ppi_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi_value1'])));
  $thread_ppi_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi_value2'])));
  $thread_ppi_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi_cond2'])));

  //for gsm warp
  $gsm_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_warp_cond1'])));
  $gsm_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_warp_value1'])));
  $gsm_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_warp_value2'])));
  $gsm_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_warp_cond2'])));

  //for time
  $time_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['time_cond1'])));
  $time_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['time_value1'])));
  $time_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['time_value2'])));
  $time_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['time_cond2'])));

  //for temp
  $temp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp_cond1'])));
  $temp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp_value1'])));
  $temp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp_value2'])));
  $temp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp_cond2'])));

  //for Dimensional Change to Washing & Drying Warp (Befor Iron)
  $wash_dry_warp_before_iron_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_before_iron_cond1'])));
  $wash_dry_warp_before_iron_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_before_iron_value1'])));
  $wash_dry_warp_before_iron_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_before_iron_value2'])));
  $wash_dry_warp_before_iron_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_before_iron_cond2'])));

  //for Dimensional Change to Washing & Drying Weft (Befor Iron)
  $wash_dry_weft_before_iron_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_before_iron_cond1'])));
  $wash_dry_weft_before_iron_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_before_iron_value1'])));
  $wash_dry_weft_before_iron_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_before_iron_value2'])));
  $wash_dry_weft_before_iron_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_before_iron_cond2'])));

  //for Dimensional Change to Washing & Drying Warp (After Iron)
  $wash_dry_warp_after_iron_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_after_iron_cond1'])));
  $wash_dry_warp_after_iron_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_after_iron_value1'])));
  $wash_dry_warp_after_iron_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_after_iron_value2'])));
  $wash_dry_warp_after_iron_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_warp_after_iron_cond2'])));

  //for Dimensional Change to Washing & Drying Weft (After Iron)
  $wash_dry_weft_after_iron_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_after_iron_cond1'])));
  $wash_dry_weft_after_iron_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_after_iron_value1'])));
  $wash_dry_weft_after_iron_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_after_iron_value2'])));
  $wash_dry_weft_after_iron_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['wash_dry_weft_after_iron_cond2'])));

  //for Tensile Properties Warp
  $tensile_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_cond1'])));
  $tensile_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_value1'])));
  $tensile_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_value2'])));
  $tensile_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_cond2'])));
  $tensile_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_unit'])));

  //for Tensile Properties Weft
  $tensile_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_cond1'])));
  $tensile_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_value1'])));
  $tensile_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_value2'])));
  $tensile_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_cond2'])));
  $tensile_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_unit'])));

  //for Tear Force Warp
  $tear_force_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_cond1'])));
  $tear_force_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_value1'])));
  $tear_force_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_value2'])));
  $tear_force_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_cond2'])));
  $tear_force_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_unit'])));

  //for Tear Force Weft
  $tear_force_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_cond1'])));
  $tear_force_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_value1'])));
  $tear_force_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_value2'])));
  $tear_force_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_cond2'])));
  $tear_force_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_unit'])));
  
  //for pH
  $washing_ph_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_cond1'])));
  $washing_ph_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_value1'])));
  $washing_ph_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_value2'])));
  $washing_ph_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_cond2'])));

  //for pilling
  $pilling_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling_cond1'])));
  $pilling_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling_value1'])));
  $pilling_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling_value2'])));
  $pilling_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling_cond2'])));

	$previous_active = 0;
  $new_active = 1;

  $update_sql_statement = "UPDATE `defining_curing_qc_standard` 
                    SET `active`= '$previous_active',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `curing_standard_id` = '$curing_standard_id'";

   mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

	$insert_sql_statement = "INSERT INTO `defining_curing_qc_standard` 
                             ( 
                              `curing_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 

                              `rubbing_dry_cond1`,
                              `rubbing_dry_value1`,
                              `rubbing_dry_value2`,
                              `rubbing_dry_cond2`,

                              `rubbing_wet_cond1`,
                              `rubbing_wet_value1`,
                              `rubbing_wet_value2`,
                              `rubbing_wet_cond2`,

                              `time_cond1`,
                              `time_value1`,
                              `time_value2`,
                              `time_cond2`,


                              `temp_cond1`,
                              `temp_value1`,
                              `temp_value2`,
                              `temp_cond2`,

                              `yarn_warp_cond1`,
                              `yarn_warp_value1`,
                              `yarn_warp_value2`,
                              `yarn_warp_cond2`,

                              `yarn_weft_cond1`,
                              `yarn_weft_value1`,
                              `yarn_weft_value2`,
                              `yarn_weft_cond2`, 

                              `thread_epi_cond1`,
                              `thread_epi_value1`,
                              `thread_epi_value2`,
                              `thread_epi_cond2`,

                              `thread_ppi_cond1`,
                              `thread_ppi_value1`,
                              `thread_ppi_value2`,
                              `thread_ppi_cond2`,

                              `gsm_warp_cond1`,
                              `gsm_warp_value1`,
                              `gsm_warp_value2`,
                              `gsm_warp_cond2`,

                              `wash_dry_warp_before_iron_cond1` ,
                              `wash_dry_warp_before_iron_value1` ,
                              `wash_dry_warp_before_iron_value2` ,
                              `wash_dry_warp_before_iron_cond2` ,

                              `wash_dry_weft_before_iron_cond1` ,
                              `wash_dry_weft_before_iron_value1` ,
                              `wash_dry_weft_before_iron_value2` ,
                              `wash_dry_weft_before_iron_cond2` ,

                              `wash_dry_warp_after_iron_cond1` ,
                              `wash_dry_warp_after_iron_value1` ,
                              `wash_dry_warp_after_iron_value2` ,
                              `wash_dry_warp_after_iron_cond2` ,
                              
                              `wash_dry_weft_after_iron_cond1` ,
                              `wash_dry_weft_after_iron_value1` ,
                              `wash_dry_weft_after_iron_value2` ,
                              `wash_dry_weft_after_iron_cond2` ,

                              `tensile_warp_cond1` ,
                              `tensile_warp_value1` ,
                              `tensile_warp_value2` ,
                              `tensile_warp_cond2` ,
                              `tensile_warp_unit` ,

                              `tensile_weft_cond1` ,
                              `tensile_weft_value1` ,
                              `tensile_weft_value2` ,
                              `tensile_weft_cond2` ,
                              `tensile_weft_unit` ,

                              `tear_force_warp_cond1` ,
                              `tear_force_warp_value1` ,
                              `tear_force_warp_value2` ,
                              `tear_force_warp_cond2` ,
                              `tear_force_warp_unit` ,

                              `tear_force_weft_cond1` ,
                              `tear_force_weft_value1` ,
                              `tear_force_weft_value2` ,
                              `tear_force_weft_cond2` ,
                              `tear_force_weft_unit` ,

                              `washing_ph_cond1` ,
                              `washing_ph_value1` ,
                              `washing_ph_value2` ,
                              `washing_ph_cond2` ,

                              `pilling_cond1`,
                              `pilling_value1`,
                              `pilling_value2`,
                              `pilling_cond2`,

                              `active`,
                              `recording_person_id`, 
                              `recording_person_name`, 
                              `recording_time`, 
                              `modifying_person_id`, 
                              `modification_time` 
                             ) 
                        VALUES 
                             ( 
                              '$curing_standard_id',
                              '$pp_no_id', 
                              '$pp_details_id', 

                              '$rubbing_dry_cond1',
                              '$rubbing_dry_value1',
                              '$rubbing_dry_value2',
                              '$rubbing_dry_cond2',

                              '$rubbing_wet_cond1',
                              '$rubbing_wet_value1',
                              '$rubbing_wet_value2',
                              '$rubbing_wet_cond2',

                              '$time_cond1',
                              '$time_value1',
                              '$time_value2',
                              '$time_cond2',

                              '$temp_cond1',
                              '$temp_value1',
                              '$temp_value2',
                              '$temp_cond2',

                              '$yarn_warp_cond1',
                              '$yarn_warp_value1',
                              '$yarn_warp_value2',
                              '$yarn_warp_cond2',
                              
                              '$yarn_weft_cond1',
                              '$yarn_weft_value1',
                              '$yarn_weft_value2',
                              '$yarn_weft_cond2',

                              '$thread_epi_cond1',
                              '$thread_epi_value1',
                              '$thread_epi_value2',
                              '$thread_epi_cond2',

                              '$thread_ppi_cond1',
                              '$thread_ppi_value1',
                              '$thread_ppi_value2',
                              '$thread_ppi_cond2',

                              '$gsm_warp_cond1',
                              '$gsm_warp_value1',
                              '$gsm_warp_value2',
                              '$gsm_warp_cond2',

                              '$wash_dry_warp_before_iron_cond1',
                              '$wash_dry_warp_before_iron_value1',
                              '$wash_dry_warp_before_iron_value2',
                              '$wash_dry_warp_before_iron_cond2',

                              '$wash_dry_weft_before_iron_cond1',
                              '$wash_dry_weft_before_iron_value1',
                              '$wash_dry_weft_before_iron_value2',
                              '$wash_dry_weft_before_iron_cond2',

                              '$wash_dry_warp_after_iron_cond1',
                              '$wash_dry_warp_after_iron_value1',
                              '$wash_dry_warp_after_iron_value2',
                              '$wash_dry_warp_after_iron_cond2',

                              '$wash_dry_weft_after_iron_cond1',
                              '$wash_dry_weft_after_iron_value1',
                              '$wash_dry_weft_after_iron_value2',
                              '$wash_dry_weft_after_iron_cond2',

                              '$tensile_warp_cond1',
                              '$tensile_warp_value1',
                              '$tensile_warp_value2',
                              '$tensile_warp_cond2',
                              '$tensile_warp_unit',

                              '$tensile_weft_cond1',
                              '$tensile_weft_value1',
                              '$tensile_weft_value2',
                              '$tensile_weft_cond2',
                              '$tensile_weft_unit',

                              '$tear_force_warp_cond1',
                              '$tear_force_warp_value1',
                              '$tear_force_warp_value2',
                              '$tear_force_warp_cond2',
                              '$tear_force_warp_unit',

                              '$tear_force_weft_cond1',
                              '$tear_force_weft_value1',
                              '$tear_force_weft_value2',
                              '$tear_force_weft_cond2',
                              '$tear_force_weft_unit',

                              '$washing_ph_cond1',
                              '$washing_ph_value1',
                              '$washing_ph_value2',
                              '$washing_ph_cond2',

                              '$pilling_cond1',
                              '$pilling_value1',
                              '$pilling_value2',
                              '$pilling_cond2',

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
        echo $data_insertion_hampering = 'Yes';
    }
    else
    {
      echo $last_id = mysqli_insert_id($con);
    }
?>