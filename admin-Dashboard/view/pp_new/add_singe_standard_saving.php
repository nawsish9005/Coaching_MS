<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id_number'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

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

	$active = 1;

  //chcek last insert id
  $sql = 'SELECT id
            FROM defining_singeing_desizing_qc_standard ORDER BY id DESC LIMIT 1';
  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
  $sql_row = mysqli_fetch_assoc($sql_res);
  $singe_standard_id = $sql_row['id'] + 1;

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