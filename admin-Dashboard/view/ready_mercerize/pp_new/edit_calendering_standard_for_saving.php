<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));
  $calendering_standard_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['calendering_standard_id'])));



	//for Color Fastness to Rubbing Dry
  $cf_rubbing_dry_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_dry_cond1'])));
  $cf_rubbing_dry_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_dry_value1'])));
  $cf_rubbing_dry_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_dry_value2'])));
  $cf_rubbing_dry_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_dry_cond2'])));

  //for Color Fastness to Rubbing Wet
  $cf_rubbing_wet_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_wet_cond1'])));
  $cf_rubbing_wet_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_wet_value1'])));
  $cf_rubbing_wet_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_wet_value2'])));
  $cf_rubbing_wet_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_rubbing_wet_cond2'])));

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

  //for Dimensional Change to Dry Cleaning Warp
  $dry_cleaning_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_warp_cond1'])));
  $dry_cleaning_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_warp_value1'])));
  $dry_cleaning_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_warp_value2'])));
  $dry_cleaning_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_warp_cond2'])));

  //for Dimensional Change to Dry Cleaning Weft
  $dry_cleaning_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_weft_cond1'])));
  $dry_cleaning_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_weft_value1'])));
  $dry_cleaning_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_weft_value2'])));
  $dry_cleaning_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['dry_cleaning_weft_cond2'])));

  //for Yarn Count for Warp
  $yarn_count_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp_cond1'])));
  $yarn_count_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp_value1'])));
  $yarn_count_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp_value2'])));
  $yarn_count_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp_cond2'])));
  $yarn_count_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp_unit'])));

  //for Yarn Count for Weft
  $yarn_count_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft_cond1'])));
  $yarn_count_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft_value1'])));
  $yarn_count_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft_value2'])));
  $yarn_count_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft_cond2'])));
  $yarn_count_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft_unit'])));

  //for Number of Threads Warp
  $number_thread_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_warp_cond1'])));
  $number_thread_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_warp_value1'])));
  $number_thread_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_warp_value2'])));
  $number_thread_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_warp_cond2'])));
  $number_thread_warp_unit  = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_warp_unit'])));

  //for Number of Threads weft
  $number_thread_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_weft_cond1'])));
  $number_thread_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_weft_value1'])));
  $number_thread_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_weft_value2'])));
  $number_thread_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_weft_cond2'])));
  $number_thread_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['number_thread_weft_unit'])));

  //for Mass per Unit per Area
  $mass_per_unit_per_area_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['mass_per_unit_per_area_cond1'])));
  $mass_per_unit_per_area_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['mass_per_unit_per_area_value1'])));
  $mass_per_unit_per_area_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['mass_per_unit_per_area_value2'])));
  $mass_per_unit_per_area_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['mass_per_unit_per_area_cond2'])));
  $mass_per_unit_per_area_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['mass_per_unit_per_area_unit'])));

  //for Surface Fuzzing & to Pilling
  $surface_pilling_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['surface_pilling_cond1'])));
  $surface_pilling_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['surface_pilling_value1'])));
  $surface_pilling_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['surface_pilling_value2'])));
  $surface_pilling_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['surface_pilling_cond2'])));

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

  //for Seam Strength Warp
  $seam_strength_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_warp_cond1'])));
  $seam_strength_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_warp_value1'])));
  $seam_strength_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_warp_value2'])));
  $seam_strength_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_warp_cond2'])));
  $seam_strength_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_warp_unit'])));

  //for Seam Strength Weft 
  $seam_strength_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_weft_cond1'])));
  $seam_strength_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_weft_value1'])));
  $seam_strength_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_weft_value2'])));
  $seam_strength_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_weft_cond2'])));
  $seam_strength_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_strength_weft_unit'])));



  //Seam Slipage Resistance Warp(N)
  $seam_resistance_method1_warp_cond1 = "";
  $seam_resistance_method1_warp_value1 = "";
  $seam_resistance_method1_warp_value2 = "";
  $seam_resistance_method1_warp_cond2 = "";
  $seam_resistance_method1_warp_unit = "";

  //Seam Slipage Resistance weft
  $seam_resistance_method1_weft_cond1 = "";
  $seam_resistance_method1_weft_value1 = "";
  $seam_resistance_method1_weft_value2 = "";
  $seam_resistance_method1_weft_cond2 = "";
  $seam_resistance_method1_weft_unit = "";

  //Seam Slipage Resistance Warp (mm)
  $seam_resistance_method2_warp_cond1 = "";
  $seam_resistance_method2_warp_value1 = "";
  $seam_resistance_method2_warp_value2 = "";
  $seam_resistance_method2_warp_cond2 = "";
  $seam_resistance_method2_warp_unit = "";

  //Seam Slipage Resistance weft
  $seam_resistance_method2_weft_cond1 = "";
  $seam_resistance_method2_weft_value1 = "";
  $seam_resistance_method2_weft_value2 = "";
  $seam_resistance_method2_weft_cond2 = "";
  $seam_resistance_method2_weft_unit = "";

  $seam_slipage_resistance_for_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_slipage_resistance_for_number'])));

  if ($seam_slipage_resistance_for_number == '1') 
  {
      //Seam Slipage Resistance Warp(N)
      $seam_resistance_method1_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_cond1'])));
      $seam_resistance_method1_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_value1'])));
      $seam_resistance_method1_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_value2'])));
      $seam_resistance_method1_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_cond2'])));
      $seam_resistance_method1_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_warp_unit'])));

      //Seam Slipage Resistance weft
      $seam_resistance_method1_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_cond1'])));
      $seam_resistance_method1_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_value1'])));
      $seam_resistance_method1_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_value2'])));
      $seam_resistance_method1_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_cond2'])));
      $seam_resistance_method1_weft_unit= mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method1_weft_unit'])));
  }
  else
  {
      //Seam Slipage Resistance Warp (mm)
      $seam_resistance_method2_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_cond1'])));
      $seam_resistance_method2_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_value1'])));
      $seam_resistance_method2_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_value2'])));
      $seam_resistance_method2_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_cond2'])));
      $seam_resistance_method2_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_warp_unit'])));

      //Seam Slipage Resistance weft
      $seam_resistance_method2_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_cond1'])));
      $seam_resistance_method2_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_value1'])));
      $seam_resistance_method2_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_value2'])));
      $seam_resistance_method2_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_cond2'])));
      $seam_resistance_method2_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['seam_resistance_method2_weft_unit'])));
  }


  $previous_active = 0;
	$new_active = 1;

  $previous_lock_or_unlock = 0;
  $new_lock_or_unlock = 1;

  $update_sql_statement = "UPDATE `calendering_standard` 
                    SET `active`= '$previous_active',
                      `lock_or_unlock` = '$previous_lock_or_unlock',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `calendering_standard_id` = '$calendering_standard_id'";

   mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

	 $insert_sql_statement = "INSERT INTO `calendering_standard` 
                             ( 
                              `calendering_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 


                              `cf_rubbing_dry_cond1`,
                              `cf_rubbing_dry_value1` ,
                              `cf_rubbing_dry_value2` ,
                              `cf_rubbing_dry_cond2` ,
                              `cf_rubbing_wet_cond1` ,
                              `cf_rubbing_wet_value1` ,
                              `cf_rubbing_wet_value2` ,
                              `cf_rubbing_wet_cond2` ,
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


                              `dry_cleaning_warp_cond1` ,
                              `dry_cleaning_warp_value1` ,
                              `dry_cleaning_warp_value2` ,
                              `dry_cleaning_warp_cond2` ,

                              `dry_cleaning_weft_cond1` ,
                              `dry_cleaning_weft_value1` ,
                              `dry_cleaning_weft_value2` ,
                              `dry_cleaning_weft_cond2` ,

                              `yarn_count_warp_cond1` ,
                              `yarn_count_warp_value1` ,
                              `yarn_count_warp_value2` ,
                              `yarn_count_warp_cond2` ,
                              `yarn_count_warp_unit` ,


                              `yarn_count_weft_cond1` ,
                              `yarn_count_weft_value1` ,
                              `yarn_count_weft_value2` ,
                              `yarn_count_weft_cond2` ,
                              `yarn_count_weft_unit` ,

                              `number_thread_warp_cond1` ,
                              `number_thread_warp_value1` ,
                              `number_thread_warp_value2` ,
                              `number_thread_warp_cond2` ,
                              `number_thread_warp_unit` ,

                              `number_thread_weft_cond1` ,
                              `number_thread_weft_value1` ,
                              `number_thread_weft_value2` ,
                              `number_thread_weft_cond2` ,
                              `number_thread_weft_unit` ,


                              `mass_per_unit_per_area_cond1` ,
                              `mass_per_unit_per_area_value1` ,
                              `mass_per_unit_per_area_value2` ,
                              `mass_per_unit_per_area_cond2` ,
                              `mass_per_unit_per_area_unit` ,

                              `surface_pilling_cond1` ,
                              `surface_pilling_value1` ,
                              `surface_pilling_value2` ,
                              `surface_pilling_cond2` ,

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

                              `seam_strength_warp_cond1` ,
                              `seam_strength_warp_value1` ,
                              `seam_strength_warp_value2` ,
                              `seam_strength_warp_cond2` ,
                              `seam_strength_warp_unit` ,

                              `seam_strength_weft_cond1` ,
                              `seam_strength_weft_value1` ,
                              `seam_strength_weft_value2` ,
                              `seam_strength_weft_cond2` ,
                              `seam_strength_weft_unit` ,


                              `seam_slipage_resistance` ,

                              `seam_resistance_method1_warp_cond1` ,
                              `seam_resistance_method1_warp_value1` ,
                              `seam_resistance_method1_warp_value2` ,
                              `seam_resistance_method1_warp_cond2` ,
                              `seam_resistance_method1_warp_unit` ,

                              `seam_resistance_method1_weft_cond1` ,
                              `seam_resistance_method1_weft_value1` ,
                              `seam_resistance_method1_weft_value2` ,
                              `seam_resistance_method1_weft_cond2` ,
                              `seam_resistance_method1_weft_unit` ,

                              `seam_resistance_method2_warp_cond1` ,
                              `seam_resistance_method2_warp_value1` ,
                              `seam_resistance_method2_warp_value2` ,
                              `seam_resistance_method2_warp_cond2` ,
                              `seam_resistance_method2_warp_unit` ,

                              `seam_resistance_method2_weft_cond1` ,
                              `seam_resistance_method2_weft_value1` ,
                              `seam_resistance_method2_weft_value2` ,
                              `seam_resistance_method2_weft_cond2` ,
                              `seam_resistance_method2_weft_unit` ,

                              `lock_or_unlock`,
                              `active`,
                              `recording_person_id`, 
                              `recording_person_name`, 
                              `recording_time`, 
                              `modifying_person_id`, 
                              `modification_time`

                             ) 
                        VALUES 
                             ( 
                              '$calendering_standard_id',
                              '$pp_no_id', 
                              '$pp_details_id', 


                              '$cf_rubbing_dry_cond1',
                              '$cf_rubbing_dry_value1',
                              '$cf_rubbing_dry_value2',
                              '$cf_rubbing_dry_cond2',
                              '$cf_rubbing_wet_cond1',
                              '$cf_rubbing_wet_value1',
                              '$cf_rubbing_wet_value2',
                              '$cf_rubbing_wet_cond2',
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


                              '$dry_cleaning_warp_cond1',
                              '$dry_cleaning_warp_value1',
                              '$dry_cleaning_warp_value2',
                              '$dry_cleaning_warp_cond2',

                              '$dry_cleaning_weft_cond1',
                              '$dry_cleaning_weft_value1',
                              '$dry_cleaning_weft_value2',
                              '$dry_cleaning_weft_cond2',

                              '$yarn_count_warp_cond1',
                              '$yarn_count_warp_value1',
                              '$yarn_count_warp_value2',
                              '$yarn_count_warp_cond2',
                              '$yarn_count_warp_unit',


                              '$yarn_count_weft_cond1',
                              '$yarn_count_weft_value1',
                              '$yarn_count_weft_value2',
                              '$yarn_count_weft_cond2',
                              '$yarn_count_weft_unit',

                              '$number_thread_warp_cond1',
                              '$number_thread_warp_value1',
                              '$number_thread_warp_value2',
                              '$number_thread_warp_cond2',
                              '$number_thread_warp_unit',

                              '$number_thread_weft_cond1',
                              '$number_thread_weft_value1',
                              '$number_thread_weft_value2',
                              '$number_thread_weft_cond2',
                              '$number_thread_weft_unit',


                              '$mass_per_unit_per_area_cond1',
                              '$mass_per_unit_per_area_value1',
                              '$mass_per_unit_per_area_value2',
                              '$mass_per_unit_per_area_cond2',
                              '$mass_per_unit_per_area_unit',

                              '$surface_pilling_cond1',
                              '$surface_pilling_value1',
                              '$surface_pilling_value2',
                              '$surface_pilling_cond2',

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

                              '$seam_strength_warp_cond1',
                              '$seam_strength_warp_value1',
                              '$seam_strength_warp_value2',
                              '$seam_strength_warp_cond2',
                              '$seam_strength_warp_unit',

                              '$seam_strength_weft_cond1',
                              '$seam_strength_weft_value1',
                              '$seam_strength_weft_value2',
                              '$seam_strength_weft_cond2',
                              '$seam_strength_weft_unit',


                              '$seam_slipage_resistance_for_number',

                              '$seam_resistance_method1_warp_cond1',
                              '$seam_resistance_method1_warp_value1',
                              '$seam_resistance_method1_warp_value2',
                              '$seam_resistance_method1_warp_cond2',
                              '$seam_resistance_method1_warp_unit',

                              '$seam_resistance_method1_weft_cond1',
                              '$seam_resistance_method1_weft_value1',
                              '$seam_resistance_method1_weft_value2',
                              '$seam_resistance_method1_weft_cond2',
                              '$seam_resistance_method1_weft_unit',

                              '$seam_resistance_method2_warp_cond1',
                              '$seam_resistance_method2_warp_value1',
                              '$seam_resistance_method2_warp_value2',
                              '$seam_resistance_method2_warp_cond2',
                              '$seam_resistance_method2_warp_unit',

                              '$seam_resistance_method2_weft_cond1',
                              '$seam_resistance_method2_weft_value1',
                              '$seam_resistance_method2_weft_value2',
                              '$seam_resistance_method2_weft_cond2',
                              '$seam_resistance_method2_weft_unit',


                              '1',
                              '1',
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