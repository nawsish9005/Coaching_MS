<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));
  $singe_standard_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['singe_standard_id'])));

	//for yarn warp
	$intensity_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['intensity_cond1'])));
	$intensity_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['intensity_value1'])));
	$intensity_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['intensity_value2'])));
	$intensity_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['intensity_cond2'])));

	//for yarn weft
	$speed_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['speed_cond1'])));
	$speed_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['speed_value1'])));
	$speed_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['speed_value2'])));
	$speed_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['speed_cond2'])));

	//for thread epi
	$temp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp_cond1'])));
	$temp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp_value1'])));
	$temp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp_value2'])));
	$temp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['temp_cond2'])));

	//for thread ppi
	$ph_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_cond1'])));
	$ph_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_value1'])));
	$ph_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_value2'])));
	$ph_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_cond2'])));

  $previous_active = 0;
	$new_active = 1;

  $previous_lock_or_unlock = 0;
  $new_lock_or_unlock = 1;

  $update_sql_statement = "UPDATE `defining_singeing_desizing_qc_standard` 
                    SET `active`= '$previous_active',
                      `lock_or_unlock` = '$previous_lock_or_unlock',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `singe_standard_id` = '$singe_standard_id'";

   mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

	 $insert_sql_statement = "INSERT INTO `defining_singeing_desizing_qc_standard` 
                            ( 
                              `singe_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 
                              `intensity_cond1`,
                              `intensity_value1`,
                              `intensity_value2`,
                              `intensity_cond2`,
                              `speed_cond1`,
                              `speed_value1`,
                              `speed_value2`,
                              `speed_cond2`, 
                              `temp_cond1`,
                              `temp_value1`,
                              `temp_value2`,
                              `temp_cond2`,
                              `ph_cond1`,
                              `ph_value1`,
                              `ph_value2`,
                              `ph_cond2`,
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
                              '$singe_standard_id',
                              '$pp_no_id', 
                              '$pp_details_id', 
                              '$intensity_cond1',
                              '$intensity_value1',
                              '$intensity_value2',
                              '$intensity_cond2',
                              '$speed_cond1',
                              '$speed_value1',
                              '$speed_value2',
                              '$speed_cond2', 
                              '$temp_cond1',
                              '$temp_value1',
                              '$temp_value2',
                              '$temp_cond2',
                              '$ph_cond1',
                              '$ph_value1',
                              '$ph_value2',
                              '$ph_cond2', 
                              '$new_lock_or_unlock', 
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