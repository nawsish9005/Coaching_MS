<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id_number'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

	//for rubbing
	$rubbing_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_cond1'])));
	$rubbing_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_value1'])));
	$rubbing_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_value2'])));
	$rubbing_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_cond2'])));


	$active = 1;
  $lock_or_unlock = 1;

  //chcek last insert id
  $sql = 'SELECT id
            FROM curing_standard ORDER BY id DESC LIMIT 1';
  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
  $sql_row = mysqli_fetch_assoc($sql_res);
  $curing_standard_id = $sql_row['id'] + 1;

	$insert_sql_statement = "INSERT INTO `curing_standard` 
                             ( 
                              `curing_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 
                              `rubbing_cond1`,
                              `rubbing_value1`,
                              `rubbing_value2`,
                              `rubbing_cond2`,
                              `active`,
                              `lock_or_unlock`,
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
                              '$rubbing_cond1',
                              '$rubbing_value1',
                              '$rubbing_value2',
                              '$rubbing_cond2',
                              '$active',
                              '$lock_or_unlock',
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