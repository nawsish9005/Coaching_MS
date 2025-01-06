<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));
  $ready_for_raising_standard_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['ready_for_raising_standard_id'])));

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

  


  $previous_active = 0;
	$new_active = 1;

  $previous_lock_or_unlock = 0;
  $new_lock_or_unlock = 1;

  $update_sql_statement = "UPDATE `ready_for_raising_standard` 
                    SET `active`= '$previous_active',
                      `lock_or_unlock` = '$previous_lock_or_unlock',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `ready_for_raising_standard_id` = '$ready_for_raising_standard_id'";

   mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

	 $insert_sql_statement = "INSERT INTO `ready_for_raising_standard` 
                             ( 
                              `ready_for_raising_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 


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
                              '$ready_for_raising_standard_id',
                              '$pp_no_id', 
                              '$pp_details_id', 


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