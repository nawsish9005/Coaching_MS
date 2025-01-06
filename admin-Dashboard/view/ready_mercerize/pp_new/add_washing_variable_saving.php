<?php 
  session_start();
  require_once("../includes/db_session_chk.php");

  $data_previously_saved = 'No';
  $data_insertion_hampering = 'No';
  $uploaded_file_insertion_hamperings = 'No';
  $directory_already_created = 'No';

  $pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id_number'])));
  $pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

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


  //for pH
  $washing_ph_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_cond1'])));
  $washing_ph_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_value1'])));
  $washing_ph_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_value2'])));
  $washing_ph_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['washing_ph_cond2'])));

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
 
  //for Color Fastness to Artificial Light
  $cf_artificial_light_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_cond1'])));
  $cf_artificial_light_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_value1'])));
  $cf_artificial_light_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_value2'])));
  $cf_artificial_light_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['cf_artificial_light_cond2'])));
 
  $active = 1;

  //chcek last insert id
  $sql = 'SELECT id
            FROM washing_standard ORDER BY id DESC LIMIT 1';
  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
  $sql_row = mysqli_fetch_assoc($sql_res);
  $washing_standard_id = $sql_row['id'] + 1;


  $insert_sql_statement = "INSERT INTO `washing_standard` 
                             ( 
                              `washing_standard_id`,
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

                              `washing_ph_cond1` ,
                              `washing_ph_value1` ,
                              `washing_ph_value2` ,
                              `washing_ph_cond2` ,

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

                              `cf_artificial_light_cond1` ,
                              `cf_artificial_light_value1` ,
                              `cf_artificial_light_value2` ,
                              `cf_artificial_light_cond2` ,
                
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
                              '$washing_standard_id',
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

                              '$washing_ph_cond1',
                              '$washing_ph_value1',
                              '$washing_ph_value2',
                              '$washing_ph_cond2',
                
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

                              '$cf_artificial_light_cond1',
                              '$cf_artificial_light_value1',
                              '$cf_artificial_light_value2',
                              '$cf_artificial_light_cond2',
                              
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
?>