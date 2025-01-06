<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
  $pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));
  $printing_standard_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['printing_standard_id'])));

	//for rubbing
	$rubbing_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_cond1'])));
	$rubbing_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_value1'])));
	$rubbing_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_value2'])));
	$rubbing_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_cond2'])));

	$previous_active = 0;
  $new_active = 1;

  $update_sql_statement = "UPDATE `printing_standard` 
                    SET `active`= '$previous_active',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `printing_standard_id` = '$printing_standard_id'";

   mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

	$insert_sql_statement = "INSERT INTO `printing_standard` 
                             ( 
                              `printing_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 
                              `rubbing_cond1`,
                              `rubbing_value1`,
                              `rubbing_value2`,
                              `rubbing_cond2`,
                              `active`,
                              `recording_person_id`, 
                              `recording_person_name`, 
                              `recording_time`, 
                              `modifying_person_id`, 
                              `modification_time` 
                             ) 
                        VALUES 
                             ( 
                              '$printing_standard_id',
                              '$pp_no_id', 
                              '$pp_details_id', 
                              '$rubbing_cond1',
                              '$rubbing_value1',
                              '$rubbing_value2',
                              '$rubbing_cond2',
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