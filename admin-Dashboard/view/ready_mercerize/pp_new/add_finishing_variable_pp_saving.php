<?php 
  session_start();
  require_once("../includes/db_session_chk.php");

  $data_previously_saved = 'No';
  $data_insertion_hampering = 'No';
  $uploaded_file_insertion_hamperings = 'No';
  $directory_already_created = 'No';

  $pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id_number'])));
  //$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

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

  //for Abrasion Resistance S.Change
  $abrasion_resistance_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_cond1'])));
  $abrasion_resistance_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_value1'])));
  $abrasion_resistance_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_value2'])));
  $abrasion_resistance_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_cond2'])));

  //for Abrasion Resistance Thread Break
  $abrasion_resistance_thread_break = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_thread_break'])));
  $print_durability = mysqli_real_escape_string($con, stripslashes(trim($_POST['print_durability'])));
  $revolution = mysqli_real_escape_string($con, stripslashes(trim($_POST['revolution'])));

  //for Mass Loss in Abrasion test
  $abrasion_resistance_lose_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_lose_cond1'])));
  $abrasion_resistance_lose_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_lose_value1'])));
  $abrasion_resistance_lose_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_lose_value2'])));
  $abrasion_resistance_lose_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['abrasion_resistance_lose_cond2'])));

  //for pH
  $washing_ph_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_cond1'])));
  $washing_ph_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_value1'])));
  $washing_ph_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_value2'])));
  $washing_ph_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_cond2'])));

  //for Formaldehyde Content (PPM)
  $formaldehyde_content_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['formaldehyde_content_cond1'])));
  $formaldehyde_content_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['formaldehyde_content_value1'])));
  $formaldehyde_content_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['formaldehyde_content_value2'])));
  $formaldehyde_content_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['formaldehyde_content_cond2'])));
  $formaldehyde_content_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['formaldehyde_content_unit'])));

  //for Color Fastness to Dry Cleaning Color Change
  $cf_dry_cleaning_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_c_change_cond1'])));
  $cf_dry_cleaning_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_c_change_value1'])));
  $cf_dry_cleaning_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_c_change_value2'])));
  $cf_dry_cleaning_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_c_change_cond2'])));

  //for Color Fastness to Dry Cleaning Staining
  $cf_dry_cleaning_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_staining_cond1'])));
  $cf_dry_cleaning_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_staining_value1'])));
  $cf_dry_cleaning_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_staining_value2'])));
  $cf_dry_cleaning_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_dry_cleaning_staining_cond2'])));

  //for Color Fastness to Washing Color Change
  $cf_washing_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_c_change_cond1'])));
  $cf_washing_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_c_change_value1'])));
  $cf_washing_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_c_change_value2'])));
  $cf_washing_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_c_change_cond2'])));

  //for Color Fastness to Washing Staining
  $cf_washing_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_staining_cond1'])));
  $cf_washing_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_staining_value1'])));
  $cf_washing_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_staining_value2'])));
  $cf_washing_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_washing_staining_cond2'])));

  //for Color Fastness to Perspiration (Acid) Color Change
  $cf_perspiration_acis_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_c_change_cond1'])));
  $cf_perspiration_acis_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_c_change_value1'])));
  $cf_perspiration_acis_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_c_change_value2'])));
  $cf_perspiration_acis_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_c_change_cond2'])));

  //for Color Fastness to Perspiration (Acid) Staining
  $cf_perspiration_acis_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_staining_cond1'])));
  $cf_perspiration_acis_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_staining_value1'])));
  $cf_perspiration_acis_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_staining_value2'])));
  $cf_perspiration_acis_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_acis_staining_cond2'])));

  //for Color Fastness to Perspiration (Alkali) Color Change
  $cf_perspiration_alkali_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_c_change_cond1'])));
  $cf_perspiration_alkali_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_c_change_value1'])));
  $cf_perspiration_alkali_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_c_change_value2'])));
  $cf_perspiration_alkali_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_c_change_cond2'])));

  //for Color Fastness to Perspiration (Alkali) Staining
  $cf_perspiration_alkali_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_staining_cond1'])));
  $cf_perspiration_alkali_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_staining_value1'])));
  $cf_perspiration_alkali_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_staining_value2'])));
  $cf_perspiration_alkali_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_perspiration_alkali_staining_cond2'])));

  //for Color Fastness to Water Color Change
  $cf_water_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_c_change_cond1'])));
  $cf_water_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_c_change_value1'])));
  $cf_water_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_c_change_value2'])));
  $cf_water_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_c_change_cond2'])));

  //for  Color Fastness to Water Staining
  $cf_water_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_staining_cond1'])));
  $cf_water_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_staining_value1'])));
  $cf_water_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_staining_value2'])));
  $cf_water_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_staining_cond2'])));

  //for Color Fastness to Water Sotting Staining
  $cf_water_sotting_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_sotting_staining_cond1'])));
  $cf_water_sotting_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_sotting_staining_value1'])));
  $cf_water_sotting_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_sotting_staining_value2'])));
  $cf_water_sotting_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_sotting_staining_cond2'])));

  //for Color Fastness to Water Wetting Staining
  $cf_water_wetting_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_wetting_staining_cond1'])));
  $cf_water_wetting_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_wetting_staining_value1'])));
  $cf_water_wetting_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_wetting_staining_value2'])));
  $cf_water_wetting_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_water_wetting_staining_cond2'])));

  //for Color Fastness to Hydrolysis of Reactive Dyes Color Change
  $cf_hyd_reactive_dyes_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_c_change_cond1'])));
  $cf_hyd_reactive_dyes_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_c_change_value1'])));
  $cf_hyd_reactive_dyes_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_c_change_value2'])));
  $cf_hyd_reactive_dyes_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_c_change_cond2'])));

  //for Color Fastness to Hydrolysis of Reactive Dyes Staining
  $cf_hyd_reactive_dyes_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_staining_cond1'])));
  $cf_hyd_reactive_dyes_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_staining_value1'])));
  $cf_hyd_reactive_dyes_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_staining_value2'])));
  $cf_hyd_reactive_dyes_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_hyd_reactive_dyes_staining_cond2'])));

  //for Color Fastness to Oidative Bleach Damage Color Change
  $cf_oidative_damage_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_oidative_damage_c_change_cond1'])));
  $cf_oidative_damage_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_oidative_damage_c_change_value1'])));
  $cf_oidative_damage_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_oidative_damage_c_change_value2'])));
  $cf_oidative_damage_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_oidative_damage_c_change_cond2'])));

  //for Color Fastness to Phenolic Yellowing Staining
  $cf_phenolic_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_phenolic_staining_cond1'])));
  $cf_phenolic_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_phenolic_staining_value1'])));
  $cf_phenolic_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_phenolic_staining_value2'])));
  $cf_phenolic_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_phenolic_staining_cond2'])));

  //for Color Fastness to PVC Migration Staining
  $cf_pvc_migration_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_pvc_migration_staining_cond1'])));
  $cf_pvc_migration_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_pvc_migration_staining_value1'])));
  $cf_pvc_migration_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_pvc_migration_staining_value2'])));
  $cf_pvc_migration_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_pvc_migration_staining_cond2'])));

  //for Color Fastness to Saliva Color Change
  $cf_saliva_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_c_change_cond1'])));
  $cf_saliva_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_c_change_value1'])));
  $cf_saliva_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_c_change_value2'])));
  $cf_saliva_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_c_change_cond2'])));

  //for Color Fastness to Saliva Staining
  $cf_saliva_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_staining_cond1'])));
  $cf_saliva_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_staining_value1'])));
  $cf_saliva_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_staining_value2'])));
  $cf_saliva_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_saliva_staining_cond2'])));

  //for Color Fastness to Chlorinated Water Color Change
  $cf_chlorinated_water_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_c_change_cond1'])));
  $cf_chlorinated_water_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_c_change_value1'])));
  $cf_chlorinated_water_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_c_change_value2'])));
  $cf_chlorinated_water_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_c_change_cond2'])));

  //for Color Fastness to Chlorinated Water Staining
  $cf_chlorinated_water_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_staining_cond1'])));
  $cf_chlorinated_water_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_staining_value1'])));
  $cf_chlorinated_water_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_staining_value2'])));
  $cf_chlorinated_water_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_chlorinated_water_staining_cond2'])));

  //for Color Fastness to Cholorine Bleach Color Change
  $cf_cholorine_bleach_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_c_change_cond1'])));
  $cf_cholorine_bleach_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_c_change_value1'])));
  $cf_cholorine_bleach_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_c_change_value2'])));
  $cf_cholorine_bleach_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_c_change_cond2'])));

  //for Color Fastness to Cholorine Bleach Staining
  $cf_cholorine_bleach_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_staining_cond1'])));
  $cf_cholorine_bleach_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_staining_value1'])));
  $cf_cholorine_bleach_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_staining_value2'])));
  $cf_cholorine_bleach_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_cholorine_bleach_staining_cond2'])));

  //for Color Fastness to Peroxide Bleach Color Change
  $cf_peroxide_bleach_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_c_change_cond1'])));
  $cf_peroxide_bleach_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_c_change_value1'])));
  $cf_peroxide_bleach_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_c_change_value2'])));
  $cf_peroxide_bleach_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_c_change_cond2'])));

  //for Color Fastness to Peroxide Bleach Staining
  $cf_peroxide_bleach_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_staining_cond1'])));
  $cf_peroxide_bleach_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_staining_value1'])));
  $cf_peroxide_bleach_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_staining_value2'])));
  $cf_peroxide_bleach_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_peroxide_bleach_staining_cond2'])));

  //for Cross Staining
  $cross_staining_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cross_staining_cond1'])));
  $cross_staining_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cross_staining_value1'])));
  $cross_staining_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cross_staining_value2'])));
  $cross_staining_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cross_staining_cond2'])));

  //for Color Fastness to Artificial Light Color Change
  $cf_artificial_light_c_change_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_c_change_cond1'])));
  $cf_artificial_light_c_change_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_c_change_value1'])));
  $cf_artificial_light_c_change_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_c_change_value2'])));
  $cf_artificial_light_c_change_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_c_change_cond2'])));

  //for Spirality (%)
  $spirality_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['spirality_cond1'])));
  $spirality_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['spirality_value1'])));
  $spirality_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['spirality_value2'])));
  $spirality_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['spirality_cond2'])));

  //for water_absorption
  $water_absorption_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['water_absorption_cond1'])));
  $water_absorption_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['water_absorption_value1'])));
  $water_absorption_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['water_absorption_value2'])));
  $water_absorption_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['water_absorption_cond2'])));
  $water_absorption_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['water_absorption_unit'])));

  //for Durable Press
  $durable_press_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['durable_press_cond1'])));
  $durable_press_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['durable_press_value1'])));
  $durable_press_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['durable_press_value2'])));
  $durable_press_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['durable_press_cond2'])));

  //for Ironability of Woven Fabric
  $ironability_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ironability_cond1'])));
  $ironability_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ironability_value1'])));
  $ironability_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ironability_value2'])));
  $ironability_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ironability_cond2'])));

  //for Color Fastness to Artificial Light
  $cf_artificial_light_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_cond1'])));
  $cf_artificial_light_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_value1'])));
  $cf_artificial_light_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_value2'])));
  $cf_artificial_light_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_cond2'])));

  //for Moisture Content
  $moisture_content_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['moisture_content_cond1'])));
  $moisture_content_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['moisture_content_value1'])));
  $moisture_content_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['moisture_content_value2'])));
  $moisture_content_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['moisture_content_cond2'])));

  //for Evaporation Rate
  $evaporation_rate_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['evaporation_rate_cond1'])));
  $evaporation_rate_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['evaporation_rate_value1'])));
  $evaporation_rate_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['evaporation_rate_value2'])));
  $evaporation_rate_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['evaporation_rate_cond2'])));

  //fiber content polyester selection for database
  $fiber_total_name_polyester = "";
  $fiber_total_polyester_cond1 = "";
  $fiber_total_polyester_value1 = "";
  $fiber_total_polyester_value2 = "";
  $fiber_total_polyester_cond2 = "";

  //for fiber warp polyester
  $fiber_warp_name_polyester = "";
  $fiber_warp_polyester_cond1 = "";
  $fiber_warp_polyester_value1 = "";
  $fiber_warp_polyester_value2 = "";
  $fiber_warp_polyester_cond2 = "";

  //for fiber weft polyester
  $fiber_weft_name_polyester = "";
  $fiber_weft_polyester_cond1 = "";
  $fiber_weft_polyester_value1 = "";
  $fiber_weft_polyester_value2 = "";
  $fiber_weft_polyester_cond2 = "";


  //fiber content cotton selection for database
  $fiber_total_name_cotton = "";
  $fiber_total_cotton_cond1 = "";
  $fiber_total_cotton_value1 = "";
  $fiber_total_cotton_value2 = "";
  $fiber_total_cotton_cond2 = "";

  //for fiber warp cotton
  $fiber_warp_name_cotton = "";
  $fiber_warp_cotton_cond1 = "";
  $fiber_warp_cotton_value1 = "";
  $fiber_warp_cotton_value2 = "";
  $fiber_warp_cotton_cond2 = "";

  //for fiber weft cotton
  $fiber_weft_name_cotton = "";
  $fiber_weft_cotton_cond1 = "";
  $fiber_weft_cotton_value1 = "";
  $fiber_weft_cotton_value2 = "";
  $fiber_weft_cotton_cond2 = "";


  //fiber content thired selection for database
  $fiber_total_name_thired = "";
  $fiber_total_thired_cond1 = "";
  $fiber_total_thired_value1 = "";
  $fiber_total_thired_value2 = "";
  $fiber_total_thired_cond2 = "";

  //for fiber warp thired
  $fiber_warp_name_thired = "";
  $fiber_warp_thired_cond1 = "";
  $fiber_warp_thired_value1 = "";
  $fiber_warp_thired_value2 = "";
  $fiber_warp_thired_cond2 = "";

  //for fiber weft thired
  $fiber_weft_name_thired = "";
  $fiber_weft_thired_cond1 = "";
  $fiber_weft_thired_value1 = "";
  $fiber_weft_thired_value2 = "";
  $fiber_weft_thired_cond2 = "";


  //fiber content fourth selection for database
  $fiber_total_name_fourth = "";
  $fiber_total_fourth_cond1 = "";
  $fiber_total_fourth_value1 = "";
  $fiber_total_fourth_value2 = "";
  $fiber_total_fourth_cond2 = "";

  //for fiber warp fourth
  $fiber_warp_name_fourth = "";
  $fiber_warp_fourth_cond1 = "";
  $fiber_warp_fourth_value1 = "";
  $fiber_warp_fourth_value2 = "";
  $fiber_warp_fourth_cond2 = "";

  //for fiber weft fourth
  $fiber_weft_name_fourth = "";
  $fiber_weft_fourth_cond1 = "";
  $fiber_weft_fourth_value1 = "";
  $fiber_weft_fourth_value2 = "";
  $fiber_weft_fourth_cond2 = "";

  $fiber_content_selected_for_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_content_selected_for_number'])));

  if ($fiber_content_selected_for_number == '1') 
  {
      $fiber_total_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_polyester'])));
      $fiber_total_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_cond1'])));
      $fiber_total_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_value1'])));
      $fiber_total_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_value2'])));
      $fiber_total_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_cond2'])));

      $fiber_total_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_cotton'])));
      $fiber_total_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_cond1'])));
      $fiber_total_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_value1'])));
      $fiber_total_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_value2'])));
      $fiber_total_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_cond2'])));

      $fiber_total_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_thired'])));
      $fiber_total_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_cond1'])));
      $fiber_total_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_value1'])));
      $fiber_total_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_value2'])));
      $fiber_total_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_cond2'])));

      $fiber_total_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_fourth'])));
      $fiber_total_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_cond1'])));
      $fiber_total_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_value1'])));
      $fiber_total_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_value2'])));
      $fiber_total_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_cond2'])));
  }

  else if ($fiber_content_selected_for_number == '2') 
  {
      $fiber_warp_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_polyester'])));
      $fiber_warp_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_cond1'])));
      $fiber_warp_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_value1'])));
      $fiber_warp_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_value2'])));
      $fiber_warp_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_cond2'])));

      $fiber_weft_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_polyester'])));
      $fiber_weft_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_cond1'])));
      $fiber_weft_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_value1'])));
      $fiber_weft_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_value2'])));
      $fiber_weft_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_cond2'])));

      $fiber_warp_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_cotton'])));
      $fiber_warp_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_cond1'])));
      $fiber_warp_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_value1'])));
      $fiber_warp_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_value2'])));
      $fiber_warp_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_cond2'])));

      $fiber_weft_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_cotton'])));
      $fiber_weft_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_cond1'])));
      $fiber_weft_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_value1'])));
      $fiber_weft_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_value2'])));
      $fiber_weft_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_cond2'])));

      $fiber_warp_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_thired'])));
      $fiber_warp_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_cond1'])));
      $fiber_warp_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_value1'])));
      $fiber_warp_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_value2'])));
      $fiber_warp_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_cond2'])));

      $fiber_weft_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_thired'])));
      $fiber_weft_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_cond1'])));
      $fiber_weft_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_value1'])));
      $fiber_weft_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_value2'])));
      $fiber_weft_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_cond2'])));

      $fiber_warp_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_fourth'])));
      $fiber_warp_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_cond1'])));
      $fiber_warp_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_value1'])));
      $fiber_warp_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_value2'])));
      $fiber_warp_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_cond2'])));

      $fiber_weft_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_fourth'])));
      $fiber_weft_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_cond1'])));
      $fiber_weft_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_value1'])));
      $fiber_weft_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_value2'])));
      $fiber_weft_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_cond2'])));
  }

  else
  {
      $fiber_total_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_polyester'])));
      $fiber_total_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_cond1'])));
      $fiber_total_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_value1'])));
      $fiber_total_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_value2'])));
      $fiber_total_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_cond2'])));

      $fiber_warp_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_polyester'])));
      $fiber_warp_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_cond1'])));
      $fiber_warp_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_value1'])));
      $fiber_warp_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_value2'])));
      $fiber_warp_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_cond2'])));

      $fiber_weft_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_polyester'])));
      $fiber_weft_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_cond1'])));
      $fiber_weft_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_value1'])));
      $fiber_weft_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_value2'])));
      $fiber_weft_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_cond2'])));

      $fiber_total_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_cotton'])));
      $fiber_total_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_cond1'])));
      $fiber_total_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_value1'])));
      $fiber_total_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_value2'])));
      $fiber_total_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_cond2'])));

      $fiber_warp_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_cotton'])));
      $fiber_warp_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_cond1'])));
      $fiber_warp_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_value1'])));
      $fiber_warp_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_value2'])));
      $fiber_warp_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_cond2'])));

      $fiber_weft_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_cotton'])));
      $fiber_weft_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_cond1'])));
      $fiber_weft_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_value1'])));
      $fiber_weft_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_value2'])));
      $fiber_weft_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_cond2'])));

      $fiber_total_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_thired'])));
      $fiber_total_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_cond1'])));
      $fiber_total_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_value1'])));
      $fiber_total_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_value2'])));
      $fiber_total_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_cond2'])));

      $fiber_warp_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_thired'])));
      $fiber_warp_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_cond1'])));
      $fiber_warp_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_value1'])));
      $fiber_warp_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_value2'])));
      $fiber_warp_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_cond2'])));

      $fiber_weft_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_thired'])));
      $fiber_weft_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_cond1'])));
      $fiber_weft_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_value1'])));
      $fiber_weft_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_value2'])));
      $fiber_weft_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_cond2'])));

      $fiber_total_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_fourth'])));
      $fiber_total_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_cond1'])));
      $fiber_total_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_value1'])));
      $fiber_total_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_value2'])));
      $fiber_total_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_cond2'])));

      $fiber_warp_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_fourth'])));
      $fiber_warp_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_cond1'])));
      $fiber_warp_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_value1'])));
      $fiber_warp_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_value2'])));
      $fiber_warp_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_cond2'])));

      $fiber_weft_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_fourth'])));
      $fiber_weft_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_cond1'])));
      $fiber_weft_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_value1'])));
      $fiber_weft_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_value2'])));
      $fiber_weft_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_cond2'])));
  }


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

  
  $active = 1;

  $sql_for_pp_details = "SELECT *
          FROM pp_details WHERE pp_no_id = '$pp_no_id' AND active = '1'";
  $sql_res_for_pp_details = mysqli_query($con, $sql_for_pp_details) or die(mysqli_error($con));
  while( $sql_row_for_pp_details = mysqli_fetch_assoc($sql_res_for_pp_details))
  { 
      $pp_details_id = $sql_row_for_pp_details['pp_id'];

      //chcek last insert id
      $sql = 'SELECT id
                FROM finishing_standard ORDER BY id DESC LIMIT 1';
      $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
      $sql_row = mysqli_fetch_assoc($sql_res);
      $finishing_standard_id = $sql_row['id'] + 1;

      $insert_sql_statement = "INSERT INTO `finishing_standard` 
                             ( 
                              `finishing_standard_id`,
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

                              `abrasion_resistance_cond1` ,
                              `abrasion_resistance_value1` ,
                              `abrasion_resistance_value2` ,
                              `abrasion_resistance_cond2` ,

                              `abrasion_resistance_thread_break` ,
                              `print_durability` ,
                              `revolution` ,

                              `abrasion_resistance_lose_cond1` ,
                              `abrasion_resistance_lose_value1` ,
                              `abrasion_resistance_lose_value2` ,
                              `abrasion_resistance_lose_cond2` ,

                              `washing_ph_cond1` ,
                              `washing_ph_value1` ,
                              `washing_ph_value2` ,
                              `washing_ph_cond2` ,

                              `formaldehyde_content_cond1` ,
                              `formaldehyde_content_value1` ,
                              `formaldehyde_content_value2` ,
                              `formaldehyde_content_cond2` ,
                              `formaldehyde_content_unit` ,

                              `cf_dry_cleaning_c_change_cond1` ,
                              `cf_dry_cleaning_c_change_value1` ,
                              `cf_dry_cleaning_c_change_value2` ,
                              `cf_dry_cleaning_c_change_cond2` ,

                              `cf_dry_cleaning_staining_cond1` ,
                              `cf_dry_cleaning_staining_value1` ,
                              `cf_dry_cleaning_staining_value2` ,
                              `cf_dry_cleaning_staining_cond2` ,

                              `cf_washing_c_change_cond1` ,
                              `cf_washing_c_change_value1` ,
                              `cf_washing_c_change_value2` ,
                              `cf_washing_c_change_cond2` ,

                              `cf_washing_staining_cond1` ,
                              `cf_washing_staining_value1` ,
                              `cf_washing_staining_value2` ,
                              `cf_washing_staining_cond2` ,

                              `cf_perspiration_acis_c_change_cond1` ,
                              `cf_perspiration_acis_c_change_value1` ,
                              `cf_perspiration_acis_c_change_value2` ,
                              `cf_perspiration_acis_c_change_cond2` ,

                              `cf_perspiration_acis_staining_cond1` ,
                              `cf_perspiration_acis_staining_value1` ,
                              `cf_perspiration_acis_staining_value2` ,
                              `cf_perspiration_acis_staining_cond2` ,

                              `cf_perspiration_alkali_c_change_cond1` ,
                              `cf_perspiration_alkali_c_change_value1` ,
                              `cf_perspiration_alkali_c_change_value2` ,
                              `cf_perspiration_alkali_c_change_cond2` ,

                              `cf_perspiration_alkali_staining_cond1` ,
                              `cf_perspiration_alkali_staining_value1` ,
                              `cf_perspiration_alkali_staining_value2` ,
                              `cf_perspiration_alkali_staining_cond2` ,

                              `cf_water_c_change_cond1` ,
                              `cf_water_c_change_value1` ,
                              `cf_water_c_change_value2` ,
                              `cf_water_c_change_cond2` ,

                              `cf_water_staining_cond1` ,
                              `cf_water_staining_value1` ,
                              `cf_water_staining_value2` ,
                              `cf_water_staining_cond2` ,

                              `cf_water_sotting_staining_cond1` ,
                              `cf_water_sotting_staining_value1` ,
                              `cf_water_sotting_staining_value2` ,
                              `cf_water_sotting_staining_cond2` ,

                              `cf_water_wetting_staining_cond1` ,
                              `cf_water_wetting_staining_value1` ,
                              `cf_water_wetting_staining_value2` ,
                              `cf_water_wetting_staining_cond2` ,

                              `cf_hyd_reactive_dyes_c_change_cond1` ,
                              `cf_hyd_reactive_dyes_c_change_value1` ,
                              `cf_hyd_reactive_dyes_c_change_value2` ,
                              `cf_hyd_reactive_dyes_c_change_cond2` ,

                              `cf_hyd_reactive_dyes_staining_cond1` ,
                              `cf_hyd_reactive_dyes_staining_value1` ,
                              `cf_hyd_reactive_dyes_staining_value2` ,
                              `cf_hyd_reactive_dyes_staining_cond2` ,

                              `cf_oidative_damage_c_change_cond1` ,
                              `cf_oidative_damage_c_change_value1` ,
                              `cf_oidative_damage_c_change_value2` ,
                              `cf_oidative_damage_c_change_cond2` ,


                              `cf_phenolic_staining_cond1` ,
                              `cf_phenolic_staining_value1` ,
                              `cf_phenolic_staining_value2` ,
                              `cf_phenolic_staining_cond2` ,

                              `cf_pvc_migration_staining_cond1` ,
                              `cf_pvc_migration_staining_value1` ,
                              `cf_pvc_migration_staining_value2` ,
                              `cf_pvc_migration_staining_cond2` ,


                              `cf_saliva_c_change_cond1` ,
                              `cf_saliva_c_change_value1` ,
                              `cf_saliva_c_change_value2` ,
                              `cf_saliva_c_change_cond2` ,

                              `cf_saliva_staining_cond1` ,
                              `cf_saliva_staining_value1` ,
                              `cf_saliva_staining_value2` ,
                              `cf_saliva_staining_cond2` ,


                              `cf_chlorinated_water_c_change_cond1` ,
                              `cf_chlorinated_water_c_change_value1` ,
                              `cf_chlorinated_water_c_change_value2` ,
                              `cf_chlorinated_water_c_change_cond2` ,

                              `cf_chlorinated_water_staining_cond1` ,
                              `cf_chlorinated_water_staining_value1` ,
                              `cf_chlorinated_water_staining_value2` ,
                              `cf_chlorinated_water_staining_cond2` ,

                              `cf_cholorine_bleach_c_change_cond1` ,
                              `cf_cholorine_bleach_c_change_value1` ,
                              `cf_cholorine_bleach_c_change_value2` ,
                              `cf_cholorine_bleach_c_change_cond2` ,

                              `cf_cholorine_bleach_staining_cond1` ,
                              `cf_cholorine_bleach_staining_value1` ,
                              `cf_cholorine_bleach_staining_value2` ,
                              `cf_cholorine_bleach_staining_cond2` ,

                              `cf_peroxide_bleach_c_change_cond1` ,
                              `cf_peroxide_bleach_c_change_value1` ,
                              `cf_peroxide_bleach_c_change_value2` ,
                              `cf_peroxide_bleach_c_change_cond2` ,

                              `cf_peroxide_bleach_staining_cond1` ,
                              `cf_peroxide_bleach_staining_value1` ,
                              `cf_peroxide_bleach_staining_value2` ,
                              `cf_peroxide_bleach_staining_cond2` ,

                              `cross_staining_cond1` ,
                              `cross_staining_value1` ,
                              `cross_staining_value2` ,
                              `cross_staining_cond2` ,

                              `cf_artificial_light_c_change_cond1` ,
                              `cf_artificial_light_c_change_value1` ,
                              `cf_artificial_light_c_change_value2` ,
                              `cf_artificial_light_c_change_cond2` ,

                              `spirality_cond1` ,
                              `spirality_value1` ,
                              `spirality_value2` ,
                              `spirality_cond2` ,

                              `water_absorption_cond1` ,
                              `water_absorption_value1` ,
                              `water_absorption_value2` ,
                              `water_absorption_cond2` ,
                              `water_absorption_unit` ,

                              `durable_press_cond1` ,
                              `durable_press_value1` ,
                              `durable_press_value2` ,
                              `durable_press_cond2` ,

                              `ironability_cond1` ,
                              `ironability_value1` ,
                              `ironability_value2` ,
                              `ironability_cond2` ,

                              `cf_artificial_light_cond1` ,
                              `cf_artificial_light_value1` ,
                              `cf_artificial_light_value2` ,
                              `cf_artificial_light_cond2` ,

                              `moisture_content_cond1` ,
                              `moisture_content_value1` ,
                              `moisture_content_value2` ,
                              `moisture_content_cond2` ,

                              `evaporation_rate_cond1` ,
                              `evaporation_rate_value1` ,
                              `evaporation_rate_value2` ,
                              `evaporation_rate_cond2` ,

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


                              `fiber_content_select`,
                              `fiber_total_name_polyester`,
                              `fiber_total_polyester_cond1`,
                              `fiber_total_polyester_value1`,
                              `fiber_total_polyester_value2`,
                              `fiber_total_polyester_cond2`,
                              `fiber_total_name_cotton`,
                              `fiber_total_cotton_cond1`,
                              `fiber_total_cotton_value1`,
                              `fiber_total_cotton_value2`,
                              `fiber_total_cotton_cond2`, 
                              `fiber_total_name_thired`,
                              `fiber_total_thired_cond1`,
                              `fiber_total_thired_value1`,
                              `fiber_total_thired_value2`,
                              `fiber_total_thired_cond2`, 
                              `fiber_total_name_fourth`,
                              `fiber_total_fourth_cond1`,
                              `fiber_total_fourth_value1`,
                              `fiber_total_fourth_value2`,
                              `fiber_total_fourth_cond2`,
                              `fiber_warp_name_polyester`,
                              `fiber_warp_polyester_cond1`,
                              `fiber_warp_polyester_value1`,
                              `fiber_warp_polyester_value2`,
                              `fiber_warp_polyester_cond2`,
                              `fiber_warp_name_cotton`,
                              `fiber_warp_cotton_cond1`,
                              `fiber_warp_cotton_value1`,
                              `fiber_warp_cotton_value2`,
                              `fiber_warp_cotton_cond2`, 
                              `fiber_warp_name_thired`,
                              `fiber_warp_thired_cond1`,
                              `fiber_warp_thired_value1`,
                              `fiber_warp_thired_value2`,
                              `fiber_warp_thired_cond2`, 
                              `fiber_warp_name_fourth`,
                              `fiber_warp_fourth_cond1`,
                              `fiber_warp_fourth_value1`,
                              `fiber_warp_fourth_value2`,
                              `fiber_warp_fourth_cond2`, 
                              `fiber_weft_name_polyester`,
                              `fiber_weft_polyester_cond1`,
                              `fiber_weft_polyester_value1`,
                              `fiber_weft_polyester_value2`,
                              `fiber_weft_polyester_cond2`,
                              `fiber_weft_name_cotton`,
                              `fiber_weft_cotton_cond1`,
                              `fiber_weft_cotton_value1`,
                              `fiber_weft_cotton_value2`,
                              `fiber_weft_cotton_cond2`, 
                              `fiber_weft_name_thired`,
                              `fiber_weft_thired_cond1`,
                              `fiber_weft_thired_value1`,
                              `fiber_weft_thired_value2`,
                              `fiber_weft_thired_cond2`, 
                              `fiber_weft_name_fourth`,
                              `fiber_weft_fourth_cond1`,
                              `fiber_weft_fourth_value1`,
                              `fiber_weft_fourth_value2`,
                              `fiber_weft_fourth_cond2`, 
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
                              '$finishing_standard_id',
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

                              '$abrasion_resistance_cond1',
                              '$abrasion_resistance_value1',
                              '$abrasion_resistance_value2',
                              '$abrasion_resistance_cond2',

                              '$abrasion_resistance_thread_break',
                              '$print_durability',
                              '$revolution',

                              '$abrasion_resistance_lose_cond1',
                              '$abrasion_resistance_lose_value1',
                              '$abrasion_resistance_lose_value2',
                              '$abrasion_resistance_lose_cond2',

                              '$washing_ph_cond1',
                              '$washing_ph_value1',
                              '$washing_ph_value2',
                              '$washing_ph_cond2',

                              '$formaldehyde_content_cond1',
                              '$formaldehyde_content_value1',
                              '$formaldehyde_content_value2',
                              '$formaldehyde_content_cond2',
                              '$formaldehyde_content_unit',

                              '$cf_dry_cleaning_c_change_cond1',
                              '$cf_dry_cleaning_c_change_value1',
                              '$cf_dry_cleaning_c_change_value2',
                              '$cf_dry_cleaning_c_change_cond2',

                              '$cf_dry_cleaning_staining_cond1',
                              '$cf_dry_cleaning_staining_value1',
                              '$cf_dry_cleaning_staining_value2',
                              '$cf_dry_cleaning_staining_cond2',

                              '$cf_washing_c_change_cond1',
                              '$cf_washing_c_change_value1',
                              '$cf_washing_c_change_value2',
                              '$cf_washing_c_change_cond2',

                              '$cf_washing_staining_cond1',
                              '$cf_washing_staining_value1',
                              '$cf_washing_staining_value2',
                              '$cf_washing_staining_cond2',

                              '$cf_perspiration_acis_c_change_cond1',
                              '$cf_perspiration_acis_c_change_value1',
                              '$cf_perspiration_acis_c_change_value2',
                              '$cf_perspiration_acis_c_change_cond2',

                              '$cf_perspiration_acis_staining_cond1',
                              '$cf_perspiration_acis_staining_value1',
                              '$cf_perspiration_acis_staining_value2',
                              '$cf_perspiration_acis_staining_cond2',

                              '$cf_perspiration_alkali_c_change_cond1',
                              '$cf_perspiration_alkali_c_change_value1',
                              '$cf_perspiration_alkali_c_change_value2',
                              '$cf_perspiration_alkali_c_change_cond2',

                              '$cf_perspiration_alkali_staining_cond1',
                              '$cf_perspiration_alkali_staining_value1',
                              '$cf_perspiration_alkali_staining_value2',
                              '$cf_perspiration_alkali_staining_cond2',

                              '$cf_water_c_change_cond1',
                              '$cf_water_c_change_value1',
                              '$cf_water_c_change_value2',
                              '$cf_water_c_change_cond2',

                              '$cf_water_staining_cond1',
                              '$cf_water_staining_value1',
                              '$cf_water_staining_value2',
                              '$cf_water_staining_cond2',

                              '$cf_water_sotting_staining_cond1',
                              '$cf_water_sotting_staining_value1',
                              '$cf_water_sotting_staining_value2',
                              '$cf_water_sotting_staining_cond2',

                              '$cf_water_wetting_staining_cond1',
                              '$cf_water_wetting_staining_value1',
                              '$cf_water_wetting_staining_value2',
                              '$cf_water_wetting_staining_cond2',

                              '$cf_hyd_reactive_dyes_c_change_cond1',
                              '$cf_hyd_reactive_dyes_c_change_value1',
                              '$cf_hyd_reactive_dyes_c_change_value2',
                              '$cf_hyd_reactive_dyes_c_change_cond2',

                              '$cf_hyd_reactive_dyes_staining_cond1',
                              '$cf_hyd_reactive_dyes_staining_value1',
                              '$cf_hyd_reactive_dyes_staining_value2',
                              '$cf_hyd_reactive_dyes_staining_cond2',

                              '$cf_oidative_damage_c_change_cond1',
                              '$cf_oidative_damage_c_change_value1',
                              '$cf_oidative_damage_c_change_value2',
                              '$cf_oidative_damage_c_change_cond2',


                              '$cf_phenolic_staining_cond1',
                              '$cf_phenolic_staining_value1',
                              '$cf_phenolic_staining_value2',
                              '$cf_phenolic_staining_cond2',

                              '$cf_pvc_migration_staining_cond1',
                              '$cf_pvc_migration_staining_value1',
                              '$cf_pvc_migration_staining_value2',
                              '$cf_pvc_migration_staining_cond2',


                              '$cf_saliva_c_change_cond1',
                              '$cf_saliva_c_change_value1',
                              '$cf_saliva_c_change_value2',
                              '$cf_saliva_c_change_cond2',

                              '$cf_saliva_staining_cond1',
                              '$cf_saliva_staining_value1',
                              '$cf_saliva_staining_value2',
                              '$cf_saliva_staining_cond2',


                              '$cf_chlorinated_water_c_change_cond1',
                              '$cf_chlorinated_water_c_change_value1',
                              '$cf_chlorinated_water_c_change_value2',
                              '$cf_chlorinated_water_c_change_cond2',

                              '$cf_chlorinated_water_staining_cond1',
                              '$cf_chlorinated_water_staining_value1',
                              '$cf_chlorinated_water_staining_value2',
                              '$cf_chlorinated_water_staining_cond2',

                              '$cf_cholorine_bleach_c_change_cond1',
                              '$cf_cholorine_bleach_c_change_value1',
                              '$cf_cholorine_bleach_c_change_value2',
                              '$cf_cholorine_bleach_c_change_cond2',

                              '$cf_cholorine_bleach_staining_cond1',
                              '$cf_cholorine_bleach_staining_value1',
                              '$cf_cholorine_bleach_staining_value2',
                              '$cf_cholorine_bleach_staining_cond2',

                              '$cf_peroxide_bleach_c_change_cond1',
                              '$cf_peroxide_bleach_c_change_value1',
                              '$cf_peroxide_bleach_c_change_value2',
                              '$cf_peroxide_bleach_c_change_cond2',

                              '$cf_peroxide_bleach_staining_cond1',
                              '$cf_peroxide_bleach_staining_value1',
                              '$cf_peroxide_bleach_staining_value2',
                              '$cf_peroxide_bleach_staining_cond2',

                              '$cross_staining_cond1',
                              '$cross_staining_value1',
                              '$cross_staining_value2',
                              '$cross_staining_cond2',

                              '$cf_artificial_light_c_change_cond1',
                              '$cf_artificial_light_c_change_value1',
                              '$cf_artificial_light_c_change_value2',
                              '$cf_artificial_light_c_change_cond2',

                              '$spirality_cond1',
                              '$spirality_value1',
                              '$spirality_value2',
                              '$spirality_cond2',

                              '$water_absorption_cond1',
                              '$water_absorption_value1',
                              '$water_absorption_value2',
                              '$water_absorption_cond2',
                              '$water_absorption_unit',

                              '$durable_press_cond1',
                              '$durable_press_value1',
                              '$durable_press_value2',
                              '$durable_press_cond2',

                              '$ironability_cond1',
                              '$ironability_value1',
                              '$ironability_value2',
                              '$ironability_cond2',

                              '$cf_artificial_light_cond1',
                              '$cf_artificial_light_value1',
                              '$cf_artificial_light_value2',
                              '$cf_artificial_light_cond2',

                              '$moisture_content_cond1',
                              '$moisture_content_value1',
                              '$moisture_content_value2',
                              '$moisture_content_cond2',

                              '$evaporation_rate_cond1',
                              '$evaporation_rate_value1',
                              '$evaporation_rate_value2',
                              '$evaporation_rate_cond2',

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


                              '$fiber_content_selected_for_number',
                              '$fiber_total_name_polyester',
                              '$fiber_total_polyester_cond1',
                              '$fiber_total_polyester_value1',
                              '$fiber_total_polyester_value2',
                              '$fiber_total_polyester_cond2',
                              '$fiber_total_name_cotton',
                              '$fiber_total_cotton_cond1',
                              '$fiber_total_cotton_value1',
                              '$fiber_total_cotton_value2',
                              '$fiber_total_cotton_cond2',
                              '$fiber_total_name_thired',
                              '$fiber_total_thired_cond1',
                              '$fiber_total_thired_value1',
                              '$fiber_total_thired_value2',
                              '$fiber_total_thired_cond2',
                              '$fiber_total_name_fourth',
                              '$fiber_total_fourth_cond1',
                              '$fiber_total_fourth_value1',
                              '$fiber_total_fourth_value2',
                              '$fiber_total_fourth_cond2',
                              '$fiber_warp_name_polyester',
                              '$fiber_warp_polyester_cond1',
                              '$fiber_warp_polyester_value1',
                              '$fiber_warp_polyester_value2',
                              '$fiber_warp_polyester_cond2',
                              '$fiber_warp_name_cotton',
                              '$fiber_warp_cotton_cond1',
                              '$fiber_warp_cotton_value1',
                              '$fiber_warp_cotton_value2',
                              '$fiber_warp_cotton_cond2',
                              '$fiber_warp_name_thired',
                              '$fiber_warp_thired_cond1',
                              '$fiber_warp_thired_value1',
                              '$fiber_warp_thired_value2',
                              '$fiber_warp_thired_cond2',
                              '$fiber_warp_name_fourth',
                              '$fiber_warp_fourth_cond1',
                              '$fiber_warp_fourth_value1',
                              '$fiber_warp_fourth_value2',
                              '$fiber_warp_fourth_cond2',
                              '$fiber_weft_name_polyester',
                              '$fiber_weft_polyester_cond1',
                              '$fiber_weft_polyester_value1',
                              '$fiber_weft_polyester_value2',
                              '$fiber_weft_polyester_cond2',
                              '$fiber_weft_name_cotton',
                              '$fiber_weft_cotton_cond1',
                              '$fiber_weft_cotton_value1',
                              '$fiber_weft_cotton_value2',
                              '$fiber_weft_cotton_cond2',
                              '$fiber_weft_name_thired',
                              '$fiber_weft_thired_cond1',
                              '$fiber_weft_thired_value1',
                              '$fiber_weft_thired_value2',
                              '$fiber_weft_thired_cond2',
                              '$fiber_weft_name_fourth',
                              '$fiber_weft_fourth_cond1',
                              '$fiber_weft_fourth_value1',
                              '$fiber_weft_fourth_value2',
                              '$fiber_weft_fourth_cond2',
                              '1',
                              '$active',
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
    }
?>